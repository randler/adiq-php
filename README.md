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
    <img src="https://img.shields.io/badge/vers%C3%A3o-0.0.1--beta-green" alt="Versão" />
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
  - [Definindo headers customizados](#definindo-headers-customizados)
- [Requisição de Autenticação](#requisição-de-autenticação)
  - [Solicitando Access Token](#solicitando-access-token)
- [Requisição de Tokenização](#requisição-de-tokenização)
  - [Token de Cartão](#token-de-cartão)
  - [Cofre de Cartão](#cofre-de-cartão)
<br>
<br>


## Instalação

Instale a biblioteca utilizando o comando

`composer require randler/adiq-php`
<br>
<br>


## Configuração

Para incluir a biblioteca em seu projeto, basta fazer o seguinte:

```php
<?php
require('vendor/autoload.php');

$adiq = new Adiq\Client();
```

### Definindo headers customizados

1. Se necessário for é possível definir headers http customizados para os requests. Para isso basta informá-los durante a instanciação do objeto `Client`:

```php
<?php
require('vendor/autoload.php');

$key = new Key();
$key->setClientId("<CLIENT_ID>");
$key->setClientSecret("<CLIENT_SECRET>");

$sandbox = true;

$adiq = new Adiq\Client(
    ['Authorization' => $key->getKeyBase64()],
    $sandbox
); 
```

E então, você pode poderá utilizar o cliente para fazer requisições, como nos exemplos abaixo.
<br>
<br>

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

## Requisição de transação
### Create
[Funcionando - documentando]
<br>

### Detail
[Em Teste - a documentar]
<br>

### Cancel
[Em Teste - a documentar]
<br>

### Capture
[Em Teste - a documentar]
<br>

## Requisição de Marketplace


### Unlock
[Em Teste - a documentar]
<br>

### Update
[Em Teste - a documentar]
<br>
