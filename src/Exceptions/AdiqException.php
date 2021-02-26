<?php

namespace Adiq\Exceptions;

final class AdiqException extends \Exception
{
    /**
     * @var int
     */
    private $status;
    
    /**
     * @var string
     */
    private $tag;

    /**
     * @var string
     */
    private $description;

    /**
     * @param boolean $tag
     * @param int $description
     */
    public function __construct($status, $tag, $description)
    {
        $this->status = $status;
        $this->tag = $tag;
        $this->description = $description;

        $exceptionMessage = $this->buildExceptionMessage();

        parent::__construct($exceptionMessage);
    }

    /**
     * @return string
     */
    private function buildExceptionMessage()
    {
        return sprintf(
            $this->description,
            $this->code,
            $this->tag
        );
    }

    /**
     * @return boolean
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
