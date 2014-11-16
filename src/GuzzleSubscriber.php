<?php

namespace RMiller\HalGuzzleResponse;

use GuzzleHttp\Event\CompleteEvent;
use GuzzleHttp\Event\SubscriberInterface;

class GuzzleSubscriber implements SubscriberInterface
{
    public function getEvents()
    {
        return ['complete' => ['wrapHalResponse']];
    }

    public function wrapHalResponse(CompleteEvent $event)
    {
        $event->intercept(new HalResponse($event->getResponse()));
    }
}
