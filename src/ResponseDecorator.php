<?php

namespace RMiller\HalGuzzleResponse;

use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Stream\StreamInterface;

trait ResponseDecorator
{
    private $innerResponse;

    private function setInnerResponse(ResponseInterface $innerResponse)
    {
        $this->innerResponse = $innerResponse;
    }

    public function __toString()
    {
        return (string) $this->innerResponse;
    }

    public function getProtocolVersion()
    {
        return $this->innerResponse->getProtocolVersion();
    }

    public function setBody(StreamInterface $body = null)
    {
        return $this->innerResponse->setBody($body);
    }

    public function getBody()
    {
        return $this->innerResponse->getBody();
    }

    public function getHeaders()
    {
        return $this->innerResponse->getHeaders();
    }

    public function getHeader($header, $asArray = false)
    {
        return $this->innerResponse->getHeader($header, $asArray);
    }

    public function getHeaderAsArray($header)
    {
        return $this->innerResponse->getHeaderAsArray($header);
    }

    public function hasHeader($header)
    {
        return $this->innerResponse->hasHeader($header);
    }

    public function removeHeader($header)
    {
        return $this->innerResponse->removeHeader($header);
    }

    public function addHeader($header, $value)
    {
        return $this->innerResponse->addHeader($header, $value);
    }

    public function addHeaders(array $headers)
    {
        return $this->innerResponse->addHeaders($headers);
    }

    public function setHeader($header, $value)
    {
        return $this->innerResponse->setHeader($header, $value);
    }

    public function setHeaders(array $headers)
    {
        return $this->innerResponse->setHeaders($headers);
    }

    public function getStatusCode()
    {
        return $this->innerResponse->getStatusCode();
    }

    public function setStatusCode($code)
    {
        return $this->innerResponse->setStatusCode($code);
    }

    public function getReasonPhrase()
    {
        return $this->innerResponse->getReasonPhrase();
    }

    public function setReasonPhrase($phrase)
    {
        return $this->innerResponse->setReasonPhrase($phrase);
    }

     public function getEffectiveUrl()
    {
        return $this->innerResponse->getEffectiveUrl();
    }

    public function setEffectiveUrl($url)
    {
        return $this->innerResponse->setEffectiveUrl($url);
    }

    public function json(array $config = [])
    {
        return $this->innerResponse->json($config);
    }

    public function xml(array $config = [])
    {
        return $this->innerResponse->xml($config);
    }
}
