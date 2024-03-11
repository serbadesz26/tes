<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YoutubeController extends Controller
{
    public function getYoutubeApi()
    {
        try {
            $api_youtube = Http::get('https://bds.babelprov.go.id/api/youtube')->json();
            
        
            if($api_youtube['datas'] != []){
                $sliceData = array_slice($api_youtube['datas'], 0, 5);
                return response()->json(['datas' => $sliceData, 'message' => 'success']);
            } else {
                return response()->json(['message'=> 'kosong']);
            }

        } catch (\Throwable $th) {
            return response()->json(['message'=>'Error']);
        }
        
    }
}
