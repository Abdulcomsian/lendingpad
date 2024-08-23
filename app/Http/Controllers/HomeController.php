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


    public function meridianLink(Request $request){
        // dd($request->all());
        // Base64 Username and Password: aWRlYWxsZW5kaW5nOk44ITQ0cmhMeVQ=  | ideallending:N8!44rhLyT
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://demo.mortgagecreditlink.com/inetapi/request_products.aspx");
        curl_setopt($ch, CURLOPT_USERPWD, "ideallending:N8!44rhLyT"); //Your credentials goes here
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                    "postvar1=value1&postvar2=value2&postvar3=value3");

        // In real life you should use something like:
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 
        //          http_build_query(array('postvar1' => 'value1')));

        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

    }
}
