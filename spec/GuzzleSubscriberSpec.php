<?php

namespace spec\RMiller\HalGuzzleResponse;

use GuzzleHttp\Event\CompleteEvent;
use GuzzleHttp\Message\ResponseInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GuzzleSubscriberSpec extends ObjectBehavior
{
    function it_is_a_subscriber()
    {
        $this->shouldHaveType('GuzzleHttp\Event\SubscriberInterface');
    }

    function it_should_set_response_to_hal_response(CompleteEvent $event, ResponseInterface $response)
    {
        $event->getResponse()->willReturn($response);
        $event->intercept(Argument::type('RMiller\HalGuzzleResponse\HalResponse'))->shouldBeCalled();
        $this->wrapHalResponse($event);
    }
}
