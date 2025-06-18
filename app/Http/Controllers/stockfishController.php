<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class stockfishController extends Controller
{

    public function postdata(){
        return ['result'=>'Data has been saved'];
    }


    // public function submitData(Request $request)
    // {
    //     // // Log incoming data to check if the request is being received
    //     // Log::info('Incoming data: ', $request->all());

    //     // // Simulate a delay for testing (optional)
    //     // // sleep(5); // Simulates a 5-second delay

    //     // return response()->json(['message' => 'Data received successfully']);

    //     return ['result'=>'Data has been saved'];
    // }
    // public function getData()
    // {
    //     echo "tet get data";
    // }
}
