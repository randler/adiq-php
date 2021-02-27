<?php

namespace Adiq;

use GuzzleHttp\Exception\ClientException;
use Adiq\Exceptions\AdiqException;
use Adiq\Exceptions\InvalidJsonException;

class ResponseHandler
{
    /**
     * @param string $payload
     *
     * @throws \Adiq\Exceptions\InvalidJsonException
     * @return \ArrayObject
     */
    public static function success($payload)
    {
        return self::toJson($payload);
    }

    /**
     * @param ClientException $originalException
     *
     * @throws AdiqException
     * @return void
     */
    public static function failure(\Exception $originalException)
    {
        throw self::parseException($originalException);
    }

    /**
     * @param ClientException $guzzleException
     *
     * @return AdiqException|ClientException
     */
    private static function parseException(ClientException $guzzleException)
    {
        $response = $guzzleException->getResponse();

        if (is_null($response)) {
            return $guzzleException;
        }

        

        $body = $response->getBody()->getContents();
        $status = $response->getStatusCode();
        fwrite(STDERR, print_r($body));

        try {
            $jsonError = self::toJson($body);
        } catch (InvalidJsonException $invalidJson) {
            return $guzzleException;
        }

        $tag = "";
        if(is_array($jsonError) && (
            isset($jsonError[0]->Tag) || 
            isset($jsonError[0]->tag) )
        ) {
            $tag = isset($jsonError[0]->Tag) ? 
                $jsonError[0]->Tag : 
                $jsonError[0]->tag;
        }

        $description = "";
        if(is_array($jsonError) && (
            isset($jsonError[0]->Description) || 
            isset($jsonError[0]->description) )
        ) {
            $description = isset($jsonError[0]->Description) ? 
                $jsonError[0]->Description : 
                $jsonError[0]->description;
        }

        $type = "";
        if(is_object($jsonError) && isset($jsonError->type)) {
            $type = $jsonError->type;
        }
        
        $title = "";
        if(is_object($jsonError) && isset($jsonError->title)) {
            $title = $jsonError->title;
        }
        $traceId = "";
        if(is_object($jsonError) && isset($jsonError->traceId)) {
            $traceId = $jsonError->traceId;
        }
                
        return new AdiqException(
            $status,
            $tag,
            $description,
            $type,
            $title,
            $traceId
        );
    }

    /**
     * @param string $json
     * @return \ArrayObject
     */
    private static function toJson($json)
    {
        $result = json_decode($json);

        if (json_last_error() != \JSON_ERROR_NONE) {
            throw new InvalidJsonException(json_last_error_msg());
        }

        return $result;
    }
}
