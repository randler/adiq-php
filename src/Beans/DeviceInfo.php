<?php

namespace Adiq\Beans;

class DeviceInfo
{
    /**
     * @var string
     */
    private $httpAcceptBrowserValue;

    /**
     * @var string
     */
    private $httpAcceptContent;

    /**
     * @var string
     */
    private $httpBrowserLanguage;

    /**
     * @var string
     */
    private $httpBrowserJavaEnabled;

    /**
     * @var string
     */
    private $httpBrowserJavaScriptEnabled;

    /**
     * @var string
     */
    private $httpBrowserColorDepth;

    /**
     * @var string
     */
    private $httpBrowserScreenHeight;

    /**
     * @var string
     */
    private $httpBrowserScreenWidth;

    /**
     * @var string
     */
    private $httpBrowserTimeDifference;

    /**
     * @var string
     */
    private $userAgentBrowserValue;

    public function __construct()
    {
    }

    /**
     * Valor do “Accept Header” do browser do cliente - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpAcceptBrowserValue()
    {
        return $this->httpAcceptBrowserValue;
    }

    /**
     * Valor do “Accept Header” do browser do cliente - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpAcceptBrowserValue(string $value)
    {
        $this->httpAcceptBrowserValue = $value;
        return $this;
    }

    /**
     * Valor exato do HTTP Accept Header - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpAcceptContent()
    {
        return $this->httpAcceptContent;
    }

    /**
     * Valor exato do HTTP Accept Header - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpAcceptContent(string $value)
    {
        $this->httpAcceptContent = $value;
        return $this;
    }

    /**
     * Linguagem do browser do cliente conforme https://www.techonthenet.com/js/language_tags.php - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpBrowserLanguage()
    {
        return $this->httpBrowserLanguage;
    }

    /**
     * Linguagem do browser do cliente conforme https://www.techonthenet.com/js/language_tags.php - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpBrowserLanguage(string $value)
    {
        $this->httpBrowserLanguage = $value;
        return $this;
    }

    /**
     * Se JAVA habilitado enviar valor Y, caso contrário N - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpBrowserJavaEnabled()
    {
        return $this->httpBrowserJavaEnabled;
    }

    /**
     * Se JAVA habilitado enviar valor Y, caso contrário N - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpBrowserJavaEnabled(string $value)
    {
        $this->httpBrowserJavaEnabled = $value;
        return $this;
    }

    /**
     * Se JAVA SCRIPT habilitado enviar valor Y, caso contrário N - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpBrowserJavaScriptEnabled()
    {
        return $this->httpBrowserJavaScriptEnabled;
    }

    /**
     * Se JAVA SCRIPT habilitado enviar valor Y, caso contrário N - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpBrowserJavaScriptEnabled(string $value)
    {
        $this->httpBrowserJavaScriptEnabled = $value;
        return $this;
    }

    /**
     * Quantidade de bits utilizados para exibição de imagens - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpBrowserColorDepth()
    {
        return $this->httpBrowserColorDepth;
    }

    /**
     * Quantidade de bits utilizados para exibição de imagens - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpBrowserColorDepth(string $value)
    {
        $this->httpBrowserColorDepth = $value;
        return $this;
    }

    /**
     * Altura da resolução da tela do cliente - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpBrowserScreenHeight()
    {
        return $this->httpBrowserScreenHeight;
    }

    /**
     * Altura da resolução da tela do cliente - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpBrowserScreenHeight(string $value)
    {
        $this->httpBrowserScreenHeight = $value;
        return $this;
    }

    /**
     * Largura da resolução da tela do cliente - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpBrowserScreenWidth()
    {
        return $this->httpBrowserScreenWidth;
    }

    /**
     * Largura da resolução da tela do cliente - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpBrowserScreenWidth(string $value)
    {
        $this->httpBrowserScreenWidth = $value;
        return $this;
    }

    /**
     * Diferença em minutos entre o horário GMT e o do browser do cliente - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getHttpBrowserTimeDifference()
    {
        return $this->httpBrowserTimeDifference;
    }

    /**
     * Diferença em minutos entre o horário GMT e o do browser do cliente - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setHttpBrowserTimeDifference(string $value)
    {
        $this->httpBrowserTimeDifference = $value;
        return $this;
    }

    /**
     * O valor exato do User Agent Header - Obrigatório para 3DS.
     *
     * @return void
     */
    public function getUserAgentBrowserValue()
    {
        return $this->userAgentBrowserValue;
    }

    /**
     * O valor exato do User Agent Header - Obrigatório para 3DS.
     *
     * @param string $value
     * @return void
     */
    public function setUserAgentBrowserValue(string $value)
    {
        $this->userAgentBrowserValue = $value;
        return $this;
    }

    /**
     * Converts to data array
     *
     * @return void
     */
    public function getDeviceInfoData()
    {
        return [
            'httpAcceptBrowserValue' => $this->httpAcceptBrowserValue,
            'httpAcceptContent' => $this->httpAcceptContent,
            'httpBrowserLanguage' => $this->httpBrowserLanguage,
            'httpBrowserJavaEnabled' => $this->httpBrowserJavaEnabled,
            'httpBrowserJavaScriptEnabled' => $this->httpBrowserJavaScriptEnabled,
            'httpBrowserColorDepth' => $this->httpBrowserColorDepth,
            'httpBrowserScreenHeight' => $this->httpBrowserScreenHeight,
            'httpBrowserScreenWidth' => $this->httpBrowserScreenWidth,
            'httpBrowserTimeDifference' => $this->httpBrowserTimeDifference,
            'userAgentBrowserValue' => $this->userAgentBrowserValue,
        ];
    }
}
