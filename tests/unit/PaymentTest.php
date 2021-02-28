<?php
namespace Adiq\Test;

require_once ('vendor/autoload.php');

/** Testes
 * ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/unit/PaymentTest.php
 */

use Adiq\Beans\CustomerCard;
use Adiq\Beans\Items;
use Adiq\Beans\PaymentData;
use Adiq\Beans\SellerInfo;
use Adiq\Beans\Sellers;
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

        //fwrite(STDERR, print_r(json_encode($client->getAccessToken())));

        $payment = new PaymentData();
        $payment->setTransactionType("credit")
                ->setAmount(1035)
                ->setCurrencyCode("brl")
                ->setProductType("avista")
                ->setInstallments(1)
                ->setCaptureType("pa")
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
        $sellerInfo->setOrderNumber("101000000020");
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

        /*$data_request = [
            'payment' => $payment->getPaymentData(),
            'cardInfo' => $cardInfo->getCardData(),
            'sellerInfo' => $sellerInfo->getSellerInfoData(),
            //'sellers' => $sellers->getSellersData()
        ];*/

        //$response = $client->payment()->create($data_request);

        //fwrite(STDERR, print_r($response));

        /*$detail = $client
            ->payment()
            ->details([
                'id' => "020001409102281247420000012620420000000000"
            ]);*/

        /*$data_request = [
            'id' => '010001410902281258440000012620480000000000',
            'amount' => 1035,
            //'sellers' => $sellers->getSellersData()
        ];

        $capture = $client
            ->payment()
            ->capture($data_request);*/
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
        fwrite(STDERR, print_r(json_encode($data_request)));

        $marketplace = $client
            ->marketplace()
            ->unlock($data_request);

        fwrite(STDERR, print_r($marketplace));

        //$response = $client->ride()->details(["id" => 162,"institution_id" => 1, "token" => '$2y$10$u8aWfSLtr3HwFUwrZXSZh.c5cda.rntSyUwEAbW2OEvGTDUGoaIn6']);
        //fwrite(STDERR, print_r($client->getScope()));
        
    }
}
