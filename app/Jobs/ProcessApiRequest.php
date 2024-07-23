<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Order;

class ProcessApiRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $json_data;
    public $timeout = 120;

    /**
     * Create a new job instance.
     */

    public function __construct($json_data)
    {
        $this->json_data = $json_data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $json_data = $this->json_data;

        Log::info('Received JSON Data: ' . json_encode($json_data));

        try {
            if (!isset($json_data[0]['dates']) || !isset($json_data[0]['dates']['funded']) || is_null($json_data[0]['dates']['funded'])) {
                Log::error('Funded Date is Required:');
                return;
            }

            if (!isset($json_data[0]['borrowers']) || count($json_data[0]['borrowers']) == 0) {
                Log::error('Borrower information not found:');
                return;
            }

            $borrower = $json_data[0]['borrowers'][0];

            if (
                !isset($borrower['firstName']) || empty($borrower['firstName']) ||
                !isset($borrower['lastName']) || empty($borrower['lastName']) ||
                !isset($borrower['contacts']) ||
                !isset($borrower['contacts']['email']) || empty($borrower['contacts']['email']) ||
                !isset($borrower['contacts']['mobilePhone']) || empty($borrower['contacts']['mobilePhone'])
            ) {
                Log::error('Borrower required fields are missing or null:');
                return;
            }

            $data = [
                'name' => $borrower['firstName'] . ' ' . $borrower['lastName'],
                'email' => $borrower['contacts']['email'],
                'phone' => $borrower['contacts']['mobilePhone'],
                'source' => 'affiliate',
                'close_date' => $json_data[0]['dates']['closed'] ?? '',
                'affiliate_order_id' => $json_data[0]['affiliate_order_id'] ?? '',
                'affiliate_order_source' => $json_data[0]['affiliate_order_source'] ?? '',
                'comments' => $json_data[0]['comments'] ?? '',
                'address_attributes' => [
                    'street1' => $borrower['currentAddress']['street'],
                    'street2' => $borrower['currentAddress']['street2'] ?? '',
                    'city' => $borrower['currentAddress']['city'],
                    'state' => $borrower['currentAddress']['state'],
                    'zipcode' => $borrower['currentAddress']['zipCode'],
                ],
                'loan_number' => $json_data[0]['loanNumber'] ?? '',
            ];

            // Check for existing order
            $existingOrder = Order::where('loan_number', $data['loan_number'])->first();
            if ($existingOrder) {
                Log::error('Order already exists for loan number: ' . $data['loan_number']);
                return;
            }

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-Version' => '1.0',
            ])->post('https://mu2-staging.myutilities.com/api/referral/orders', [
                'token' => '2291af7239814c5f9d18f79f91b25889',
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'source' => $data['source'],
                'close_date' => $data['close_date'],
                'affiliate_order_id' => $data['affiliate_order_id'],
                'affiliate_order_source' => $data['affiliate_order_source'],
                'comments' => $data['comments'],
                'address_attributes' => [
                    'street1' => $data['address_attributes']['street1'],
                    'street2' => $data['address_attributes']['street2'],
                    'city' => $data['address_attributes']['city'],
                    'state' => $data['address_attributes']['state'],
                    'zipcode' => $data['address_attributes']['zipcode'],
                ],
                'loan_number' => $data['loan_number'],
            ]);

            if ($response->successful()) {
                Log::info('API call successful: ' . $response->body());

                $responseData = json_decode($response->body(), true);

                Order::create([
                    'loan_number' => $data['loan_number'],
                    'myutilities_order_id' => $responseData['id'] ?? null,
                ]);
            } else {
                Log::error('API call failed: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Exception occurred: ' . $e->getMessage());
        }
    }
}
