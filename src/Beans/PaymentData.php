<?php

namespace Adiq\Beans;

class PaymentData
{

    /**
    * @var string | credit, debit
    */
    private $transactionType;

    /**
    * @var int
    */
    private $amount;

    /**
    * @var string | brl
    */
    private $currencyCode = 'brl';

    /**
    * @var string | avista, emissor, lojista, debito
    */
    private $productType;

    /**
    * @var int
    */
    private $installments = 1;

    /**
    * @var string | ac-Autoriza e captura, pa-Pré-Autoriza
    */
    private $captureType;

    /**
    * @var bool | true - Recorrente, false - Não recorrente
    */
    private $recurrent = false;

    public function __construct() {}

    /**
     * Get the value of transactionType
     *
     * @return  string
     */ 
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * Set the value of transactionType
     *
     * @param  string  $transactionType | credit, debit
     *
     */ 
    public function setTransactionType(string $transactionType)
    {
        $this->transactionType = $transactionType;
        return $this;
    }

    /**
     * Get the value of amount
     *
     * @return  int
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @param  int  $amount
     *
     */ 
    public function setAmount(int $amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get the value of currencyCode
     *
     * @return  string
     */ 
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set the value of currencyCode
     *
     * @param  string  $currencyCode | brl
     *
     */ 
    public function setCurrencyCode(string $currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Get the value of productType
     *
     * @return  string
     */ 
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Set the value of productType
     *
     * @param  string  $productType | avista, emissor, lojista, debito
     *
     */ 
    public function setProductType(string $productType)
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * Get the value of installments
     *
     * @return  int
     */ 
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * Set the value of installments
     *
     * @param  int  $installments
     *
     */ 
    public function setInstallments(int $installments)
    {
        $this->installments = $installments;
        return $this;
    }

    /**
     * Get the value of captureType
     *
     * @return  string
     */ 
    public function getCaptureType()
    {
        return $this->captureType;
    }

    /**
     * Set the value of captureType
     *
     * @param  string  $captureType | ac-Autoriza e captura, pa-Pré-Autoriza
     *
     */ 
    public function setCaptureType(string $captureType)
    {
        $this->captureType = $captureType;
        return $this;
    }

    /**
     * Get the value of recurrent
     *
     * @return  string
     */ 
    public function getRecurrent()
    {
        return $this->recurrent;
    }

    /**
     * Set the value of recurrent
     *
     * @param  string  $recurrent | true - Recorrente, false - Não recorrente
     *
     */ 
    public function setRecurrent(bool $recurrent)
    {
        $this->recurrent = $recurrent;
        return $this;
    }

    /**
     * Get the value of recurrent
     *
     * @return  array
     */ 
    public function getPaymentData()
    {
        return [
            "transactionType" => $this->transactionType,
            "amount" => $this->amount,
            "currencyCode" => $this->currencyCode,
            "productType" => $this->productType,
            "installments" => $this->installments,
            "captureType" => $this->captureType,
            "recurrent" => $this->recurrent
        ];
    }


}

