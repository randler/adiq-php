<?php

namespace Adiq\Beans;

class CustomerCard
{
    
    /**
    * @var string
    */
    private $vaultId;

    /**
    * @var string
    */
    private $numberToken;
    
    /**
    * @var string
    */
    private $cardNumber;

    /**
    * @var string
    */
    private $cardholderName;
    
    /**
    * @var bool
    */
    private $verifyCard = false;

    /**
    * @var string
    */
    private $securityCode;

    /**
    * @var string | visa, mastercard, amex, elo
    */
    private $brand;

    /**
    * @var string
    */
    private $expirationMonth;

    /**
    * @var string
    */
    private $expirationYear;

    public function __construct() {}

    /**
     * Get the value of vaultId
     *
     * @return  string
     */ 
    public function getVaultId()
    {
        return $this->vaultId;
    }

	/**
	 * Set the value of vaultId
	 *
	 * @param   string  $vaultId  
	 *
	 */
	public function setVaultId(string $vaultId)
	{
		$this->vaultId = $vaultId;
        return $this;
	}

    /**
     * Get the value of numberToken
     *
     * @return  string
     */ 
    public function getNumberToken()
    {
        return $this->numberToken;
    }

	/**
	 * Set the value of numberToken
	 *
	 * @param   string  $numberToken  
	 *
	 */
	public function setNumberToken(string $numberToken)
	{
		$this->numberToken = $numberToken;
        return $this;
	}

    /**
     * Get the value of cardholderName
     *
     * @return  string
     */ 
    public function getCardholderName()
    {
        return $this->cardholderName;
    }

	/**
	 * Set the value of cardholderName
	 *
	 * @param   string  $cardholderName  
	 *
	 */
	public function setCardholderName(string $cardholderName)
	{
		$this->cardholderName = $cardholderName;
        return $this;
	}

    /**
     * Get the value of securityCode
     *
     * @return  string
     */ 
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

	/**
	 * Set the value of securityCode
	 *
	 * @param   string  $securityCode  
	 *
	 */
	public function setSecurityCode(string $securityCode)
	{
		$this->securityCode = $securityCode;
        return $this;
	}

    /**
     * Get the value of brand
     *
     * @return  string
     */ 
    public function getBrand()
    {
        return $this->brand;
    }

	/**
	 * Set the value of brand
	 *
	 * @param   string  $brand  
	 *
	 */
	public function setBrand(string $brand)
	{
		$this->brand = $brand;
        return $this;
	}

    /**
     * Get the value of expirationMonth
     *
     * @return  string
     */ 
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

	/**
	 * Set the value of expirationMonth
	 *
	 * @param   string  $expirationMonth  
	 *
	 */
	public function setExpirationMonth(string $expirationMonth)
	{
		$this->expirationMonth = $expirationMonth;
        return $this;
	}

    /**
     * Get the value of expirationYear
     *
     * @return  string
     */ 
    public function getExpirationYear()
    {
        return $this->expirationYear;
    }

	/**
	 * Set the value of expirationYear
	 *
	 * @param   string  $expirationYear  
	 *
	 */
	public function setExpirationYear(string $expirationYear)
	{
		$this->expirationYear = $expirationYear;
        return $this;
	}

        /**
     * Get the value of expirationYear
     *
     * @return  array
     */ 
    public function getCardData()
    {
        return [
            "vaultId" => $this->vaultId,
            "numberToken" => $this->numberToken,
            "cardholderName" => $this->cardholderName,
            "securityCode" => $this->securityCode,
            "brand" => $this->brand,
            "verifyCard" => $this->verifyCard,
            "expirationMonth" => $this->expirationMonth,
            "expirationYear" => $this->expirationYear
        ];
    }

    /**
     * Get the value of cardNumber
     *
     * @return  array
     */ 
    public function getCardNumberData()
    {
        return ["cardNumber" => $this->cardNumber];
    }

	/**
	 * Set the value of cardNumber
	 *
	 * @param   string  $cardNumber  
	 * 
	 * return $this
	 *
	 */
	public function setCardNumber(string $cardNumber)
	{
		$this->cardNumber = $cardNumber;
		return $this;
	}

    /**
     * Get the value of verifyCard
     *
     * @return  bool
     */ 
    public function getVerifyCard()
    {
        return $this->verifyCard;
    }

	/**
	 * Set the value of verifyCard
	 *
	 * @param   bool  $verifyCard  
	 * 
	 * return $this
	 *
	 */
	public function setVerifyCard(bool $verifyCard)
	{
		$this->verifyCard = $verifyCard;
		return $this;
	}
}

