<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OTPService
{
    protected $client;
    protected $apiKey;
    protected $url;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = '49da059f7c37e6a0645967077d91d95c-db17afe3-8192-4a62-8de1-dfff992d53a9';
        $this->url = 'https://1gv2p9.api.infobip.com/sms/1/text/single'; // Update endpoint as needed
    }

    public function sendOTP($phoneNumber, $otp) 
    {
        $body = [
            'from' => 'YourSenderID', // Change this to your sender ID
            'to' => $phoneNumber,
            'text' => "Your OTP is: $otp",
        ];

        try {
            $response = $this->client->post($this->url, [
                'headers' => [
                    'Authorization' => 'App ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $body,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            // Handle exception
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
