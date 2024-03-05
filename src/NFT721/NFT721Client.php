<?php

namespace Toleillo\Vottun\NFT721;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use Toleillo\Vottun\VottunSDK;

class NFT721Client extends VottunSDK {

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function deploy(
        string $name,
        string $symbol,
        int $network,
        ?int $gasLimit,
        ?string $alias
    ): array
    {
        return $this->makeRequest('/erc/v1/erc721/deploy', 'POST', [
            'name' => $name,
            'symbol' => $symbol,
            'network' => $network,
            'gasLimit' => $gasLimit,
            'alias' => $alias
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function mint(
        string $recipientAddress,
        int    $tokenId,
        string $ipfsUri,
        string $ipfsHash,
        int    $network,
        string $contractAddress,
        ?int   $royaltyPercentage,
        ?int   $gas
    ): array
    {
        return $this->makeRequest('/erc/v1/erc721/mint', 'POST', [
            'recipientAddress' => $recipientAddress,
            'tokenId' => $tokenId,
            'ipfsUri' => $ipfsUri,
            'ipfsHash' => $ipfsHash,
            'network' => $network,
            'contractAddress' => $contractAddress,
            'royaltyPercentage' => $royaltyPercentage,
            'gas' => $gas
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
        int    $network,
        int    $id,
        string $fromAddress,
        string $toAddress
    ): array
    {
        return $this->makeRequest('/erc/v1/erc721/transfer', 'POST', [
            'contractAddress' => $contractAddress,
            'id' => $id,
            'network' => $network,
            'from' => $fromAddress,
            'to' => $toAddress
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
        int    $network,
        string $address
    ): array
    {
        return $this->makeRequest('/erc/v1/erc721/balanceOf', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'address' => $address
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
        int    $network,
        int    $id
    ): array
    {
        return $this->makeRequest('/erc/v1/erc721/tokenUri', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
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
    public function ownerOf(
        string $contractAddress,
        int    $network,
        int    $id
    ): array
    {
        return $this->makeRequest('/erc/v1/erc721/ownerOf', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'id' => $id
        ]);
    }
}
