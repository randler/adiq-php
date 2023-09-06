<?php

namespace Adiq\Beans;

class SellerInfo
{
    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var string
     */
    private $softDescriptor;

    /**
     * @var int
     */
    private $dynamicMcc;

    /**
     * @var string
     */
    private $cavvUcaf;

    /**
     * @var string
     */
    private $eci;

    /**
     * @var string
     */
    private $xid;

    /**
     * @var string
     */
    private $code3DS;

    /**
     * @var string
     */
    private $urlSite3DS;


    /**
     * @var string
     */
    private $programProtocol;

    /**
     * Get the value of orderNumber
     *
     * @return  string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Set the value of orderNumber
     *
     * @param   string  $orderNumber  
     *
     */
    public function setOrderNumber(string $orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * Get the value of softDescriptor
     *
     * @return  string
     */
    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    /**
     * Set the value of softDescriptor
     *
     * @param   string  $softDescriptor  
     *
     */
    public function setSoftDescriptor(string $softDescriptor)
    {
        $this->softDescriptor = $softDescriptor;
        return $this;
    }

    /**
     * Get the value of dynamicMcc
     *
     * @return  int
     */
    public function getDynamicMcc()
    {
        return $this->dynamicMcc;
    }

    /**
     * Set the value of dynamicMcc
     *
     * @param   int  $dynamicMcc  
     *
     */
    public function setDynamicMcc(int $dynamicMcc)
    {
        $this->dynamicMcc = $dynamicMcc;
        return $this;
    }

    /**
     * Get the value of cavvUcaf
     *
     * @return  string
     */
    public function getCavvUcaf()
    {
        return $this->cavvUcaf;
    }

    /**
     * Set the value of cavvUcaf
     *
     * @param   string  $cavvUcaf  
     *
     */
    public function setCavvUcaf(string $cavvUcaf)
    {
        $this->cavvUcaf = $cavvUcaf;
        return $this;
    }

    /**
     * Get the value of eci
     *
     * @return  string
     */
    public function getEci()
    {
        return $this->eci;
    }

    /**
     * Set the value of eci
     *
     * @param   string  $eci  
     *
     */
    public function setEci(string $eci)
    {
        $this->eci = $eci;
        return $this;
    }

    /**
     * Get the value of xid
     *
     * @return  string
     */
    public function getXid()
    {
        return $this->xid;
    }

    /**
     * Set the value of xid
     *
     * @param   string  $xid  
     *
     */
    public function setXid(string $xid)
    {
        $this->xid = $xid;
        return $this;
    }

    /**
     * Get the value of programProtocol
     *
     * @return  string
     */
    public function getProgramProtocol()
    {
        return $this->programProtocol;
    }

    /**
     * Set the value of programProtocol
     *
     * @param   string  $programProtocol  
     *
     */
    public function setProgramProtocol(string $programProtocol)
    {
        $this->programProtocol = $programProtocol;
        return $this;
    }

    /**
     * Get the value of code3DS
     *
     * @return  string
     */
    public function getCode3DS()
    {
        return $this->code3DS;
    }

    /**
     * Set the value of code3DS
     *
     * @param   string  $code3DS  
     *
     */
    public function setCode3DS(string $code3DS)
    {
        $this->code3DS = $code3DS;
        return $this;
    }

    /**
     * Get the value of urlSite3DS
     *
     * @return  string
     */
    public function getUrlSite3DS()
    {
        return $this->urlSite3DS;
    }

    /**
     * Set the value of urlSite3DS
     *
     * @param   string  $urlSite3DS
     *
     */
    public function setUrlSite3DS(string $urlSite3DS)
    {
        $this->urlSite3DS = $urlSite3DS;
        return $this;
    }

    /**
     * Get the value of programProtocol
     *
     * @return  string
     */
    public function getSellerInfoData()
    {
        return [
            "orderNumber" => $this->orderNumber,
            "softDescriptor" => $this->softDescriptor,
            "dynamicMcc" => $this->dynamicMcc,
            "cavvUcaf" => $this->cavvUcaf,
            "eci" => $this->eci,
            "xid" => $this->xid,
            "programProtocol" => $this->programProtocol,
            "code3DS" => $this->code3DS,
            "urlSite3DS" => $this->urlSite3DS,
        ];
    }
}
