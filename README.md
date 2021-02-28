<p align="center">
  <a href="https://github.com/randler/adiq-php">
    <img alt="Adiq" src="https://www.adiq.com.br/static/logo-6c8a8337b1a1e6b71cd64a73f0da2f85.png" width="200">
  </a>
</p>

<h1 align="center">
  <a href="https://github.com/randler/adiq-php">
    Gateway Adiq PHP
  </a>
</h1>
<p align="center">
  Biblioteca desenvolvida para facilitar a comunicação com o gateway de pagamento Adiq.
</p>

<p align="center">
  <a href="https://github.com/facebook/react-native/blob/master/LICENSE">
    <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="React Native is released under the MIT license." />
  </a>
  <a href="https://github.com/codificar/delivery-api-php/releases/">
    <img src="https://img.shields.io/badge/vers%C3%A3o-0.0.3-green" alt="Versão" />
  </a>
  <a href="https://github.com/randler/adiq-php/releases">
    <img src="https://img.shields.io/packagist/dt/randler/adiq-php.svg" alt="Downloads" />
  </a>
</p>

# Introdução

Essa SDK foi construída com o intuito de tornar flexível as chamadas dos metodos de pagamento, de forma que todos possam utilizar todas as features, de todas as versões de API.

Você pode acessar a documentação oficial da API acessando esse [link](https://developers.adiq.io/manual/ecommerce#vis%C3%A3o-geral-adiq-e-commerce).


## Índice

- [Instalação](#instalação)
- [Configuração](#configuração)
- [Requisição de Autenticação](#requisição-de-autenticação)
  - [Solicitando Access Token](#solicitando-access-token)
- [Requisição de Tokenização](#requisição-de-tokenização)
  - [Token de Cartão](#token-de-cartão)
  - [Cofre de Cartão](#cofre-de-cartão)
- [Requisição de Transação](#requisição-de-transação)
  - [Criar transação](#criar-transação)
  - [Detalhe de uma transação](#detalhe-de-uma-transação)
  - [Cancelar uma transação](#cancelar-uma-transação)
  - [Capturar uma transação](#capturar-uma-transação)
- [Requisição de Marketplace](#requisição-de-marketplace)
  - [Unlock](#unlock)
  - [Update](#update)
<br>
<br>
<br>
<br>


## Instalação

Instale a biblioteca utilizando o comando

`composer require randler/adiq-php`
<br>
<br>
<hr>

## Configuração

Para incluir a biblioteca em seu projeto, basta fazer o seguinte:

```php
<?php
require('vendor/autoload.php');

$adiq = new Adiq\Client();
```
<br>
<br>
<hr>

## Requisição de Autenticação

Nesta seção será explicado como realizar requisições autorização no Adiq.
<br>

### Solicitando Access Token

```php
<?php

  $optionRequestAuth = [
      "grantType" => "client_credentials",
  ];
  
  $sandbox = true;

  $key = new Key();
  $key->setClientId("<CLIENT_ID>");
  $key->setClientSecret("<CLIENT_SECRET>");
  
  $client = new Client(
    ['Authorization' => $key->getKeyBase64()], 
    $sandbox
  );
  
  $client->auth()->token($optionRequestAuth);
```

Caso as chaves estajam corretas os dados de acesso serão armazenado no objeto `$client` e podem ser visualizados com seus metodos get especificos. esse objeto pode ser usado para a requisição sem a necessidade de salvar o token, ou reenvia-lo ou remontar o header novamente.
<br>
<br>
<hr>

## Requisição de Tokenização

Nesta seção será explicado como realizar requisições para cartão pelok Adiq com essa biblioteca.
<br>

### Token de Cartão

```php
<?php
 $cardInfo = new CustomerCard();
  $cardInfo->setCardNumber("5201561050025011");

  $data_card = $cardInfo->getCardNumberData();

  $response = $client->card()->create($data_card);
?>
```
<br>

### Cofre de Cartão

Apos obter o numberToken do cartão, na requisição anterior, é possivel agora armazenar os dados do cartão. 

```php
<?php
 $numberToken = $response->numberToken;

  $cardInfo->setNumberToken($numberToken)
      ->setBrand("visa")
      ->setCardholderName("JOSE SILVA")
      ->setExpirationMonth("01")
      ->setExpirationYear("19")
      ->setVerifyCard(true)
      ->setSecurityCode("123");

  $data_card = $cardInfo->getCardData();
  
  $response = $client->card()->vaults($data_card);
?>
```
<br>
<br>
<hr>

## Requisição de transação
Com a requisição do `$client` com o accessToken já armazenado é possivel fazer a solicitação de transação.

<br>

### Criar Transação
```php

 // Requisição de token funcionando
  $client->auth()->token($optionRequestAuth);

  $payment = new PaymentData();
  $payment->setTransactionType("credit")
          ->setAmount(1035)
          ->setCurrencyCode("brl")
          ->setProductType("avista")
          ->setInstallments(1)
          ->setCaptureType("ac")
          ->setRecurrent(false);

  $cardInfo = new CustomerCard();
  $cardInfo->setVaultId("19e0c891-ff29-41a5-bc88-c4f253c7c2f5")
      ->setNumberToken("39c6426b-3160-41d2-9cbd-55b32410fe90")
      ->setCardholderName("JOSE SILVA")
      ->setSecurityCode("123")
      ->setBrand("visa")
      ->setExpirationMonth("01")
      ->setExpirationYear("19");
  
  $sellerInfo = new SellerInfo();
  $sellerInfo->setOrderNumber("00100000001");
      /*->setSoftDescriptor("PAG*TESTE")
      ->setDynamicMcc("9999")
      ->setCavvUcaf("commerceauth")
      ->setEci("05")
      ->setXid("commerc")
      ->setProgramProtocol("2.0.1");*/

  // Items de Sellers
  
  $item1 = new Items();
  $item1->setId("P115DU90")
      ->setDescription("Produto 1")
      ->setAmount(345)
      ->setRatePercent(0)
      ->setRateAmount(0);

  $item2 = new Items();
  $item2->setId("P115DU91")
      ->setDescription("Produto 2")
      ->setAmount(345)
      ->setRatePercent(0)
      ->setRateAmount(0);

  $item3 = new Items();
  $item3->setId("P115DU92")
      ->setDescription("Produto 3")
      ->setAmount(345)
      ->setRatePercent(0)
      ->setRateAmount(0);

  $sellers1 = new Sellers();
  $sellers1->setId("000A1")
      ->setAmount(690)
      ->setItems([
          $item1->getItemsData(), 
          $item2->getItemsData()
      ]);

  $sellers2 = new Sellers();
  $sellers2->setId("00B1")
      ->setAmount(345)
      ->setItems([$item3->getItemsData()]);

  $sellers = new Sellers();
  $sellers->addSellers($sellers1);
  $sellers->addSellers($sellers2);

  $data_request = [
      'payment' => $payment->getPaymentData(),
      'cardInfo' => $cardInfo->getCardData(),
      'sellerInfo' => $sellerInfo->getSellerInfoData(),
      //'sellers' => $sellers->getSellersData() // - opcional
  ];

  $response = $client->payment()->create($data_request);
```
<br>

### Detalhe de uma transação
```php
  $detail = $client
    ->payment()
    ->details([
        'id' => "020001409102281247420000012620420000000000"
    ]);

```
<br>

### Cancelar uma transação
```php
  $cancel = $client
      ->payment()
      ->cancel([
        'id' => '010001410902281258440000012620480000000000'
      ]);
```
<br>

### Capturar uma transação
```php
  $data_request = [
      'id' => '010001410902281258440000012620480000000000',
      'amount' => 1035,
      //'sellers' => $sellers->getSellersData()
  ];

  $capture = $client
      ->payment()
      ->capture($data_request);
```
<br>
<br>
<hr>

## Requisição de Marketplace
### Unlock
```php
  $item1 = new Items();
  $item1->setId("P115DU90")
      ->setAmount(345);

  $sellers1->setId("000A1")
      ->setAmount(345)
      ->setItems(
          $item1->getItemsMarketplaceData()
      );

  $data_request = [
      'id' => '010001410902281258440000012620480000000000',
      "sellerId" => $sellers1->getId(),
      "amount" => $sellers1->getAmount(),
      "date" => date("Y-m-d"),
      "item" => $sellers1->getItems()
  ];

  $marketplace = $client
      ->marketplace()
      ->unlock($data_request);
```
<br>

### Update
```php
  $item1 = new Items();
  $item1->setId("P115DU90")
      ->setAmount(345);

  $sellers1->setId("000A1")
      ->setAmount(345)
      ->setItems(
          $item1->getItemsMarketplaceData()
      );

  $data_request = [
      'id' => '010001410902281258440000012620480000000000',
      "sellerId" => $sellers1->getId(),
      "amount" => $sellers1->getAmount(),
      "date" => date("Y-m-d"),
      "previousDate" => "2019-11-13",
      "item" => $sellers1->getItems()
  ];

  $marketplace = $client
      ->marketplace()
      ->update($data_request);
```
<br>
