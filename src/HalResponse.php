<?php

namespace RMiller\HalGuzzleResponse;

use GuzzleHttp\Message\ResponseInterface;
use Nocarrier\Hal;

class HalResponse implements ResponseInterface
{
    use ResponseDecorator;

    public function __construct(ResponseInterface $innerResponse)
    {
        $this->setInnerResponse($innerResponse);
    }

    public function hal($depth = 0)
    {
        try {
            return Hal::fromJson($this->innerResponse->getBody(), $depth);
        } catch (\RuntimeException $e) {
        }

        try {
            return Hal::fromXml($this->innerResponse->getBody(), $depth);
        } catch (\Exception $e) {
        }

        throw new \RuntimeException('Hal resource could not be created from response body.');
    }
}
