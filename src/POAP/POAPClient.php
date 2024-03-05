<?php

namespace Toleillo\Vottun\POAP;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use Toleillo\Vottun\VottunSDK;

class POAPClient extends VottunSDK {

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function deploy(
        string  $name,
        int     $amount,
        string  $ipfsUri,
        int     $network,
        string  $alias,
        ?int    $gasLimit
    ): array
    {
        return $this->makeRequest('/erc/v1/poap/deploy', 'POST', [
            'name' => $name,
            'amount' => $amount,
            'ipfsUri' => $ipfsUri,
            'network' => $network,
            'alias' => $alias,
            'gasLimit' => $gasLimit
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function transfer(
        string $contractAddress,
        string $network,
        string $to,
        int    $id
    ): array
    {
        return $this->makeRequest('/erc/v1/poap/transfer', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'to' => $to,
            'id' => $id
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function balanceOf(
        string $contractAddress,
        string $network,
        string $address,
        int    $id
    ): array
    {
        return $this->makeRequest('/erc/v1/poap/balanceOf', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'address' => $address,
            'id' => $id
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function tokenUri(
        string $contractAddress,
        string $network,
        int    $id
    ): array
    {
        return $this->makeRequest('/erc/v1/poap/tokenUri', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'id' => $id
        ]);
    }
}
