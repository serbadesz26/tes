<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class VirtualMeetingController extends Controller
{
    private $baseUrl   = "https://api.zoom.us/v2";
    private $token;
    // private $token     = "Bearer eyJzdiI6IjAwMDAwMSIsImFsZyI6IkhTNTEyIiwidiI6IjIuMCIsImtpZCI6ImRjNmFlNDY5LTFmNWItNGJlNC04MmY0LTdiYjJmN2VlN2IyOCJ9.eyJ2ZXIiOjksImF1aWQiOiJlMmMxNjA3ZDUxZTUxYTMwYzM3MDM3OTgyZjAwNWRiZiIsImNvZGUiOiJOZElGTWZSYlNTNnhnWngtcUxiUjFHR0JCVjFBREF1X2ciLCJpc3MiOiJ6bTpjaWQ6ZlpBWEQ0WlNJRllFRDlTcmF6T0EiLCJnbm8iOjAsInR5cGUiOjAsInRpZCI6MCwiYXVkIjoiaHR0cHM6Ly9vYXV0aC56b29tLnVzIiwidWlkIjoiQnh6cTVTYlRRci1KY3MzOFhZMDhSUSIsIm5iZiI6MTY5OTkzMjA4NCwiZXhwIjoxNjk5OTM1Njg0LCJpYXQiOjE2OTk5MzIwODQsImFpZCI6ImY5RkZ1c3BLUkktelZNdlp0UXRuREEifQ.tDAHXYVhIXnJjNz-fs8TJStCKNKRw1ElOPYXgOWbbbcf5ekcI2DUcDvFYEps6367YVAtp_6UfLeIi_FkXwLY1w";
    private $type      = "scheduled";
    private $page_size = "100";
    private $userId0   = "diskominfobabel@gmail.com";
    private $userId1   = "vicon1@babelprov.go.id";
    private $userId2   = "vicon2@babelprov.go.id";
    private $userId3   = "vicon3@babelprov.go.id";
    
    public function __construct()
    {
        $this->token = 'Bearer '.$this->generateToken();
    }

    public function index()
    {
        $response0 = Http::withHeaders([
            'Authorization' => $this->token,
        ])->get($this->baseUrl.'/users/'.$this->userId0.'/meetings?type='.$this->type.'&page_size='.$this->page_size);

        $response1 = Http::withHeaders([
            'Authorization' => $this->token,
        ])->get($this->baseUrl.'/users/'.$this->userId1.'/meetings?type='.$this->type);

        $response2 = Http::withHeaders([
            'Authorization' => $this->token,
        ])->get($this->baseUrl.'/users/'.$this->userId2.'/meetings?type='.$this->type);

        $response3 = Http::withHeaders([
            'Authorization' => $this->token,
        ])->get($this->baseUrl.'/users/'.$this->userId3.'/meetings?type='.$this->type);

        return view('content.virtual_meeting.index', [
            'response0' => array_reverse($response0['meetings']),
            'response1' => array_reverse($response1['meetings']),
            'response2' => array_reverse($response2['meetings']),
            'response3' => array_reverse($response3['meetings']),
        ]);
    }
    
    private function generateToken()
    {
        // return response()->json('Test');
        // Zoom API credentials
        $clientId = env('ZOOM_CLIENT_ID');
        $clientSecret = env('ZOOM_CLIENT_SECRET');
        $accountId = env('ZOOM_ACCOUNT_ID');
        
        $client = new Client([
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
                'Host' => 'zoom.us',
            ],
        ]);

        $response = $client->request('POST', "https://zoom.us/oauth/token", [
            'form_params' => [
                'grant_type' => 'account_credentials',
                'account_id' => $accountId,
            ],
        ]);
        
        $responseBody = json_decode($response->getBody(), true);
        return $responseBody['access_token'];
    }
}
