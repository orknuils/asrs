<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class VercelService
{
    protected $vercelToken;

    public function __construct()
    {
        // Get the Vercel token from .env
        $this->vercelToken = env('VERCEL_TOKEN');
    }

    public function createDeployment($projectId, $payload)
    {
        // Vercel API endpoint for deployments
        $url = "https://api.vercel.com/v12/now/deployments?projectId={$projectId}";

        // Send request to Vercel API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->vercelToken,
        ])->post($url, $payload);

        // Handle the response
        if ($response->successful()) {
            return $response->json();
        }

        return $response->failed();
    }
}
