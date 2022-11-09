<?php

namespace Adiq\Beans;

class Customer
{
    /**
     * @var int | 1-cpf, 2-cnpj
     */
    private $documentType;

    /**
     * @var string
     */
    private $documentNumber;

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
    private $email;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $mobilePhoneNumber;

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
    private $country;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $ipAddress;

    public function __construct()
    {
    }

    /**
     * Tipo do documento de identificação do comprador(CPF, CNPJ)
     *
     * @return void
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Tipo do documento de identificação do comprador(CPF, CNPJ)
     *
     * @param string $value | cpf, cnpj
     * @return void
     */
    public function setDocumentType(int $value)
    {
        $this->documentType = $value;
        return $this;
    }

    /**
     * Número do documento do comprador sem pontuação (sem máscara)
     *
     * @return void
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * Número do documento do comprador sem pontuação (sem máscara)
     *
     * @param string $value
     * @return void
     */
    public function setDocumentNumber(string $value)
    {
        $this->documentNumber = $value;
        return $this;
    }

    /**
     * Primeiro nome do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Primeiro nome do comprador - Obrigatório para 3DS/antifraude.
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
     * Último nome do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Último nome do comprador - Obrigatório para 3DS/antifraude.
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
     * E-mail do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * E-mail do comprador - Obrigatório para 3DS/antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setEmail(string $value)
    {
        $this->email = $value;
        return $this;
    }

    /**
     * Telefone do comprador (sem máscara) - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Telefone do comprador (sem máscara) - Obrigatório para 3DS/antifraude.
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
     * 	Telefone celular do comprador (sem máscara) - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    /**
     * Telefone celular do comprador (sem máscara) - Obrigatório para 3DS/antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setMobilePhoneNumber(string $value)
    {
        $this->mobilePhoneNumber = $value;
        return $this;
    }

    /**
     * Endereço do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Endereço do comprador - Obrigatório para 3DS/antifraude.
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
     * Complemento do endereço do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Complemento do endereço do comprador - Obrigatório para 3DS/antifraude.
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
     * Cidade do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Cidade do comprador - Obrigatório para 3DS/antifraude.
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
     * Estado do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Estado do comprador - Obrigatório para 3DS/antifraude.
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
     * País do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * País do comprador - Obrigatório para 3DS/antifraude.
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
     * CEP comprador (sem máscara) - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * CEP comprador (sem máscara) - Obrigatório para 3DS/antifraude.
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
     * Endereço IP do dispositivo do comprador - Obrigatório para 3DS/antifraude.
     *
     * @return void
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Endereço IP do dispositivo do comprador - Obrigatório para 3DS/antifraude.
     *
     * @param string $value
     * @return void
     */
    public function setIpAddress(string $value)
    {
        $this->ipAddress = $value;
        return $this;
    }

    /**
     * Converts to data array
     *
     * @return void
     */
    public function getCustomerData()
    {
        return [
            'DocumentType' => $this->documentType,
            'DocumentNumber' => $this->documentNumber,
            'FirstName' => $this->firstName,
            'LastName' => $this->lastName,
            'Email' => $this->email,
            'PhoneNumber' => $this->phoneNumber,
            'MobilePhoneNumber' => $this->mobilePhoneNumber,
            'Address' => $this->address,
            'Complement' => $this->complement,
            'City' => $this->city,
            'State' => $this->state,
            'ZipCode' => $this->zipCode,
            'IpAddress' => $this->ipAddress,
        ];
    }
}
