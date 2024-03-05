<?php

namespace Toleillo\Vottun\Web3;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use Toleillo\Vottun\VottunSDK;

class Web3Client extends VottunSDK {

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function deploy(
        int     $contractSpecsId,
        string  $sender,
        int     $blockchainNetwork,
        array   $params,
        ?int    $gasLimit,
        ?int    $nonce,
        ?string $myReference,
        ?string $alias

    ): array
    {
        return $this->makeRequest('/core/v1/evm/contract/deploy', 'POST', [
            'contractSpecsId' => $contractSpecsId,
            'sender' => $sender,
            'blockchainNetwork' => $blockchainNetwork,
            'gasLimit' => $gasLimit,
            'nonce' => $nonce,
            'myReference' => $myReference,
            'alias' => $alias,
            'params' => $params
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function transactMutable(
        string  $contractAddress,
        string  $method,
        string  $sender,
        int     $blockchainNetwork,
        array   $params,
        ?int    $contractSpecsId,
        ?int    $value,
        ?int    $gasLimit,
        ?int    $gasPrice,
        ?int    $nonce,
        ?string $myReference,
        ?string $alias

    ): array
    {
        return $this->makeRequest('/core/v1/evm/transact/mutable', 'POST', [
            'contractAddress' => $contractAddress,
            'method' => $method,
            'sender' => $sender,
            'blockchainNetwork' => $blockchainNetwork,
            'contractSpecsId' => $contractSpecsId,
            'value' => $value,
            'gasLimit' => $gasLimit,
            'gasPrice' => $gasPrice,
            'nonce' => $nonce,
            'myReference' => $myReference,
            'alias' => $alias,
            'params' => $params
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function transactView(
        string  $contractAddress,
        string  $method,
        int     $blockchainNetwork,
        array   $params,
        ?int    $contractSpecsId

    ): array
    {
        return $this->makeRequest('/core/v1/evm/transact/view', 'POST', [
            'contractAddress' => $contractAddress,
            'method' => $method,
            'blockchainNetwork' => $blockchainNetwork,
            'contractSpecsId' => $contractSpecsId,
            'params' => $params
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function chains(): array
    {
        return $this->makeRequest('/core/v1/evm/info/chains');
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function specs(): array
    {
        return $this->makeRequest('/core/v1/evm/info/specs');
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function transactionInfo(string $hash, int $blockchainNetwork): array
    {
        return $this->makeRequest('/core/v1/evm/info/transaction/' . $hash . '?network=' . $blockchainNetwork);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function transactionStatus(string $hash, int $blockchainNetwork): array
    {
        return $this->makeRequest('/core/v1/evm/info/transaction/' . $hash . '/status?network=' . $blockchainNetwork);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function transactionReference(string $ref): array
    {
        return $this->makeRequest('/core/v1/evm/info/transaction/reference/' . $ref);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function gasPrice(int $blockchainNetwork): array
    {
        return $this->makeRequest('/core/v1/evm/network/gasprice?network=' . $blockchainNetwork);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function balance(string $account, int $blockchainNetwork): array
    {
        return $this->makeRequest('/core/v1/evm/chain/' . $account . '/balance?network=' . $blockchainNetwork);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function estimateContractGas(
        string  $sender,
        int     $blockchainNetwork,
        int     $contractSpecsId,
        array   $params


    ): array
    {
        return $this->makeRequest('/core/v1/evm/contract/deploy/estimategas', 'POST', [
            'sender' => $sender,
            'blockchainNetwork' => $blockchainNetwork,
            'contractSpecsId' => $contractSpecsId,
            'params' => $params
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function estimateMutableGas(
        string  $contractAddress,
        string  $sender,
        string  $method,
        int     $blockchainNetwork,
        int     $contractSpecsId,
        array   $params,
        ?int    $value
    ): array
    {
        return $this->makeRequest('/core/v1/evm/transact/mutable/estimategas', 'POST', [
            'contractAddress' => $contractAddress,
            'sender' => $sender,
            'blockchainNetwork' => $blockchainNetwork,
            'method' => $method,
            'contractSpecsId' => $contractSpecsId,
            'value' => $value,
            'params' => $params
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function estimateNativeGas(
        string  $sender,
        string  $recipient,
        int     $blockchainNetwork,
        int    $value
    ): array
    {
        return $this->makeRequest('/core/v1/evm/chain/transfer/estimategas', 'POST', [
            'sender' => $sender,
            'recipient' => $recipient,
            'blockchainNetwork' => $blockchainNetwork,
            'value' => $value
        ]);
    }
}
