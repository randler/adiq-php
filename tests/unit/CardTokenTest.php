<?php
namespace Adiq\Test;

require_once ('vendor/autoload.php');

/** Testes
 * ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/unit/CardTokenTest.php
 */

use Adiq\Beans\CustomerCard;
use Adiq\Client;
use Adiq\Key;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testRequestAuth()
    {
        $optionRequestAuth = [
            "grantType" => "client_credentials",
        ];
        
        $key = new Key();
        $key->setClientId("A1EF2F6F-8BA0-4C2F-91EA-8E1603D9FD7D");
        $key->setClientSecret("93D46FF3-B98C-4BFF-92CD-3A3A58BDD371");
        
        $client = new Client(['Authorization' => $key->getKeyBase64()], true);
        
        // Requisição de token funcionando
        $client->auth()->token($optionRequestAuth);

        $cardInfo = new CustomerCard();
        $cardInfo->setCardNumber("5201561050025011");

        $data_card = $cardInfo->getCardNumberData();

        $response = $client->card()->create($data_card);
        
        fwrite(STDERR, print_r($response));

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
        fwrite(STDERR, print_r($response));

        
    }
}
