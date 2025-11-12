<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class BrevoService
{
    protected $apiUrl = 'https://api.brevo.com/v3';
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.brevo.key');
    }

    public function sendEmail($to, $subject, $htmlContent)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $this->apiKey,
            'content-type' => 'application/json',
        ])->post("{$this->apiUrl}/smtp/email", [
            'sender' => ['email' => config('mail.from.address'), 'name' => config('mail.from.name')],
            'to' => [['email' => $to]],
            'subject' => $subject,
            'htmlContent' => $htmlContent,
        ]);

        return $response->json();
    }

    public function addContact($email, $attributes = [])
    {
        $response = Http::withHeaders([
            'api-key' => $this->apiKey,
            'content-type' => 'application/json',
        ])->post("{$this->apiUrl}/contacts", [
            'email' => $email,
            'attributes' => $attributes,
            'updateEnabled' => true,
        ]);

        return $response->json();
    }

    public function sendNewsletter($emails, $subject, $content)
    {
        foreach ($emails as $email) {
            $this->sendEmail($email, $subject, $content);
        }
        return ['success' => true, 'message' => 'Newsletter envoyée.'];
    }
}
