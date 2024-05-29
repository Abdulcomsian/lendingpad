<?php

namespace App\Http\Controllers;

use App\Notifications\JSONDataNotification;
use Illuminate\Http\Request;
use App\Services\MeridianLinkService;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{

    protected $meridianLinkService;

    public function __construct(MeridianLinkService $meridianLinkService)
    {
        $this->meridianLinkService = $meridianLinkService;
    }


    public function fetchApi(Request $request){
        try {
            $json_data = $request->all();
            // Process the JSON data here
            // For example: Save the data to a database, trigger actions, etc.
            // Replace this with your actual processing logic
            // Return success response

            // Sending Email
            $to_Email = env('TO_EMAIL');
            Notification::route('mail', $to_Email)->notify(new JSONDataNotification($json_data));
            return response()->json(['message' => 'Request processed successfully'], 200);
        } catch (\Exception $e) {
            // Handle any errors that occur during processing
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function checkData(Request $request)
    {
        dd("123");
        $endpoint = env('MERIDIANLINK_API_BASE_URI');
        $parameters = [
            'param1' => $request->input('param1'),
            'param2' => $request->input('param2'),
        ];

        $data = $this->meridianLinkService->checkData($endpoint, $parameters);

        return response()->json($data);
    }
}
