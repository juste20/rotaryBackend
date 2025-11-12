<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FeexPayService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.feexpay.url');
        $this->apiKey = config('services.feexpay.key');
    }

    public function createPayment(array $data)
    {
        $response = Http::withToken($this->apiKey)
            ->post("{$this->apiUrl}/payments", $data);

        return $response->json();
    }

    public function verifyPayment($transactionId)
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->apiUrl}/payments/{$transactionId}");

        return $response->json();
    }

    public function refundPayment($transactionId)
    {
        $response = Http::withToken($this->apiKey)
            ->post("{$this->apiUrl}/payments/{$transactionId}/refund");

        return $response->json();
    }
}
