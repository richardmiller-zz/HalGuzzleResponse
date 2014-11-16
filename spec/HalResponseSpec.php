<?php

namespace spec\RMiller\HalGuzzleResponse;

use GuzzleHttp\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HalResponseSpec extends ObjectBehavior
{
    function let(ResponseInterface $response)
    {
        $this->beConstructedWith($response);
    }

    function it_is_a_response()
    {
        $this->shouldHaveType('GuzzleHttp\Message\ResponseInterface');
    }

    public function it_should_return_a_hal_resource_from_json(ResponseInterface $response)
    {
        $response->getBody()->willReturn('{"badger": "nocturnal"}');
        $this->hal()->shouldHaveType('Nocarrier\Hal');
    }

    public function it_should_return_a_hal_resource_from_xml(ResponseInterface $response)
    {
        $response->getBody()->willReturn('<badger>nocturnal</badger>');
        $this->hal()->shouldHaveType('Nocarrier\Hal');
    }

    public function it_should_throw_an_exception_if_cannnot_be_converted(ResponseInterface $response)
    {
        $response->getBody()->willReturn('THIS IS NOT VALID');
        $this->shouldThrow('\RuntimeException')->duringHal();
    }
}
