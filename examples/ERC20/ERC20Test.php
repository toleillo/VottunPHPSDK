<?php

require_once __DIR__ . '/../../autoload.php';

$client = new Toleillo\Vottun\ERC20\ERC20Client(
    'https://api.vottun.tech',
    'APIKEY',
    'APPID'
);

$contract = '0x2357CA...00db80dE1';
$account  = '0x3de906...3f5b93f92';
$network  = 80001; // Polygon Mumbai Testnet;

var_dump($client->name($contract, $network));
// RESPONSE: { "name" : "TOLE" }

var_dump($client->symbol($contract, $network));
// RESPONSE: { "symbol" : "TOLE" }

var_dump($client->totalSupply($contract, $network));
// RESPONSE: { "totalSupply" : 21000000 }

var_dump($client->decimals($contract, $network));
// RESPONSE: { "decimals" : 18 }

var_dump($client->balanceOf(
    $contract,
    $account,
    $network
));
// RESPONSE: { "balance" : 0 }

