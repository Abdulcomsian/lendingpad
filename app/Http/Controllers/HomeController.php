<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function fetchApi(Request $request){
        dd("Fetch Api is working");
    }
}
