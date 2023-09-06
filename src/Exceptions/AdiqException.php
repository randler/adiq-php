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
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $traceId;

    /**
     * @param boolean $tag
     * @param int $description
     */
    public function __construct(
        $status,
        $tag,
        $description,
        $type = "",
        $title = "",
        $traceId = ""
    ) {
        $this->status = $status;
        $this->tag = $tag;
        $this->description = $description;
        $this->type = $type;
        $this->title = $title;
        $this->traceId = $traceId;

        $exceptionMessage = $this->buildExceptionMessage();

        parent::__construct($exceptionMessage);
    }

    /**
     * @return string
     */
    private function buildExceptionMessage()
    {
        return sprintf(
            '[%s]:%s (code:%s,type:%s,title:%s,traceId:%s)',
            $this->tag,
            $this->description,
            $this->code,
            $this->type,
            $this->title,
            $this->traceId
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

    /**
     * Get the value of type
     *
     * @return  string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of title
     *
     * @return  string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of traceId
     *
     * @return  string
     */
    public function getTraceId()
    {
        return $this->traceId;
    }
}
