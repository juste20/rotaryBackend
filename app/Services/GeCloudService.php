<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GeCloudService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.gecloud.url');
        $this->apiKey = config('services.gecloud.key');
    }

    public function uploadFile($file)
    {
        $path = $file->store('uploads', 'public');

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
        ])->attach('file', file_get_contents($file), $file->getClientOriginalName())
            ->post("{$this->apiUrl}/media/upload");

        if ($response->successful()) {
            return $response->json();
        }

        return ['error' => 'Échec du transfert du fichier.'];
    }

    public function deleteFile($fileId)
    {
        $response = Http::withToken($this->apiKey)
            ->delete("{$this->apiUrl}/media/{$fileId}");

        return $response->json();
    }

    public function getFileUrl($fileId)
    {
        $response = Http::withToken($this->apiKey)
            ->get("{$this->apiUrl}/media/{$fileId}");

        if ($response->successful()) {
            return $response->json()['url'] ?? null;
        }

        return null;
    }
}
