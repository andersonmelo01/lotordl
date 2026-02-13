<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PagBankService
{
    protected $baseUrl;
    protected $clientId;
    protected $clientSecret;

    public function __construct()
    {
        $this->baseUrl = config('services.pagbank.api_url');
        $this->clientId = config('services.pagbank.client_id');
        $this->clientSecret = config('services.pagbank.client_secret');
    }

    public function createPixOrder(array $orderData)
    {
        $response = Http::withBasicAuth($this->clientId, $this->clientSecret)
        ->acceptJson()
        ->post("{$this->baseUrl}/orders", $orderData); // Endpoint para criar pedido

        if ($response->successful()) {
            return $response->json();
        } else {
            Log::error('PagBank API Error: ' . $response->body());
            return null;
        }
    }
}