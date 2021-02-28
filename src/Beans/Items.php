<?php

namespace Adiq\Beans;

class Items
{
    /**
    * @var string
    */
    private $id;

    /**
    * @var string
    */
    private $description;

    /**
    * @var int
    */
    private $amount;

    /**
    * @var int
    */
    private $ratePercent;

    /**
    * @var int
    */
    private $rateAmount;


    /**
     * Get the value of id
     *
     * @return  string
     */ 
    public function getId()
    {
        return $this->id;
    }

	/**
	 * Set the value of id
	 *
	 * @param   string  $id  
	 * 
	 * return $this
	 *
	 */
	public function setId(string $id)
	{
		$this->id = $id;
		return $this;
	}

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

	/**
	 * Set the value of description
	 *
	 * @param   string  $description  
	 * 
	 * return $this
	 *
	 */
	public function setDescription(string $description)
	{
		$this->description = $description;
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
	 * @param   int  $amount  
	 * 
	 * return $this
	 *
	 */
	public function setAmount(int $amount)
	{
		$this->amount = $amount;
		return $this;
	}

    /**
     * Get the value of ratePercent
     *
     * @return  int
     */ 
    public function getRatePercent()
    {
        return $this->ratePercent;
    }

	/**
	 * Set the value of ratePercent
	 *
	 * @param   int  $ratePercent  
	 * 
	 * return $this
	 *
	 */
	public function setRatePercent(int $ratePercent)
	{
		$this->ratePercent = $ratePercent;
		return $this;
	}

    /**
     * Get the value of rateAmount
     *
     * @return  int
     */ 
    public function getRateAmount()
    {
        return $this->rateAmount;
    }

	/**
	 * Set the value of rateAmount
	 *
	 * @param   int  $rateAmount  
	 * 
	 * return $this
	 *
	 */
	public function setRateAmount(int $rateAmount)
	{
		$this->rateAmount = $rateAmount;
		return $this;
	}

    /**
     * Get the value of rateAmount
     *
     * @return  array
     */ 
    public function getItemsData()
    {
        return [
            "id" => $this->id,
            "description" => $this->description,
            "amount" => $this->amount,
            "ratePercent" => $this->ratePercent,
            "rateAmount" => $this->rateAmount
        ];
    }

    /**
     * Get the value of rateAmount
     *
     * @return  array
     */ 
    public function getItemsMarketplaceData()
    {
        return [
            "id" => $this->id,
            "amount" => $this->amount
        ];
    }
}

