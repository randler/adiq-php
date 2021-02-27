<?php

namespace Adiq\Beans;

class Sellers
{
    /**
    * @var array
    */
    private $sellers = [];
    
    /**
    * @var string
    */
    private $id;

    /**
    * @var int
    */
    private $amount;

    /**
    * @var array
    */
    private $items;


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
     * Get the value of items
     *
     * @return  array
     */ 
    public function getItems()
    {
        return $this->items;
    }

	/**
	 * Set the value of items
	 *
	 * @param   array  $items  
	 * 
	 * return $this
	 *
	 */
	public function setItems(array $items)
	{
		$this->items = $items;
		return $this;
	}

    /**
     * Get the value of sellers
     *
     * @return  array
     */ 
    public function getSellers()
    {
        return [
			"id" => $this->id, 
            "amount" => $this->amount, 
            "items" => $this->items
		];
    }

	/**
	 * Set the value of sellers
	 *
	 * @param   array  $sellers  
	 * 
	 * return $this
	 *
	 */
	public function setSellers(array $sellers)
	{
		$this->sellers = $sellers;
		return $this;
	}

	/**
	 * Set the value of seller
	 *
	 * @param   Sellers  $seller  
	 * 
	 *
	 */
	public function addSellers(Sellers $seller)
	{
        array_push($this->sellers, $seller->getSellers());
	}

	/**
     * Get the value of sellers
     *
     * @return  array
     */ 
    public function getSellersData()
    {
		$out = [];
		foreach($this->sellers as $seller) {
			$sellerTemp = [
				"id" => $seller['id'],
				"amount" => $seller['amount'],
				"items" => $seller['items']
			];
			array_push($out, $sellerTemp);
		}
		return $out;
    }
}

