<?php

namespace Toleillo\Vottun\IPFS;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use Toleillo\Vottun\VottunSDK;

class IPFSClient extends VottunSDK {

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function upload(
        string $filename,
        mixed  $file
    ): array
    {
        return $this->makeRequest('/ipfs/v2/file/upload', 'POST', [
            'filename' => $filename,
            'file' => $file,
        ], 'multipart/form-data');
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function uploadMetadata(
        string  $name,
        string  $image,
        string  $description,
        ?string $externalUrl,
        ?string $animationUrl,
        ?array  $attributes,
        ?array  $data

    ): array
    {
        return $this->makeRequest('/ipfs/v2/file/metadata', 'POST', [
            'name' => $name,
            'image' => $image,
            'description' => $description,
            'external_url' => $externalUrl,
            'animation_url' => $animationUrl,
            'attributes' => $attributes,
            'data' => $data ? json_encode($data) : null
        ]);
    }
}
