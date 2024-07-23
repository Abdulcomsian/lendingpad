<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\services\MeridianLinkService;

class HomeController extends Controller
{

    protected $meridianLinkService;

    public function __construct(MeridianLinkService $meridianLinkService)
    {
        $this->meridianLinkService = $meridianLinkService;
    }

    public function fetchApi(Request $request)
    {
        try {
            $json_data = $request->all();

            $errors = [];

            if (!isset($json_data[0])) {
                return response()->json(['message' => 'Data received but not processed due to invalid JSON structure'], 200);
            }

            $required_fields = ['borrowers'];

            foreach ($required_fields as $field) {
                if (!array_key_exists($field, $json_data[0])) {
                    $errors[] = 'Required field missing: ' . $field;
                }
            }

            $required_borrower_fields = [
                'firstName',
                'lastName',
                'contacts' => ['email', 'mobilePhone'],
            ];

            // Function to validate nested fields
            function validate_fields($data, $fields, &$errors, $prefix = '')
            {
                foreach ($fields as $key => $value) {
                    if (is_array($value)) {
                        if (!array_key_exists($key, $data)) {
                            $errors[] = "Required field missing: " . $prefix . $key;
                        } else {
                            validate_fields($data[$key], $value, $errors, $prefix . $key . '.');
                        }
                    } else {
                        if (!array_key_exists($value, $data)) {
                            $errors[] = "Required field missing: " . $prefix . $value;
                        }
                    }
                }
            }

            // Validate each borrower
            if (array_key_exists('borrowers', $json_data[0])) {
                foreach ($json_data[0]['borrowers'] as $index => $borrower) {
                    validate_fields($borrower, $required_borrower_fields, $errors, "borrower $index: ");
                }
            }

            // Validate funded date
         /*   if (!array_key_exists('dates', $json_data[0]) || !array_key_exists('funded', $json_data[0]['dates']) || is_null($json_data[0]['dates']['funded'])) {
                $errors[] = 'funded date is required';
            } */

            // Log errors if any and return a response
            if (!empty($errors)) {
                Log::error('Validation errors: ' . implode(', ', $errors));
                return response()->json(['message' => 'Data received but not processed due to validation errors', 'errors' => $errors], 200);
            }

if(isset($json_data[0]['borrowers']) && count($json_data[0]['borrowers'][0])>0){
            $borrower = $json_data[0]['borrowers'][0];
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
                return response()->json(['message' => 'Data received but order already exists'], 200);
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

                return response()->json([
                    'message' => 'Order created successfully',
                    'order' => $responseData,
                ], 200);
            } else {
                Log::error('API call failed: ' . $response->body());
                return response()->json(['message' => 'Data received but failed to create order'], 200);
            }
		}else{
			
			 Log::error('Borrower information not found:');
			 return response()->json(['message' => 'Borrower information not found'], 200);
		}
        } catch (\Exception $e) {
            Log::error('Exception occurred: ' . $e->getMessage());
            return response()->json(['message' => 'Data received but an error occurred', 'error' => $e->getMessage()], 200);
        }
    }


    public function checkData(Request $request)
    {
        $endpoint = env('MERIDIANLINK_API_BASE_URI');
        $parameters = [
            'param1' => $request->input('param1'),
            'param2' => $request->input('param2'),
        ];
        $data = $this->meridianLinkService->checkData($endpoint, $parameters);
        dd('after', $data);
        return response()->json($data);
    }
}
