<?php

namespace Adiq\Beans;

class LineItem
{
    /**
     * @var string
     */
    private $productCode;

    /**
     * @var string
     */
    private $productSku;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var string
     */
    private $quantity;

    /**
     * @var string
     */
    private $unitPrice;

    public function __construct()
    {
    }

    /**
     * Tipo do produto - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * Tipo do produto - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setProductCode(string $value)
    {
        $this->productCode = $value;
        return $this;
    }

    /**
     * Identificador do produto na loja - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getProductSKU()
    {
        return $this->productSku;
    }

    /**
     * Identificador do produto na loja - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setProductSKU(string $value)
    {
        $this->productSku = $value;
        return $this;
    }

    /**
     * Nome do produto - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Nome do produto - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setProductName(string $value)
    {
        $this->productName = $value;
        return $this;
    }

    /**
     * Quantidade dos produtos sendo adquiridos - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Quantidade dos produtos sendo adquiridos - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setQuantity(string $value)
    {
        $this->quantity = $value;
        return $this;
    }

    /**
     * Preço do produto (por item) - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * Preço do produto (por item) - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setUnitPrice(string $value)
    {
        $this->unitPrice = $value;
        return $this;
    }

    /**
     * Converts to data array
     *
     * @return void
     */
    public function getLineItemData()
    {
        return [
            'ProductCode' => $this->productCode,
            'ProductSKU' => $this->productSku,
            'ProductName' => $this->productName,
            'Quantity' => $this->quantity,
            'UnitPrice' => $this->unitPrice,
        ];
    }
}
