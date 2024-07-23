<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\services\MeridianLinkService;
use App\Jobs\ProcessApiRequest;

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
            $json_data = $request->json()->all();

            ProcessApiRequest::dispatch($json_data);

            return response()->json(['message' => 'Data received and being processed'], 200);
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
