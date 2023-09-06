<?php

namespace Adiq\Beans;

class ShipTo
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $complement;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $country;


    public function __construct()
    {
    }

    /**
     * Primeiro nome do comprador - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Primeiro nome do comprador - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setFirstName(string $value)
    {
        $this->firstName = $value;
        return $this;
    }

    /**
     * Último nome do comprador - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Último nome do comprador - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setLastName(string $value)
    {
        $this->lastName = $value;
        return $this;
    }

    /**
     * Telefone do comprador (sem máscara) - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Telefone do comprador (sem máscara) - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setPhoneNumber(string $value)
    {
        $this->phoneNumber = $value;
        return $this;
    }

    /**
     * Endereço do comprador - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Endereço do comprador - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setAddress(string $value)
    {
        $this->address = $value;
        return $this;
    }

    /**
     * Complemento do endereço do comprador - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Complemento do endereço do comprador - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setComplement(string $value)
    {
        $this->complement = $value;
        return $this;
    }

    /**
     * Cidade do comprador - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Cidade do comprador - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setCity(string $value)
    {
        $this->city = $value;
        return $this;
    }

    /**
     * Estado do comprador - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Estado do comprador - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setState(string $value)
    {
        $this->state = $value;
        return $this;
    }

    /**
     * CEP comprador (sem máscara) - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * CEP comprador (sem máscara) - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setZipCode(string $value)
    {
        $this->zipCode = $value;
        return $this;
    }

    /**
     * Pais do endereço do comprador - Obrigatório para antifraude.
     *
     * @return void
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Pais do endereço do comprador - Obrigatório para antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setCountry(string $value)
    {
        $this->country = $value;
        return $this;
    }

    /**
     * Converts to data array
     *
     * @return void
     */
    public function getShipToData()
    {
        return [
            'FirstName' => $this->firstName,
            'LastName' => $this->lastName,
            'PhoneNumber' => $this->phoneNumber,
            'Address' => $this->address,
            'Complement' => $this->complement,
            'City' => $this->city,
            'State' => $this->state,
            'ZipCode' => $this->zipCode,
            'Country' => $this->country,
        ];
    }
}
