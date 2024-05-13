<?php

namespace App\Http\Controllers;

use App\Notifications\JSONDataNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
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
}
