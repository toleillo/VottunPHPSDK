<?php

namespace Toleillo\Vottun;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class VottunSDK {

    public function __construct(
        public string $apiUrl,
        public string $apiKey,
        public string $apiAppId
    ) {}

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function makeRequest($endpoint, $method = 'GET', $data = []): array
    {
        $httpClient = HttpClient::create();

        $url = $this->apiUrl . $endpoint;
        $headers = [
            'Authorization' => 'Bearer ' . $this->apiKey,
            'x-application-vkn' => $this->apiAppId,
            'Content-Type' => 'application/json',
        ];

        $response = $httpClient->request($method, $url, [
            'headers' => $headers,
            'body' => json_encode($data),
        ]);

        return $response->toArray();
    }
}
