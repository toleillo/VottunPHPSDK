<?php

namespace Toleillo\Vottun\NFT1155;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use Toleillo\Vottun\VottunSDK;

class NFT1155Client extends VottunSDK {

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
        string $ipfsUri,
        string $royaltyRecipient,
        int    $royaltyValue,
        int    $network,
        string $alias,
        ?int   $gasLimit
    ): array
    {
        return $this->makeRequest('/erc/v1/erc1155/deploy', 'POST', [
            'name' => $name,
            'symbol' => $symbol,
            'ipfsUri' => $ipfsUri,
            'royaltyRecipient' => $royaltyRecipient,
            'royaltyValue' => $royaltyValue,
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
        string $contractAddress,
        int    $network,
        string $to,
        int    $id,
        int    $amount
    ): array
    {
        return $this->makeRequest('/erc/v1/erc1155/mint', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'to' => $to,
            'id' => $id,
            'amount' => $amount
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function mintBatch(
        string $contractAddress,
        int    $network,
        string $to,
        array  $amounts,
        array  $ids
    ): array
    {
        return $this->makeRequest('/erc/v1/erc1155/mintbatch', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'to' => $to,
            'amounts' => $amounts,
            'ids' => $ids
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
        string $toAddress,
        int    $id,
        int    $amount
    ): array
    {
        return $this->makeRequest('/erc/v1/erc1155/transfer', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'to' => $toAddress,
            'id' => $id,
            'amount' => $amount
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function transferBatch(
        string $contractAddress,
        int    $network,
        string $toAddress,
        array  $ids,
        array  $amounts
    ): array
    {
        return $this->makeRequest('/erc/v1/erc1155/transferBatch', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'to' => $toAddress,
            'ids' => $ids,
            'amounts' => $amounts
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
        string $address,
        int    $id
    ): array
    {
        return $this->makeRequest('/erc/v1/erc1155/balanceOf', 'POST', [
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
        int    $network,
        int    $id
    ): array
    {
        return $this->makeRequest('/erc/v1/erc1155/tokenUri', 'POST', [
            'contractAddress' => $contractAddress,
            'network' => $network,
            'id' => $id
        ]);
    }
}
