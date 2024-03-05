<?php

require_once __DIR__ . '/../../autoload.php';

$client = new Toleillo\Vottun\NFT721\NFT721Client(
    'https://api.vottun.tech',
    'APIKEY',
    'APPID'
);

$contract = '0x2357CA...00db80dE1';
$account  = '0x3de906...3f5b93f92';
$fromAddress  = '0x3de906...3f5b93f92';
$toAddress  = '0x3de906...3f5b93f93';
$network  = 80001; // Polygon Mumbai Testnet;

var_dump($client->deploy(
    'NFT Name',
    'SYMBOL',
    $network,
    6000000, // GAS
    'My first 721 contract'
));
// RESPONSE: {
//    "contractAddress": "0x9a89cef53a044..2acfc3a66153408adf",
//    "txHash": "0xb3ba0828ac232c48b69bb3..63ddfef73b5d6860a82a6"
// }

var_dump($client->mint(
    $account,
    1, // ID
    'URI',
    'URIHASH',
    $network,
    $contract,
    5, // ROYALTY PERCENT
    '3000000' // GAS

));
// RESPONSE: {
//    "txHash": "0xb3ba0828ac232c48b69bb3..63ddfef73b5d6860a82a6",
//    "nonce": 27
// }

var_dump($client->transfer(
    $contract,
    $network,
    1, // ID
    $fromAddress,
    $toAddress

));
// RESPONSE: {
//    "txHash": "0xb3ba0828ac232c48b69bb3..63ddfef73b5d6860a82a6",
//    "nonce": 27
// }

var_dump($client->balanceOf(
    $contract,
    $network,
    $account
));
// RESPONSE: { "balance" : 0 }

var_dump($client->tokenUri(
    $contract,
    $network,
    1 // NFT ID
));
// RESPONSE: {
//    "uri": "https://ipfsgw.vottun.tech/ipfs/QmSdQEwYVjQc..kZBDp62XLyzrZE/3.json"
// }


var_dump($client->ownerOf(
    $contract,
    $network,
    1 // NFT ID
));
// RESPONSE: { "owner": "0x8c437496d4b31..4cd47863732165a3"}

