<?php

namespace Toleillo\Vottun\ERC20;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

use Toleillo\Vottun\VottunSDK;

class ERC20Client extends VottunSDK {

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function deploy(
        string $tokenName,
        string $symbol,
        string $alias,
        int $initialSupply,
        int $network,
        ?int $gasLimit
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/deploy', 'POST', [
            'name' => $tokenName,
            'symbol' => $symbol,
            'alias' => $alias,
            'initialSupply' => $initialSupply,
            'network' => $network,
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
        string $recipient,
        int $network,
        int $amount,
        ?int $gasLimit
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/transfer', 'POST', [
            'contractAddress' => $contractAddress,
            'recipient' => $recipient,
            'network' => $network,
            'amount' => $amount,
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
    public function transferFrom(
        string $contractAddress,
        string $sender,
        string $recipient,
        int $network,
        int $amount,
        ?int $gasLimit
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/transferFrom', 'POST', [
            'contractAddress' => $contractAddress,
            'sender' => $sender,
            'recipient' => $recipient,
            'network' => $network,
            'amount' => $amount,
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
    public function increaseAllowance(
        string $contractAddress,
        string $spender,
        int $network,
        int $addedValue,
        ?int $gasLimit
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/increaseAllowance', 'POST', [
            'contractAddress' => $contractAddress,
            'spender' => $spender,
            'network' => $network,
            'gasLimit' => $gasLimit,
            'addedValue' => $addedValue
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function decreaseAllowance(
        string $contractAddress,
        string $spender,
        int $network,
        int $substractedValue,
        ?int $gasLimit
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/decreaseAllowance', 'POST', [
            'contractAddress' => $contractAddress,
            'spender' => $spender,
            'network' => $network,
            'gasLimit' => $gasLimit,
            'substractedValue' => $substractedValue
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function allowance(
        string $contractAddress,
        string $owner,
        string $spender,
        int $network,
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/allowance', 'GET', [
            'contractAddress' => $contractAddress,
            'owner' => $owner,
            'spender' => $spender,
            'network' =>  $network
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function name(
        string $contractAddress,
        int $network,
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/name', 'POST', [
            'contractAddress' => $contractAddress,
            'network' =>  $network
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function symbol(
        string $contractAddress,
        int $network,
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/symbol', 'POST', [
            'contractAddress' => $contractAddress,
            'network' =>  $network
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function totalSupply(
        string $contractAddress,
        int $network,
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/totalSupply', 'POST', [
            'contractAddress' => $contractAddress,
            'network' =>  $network
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function decimals(
        string $contractAddress,
        int $network,
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/decimals', 'POST', [
            'contractAddress' => $contractAddress,
            'network' =>  $network
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
        string $address,
        int $network,
    ): array
    {
        return $this->makeRequest('/erc/v1/erc20/balanceOf', 'POST', [
            'contractAddress' => $contractAddress,
            'address' => $address,
            'network' =>  $network
        ]);
    }
}
