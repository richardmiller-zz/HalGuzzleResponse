HalGuzzleResponse
=================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/richardmiller/HalGuzzleResponse/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/richardmiller/HalGuzzleResponse/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/richardmiller/HalGuzzleResponse/badges/build.png?b=master)](https://scrutinizer-ci.com/g/richardmiller/HalGuzzleResponse/build-status/master)

[Guzzle](https://github.com/guzzle/guzzle) event subscriber to decorate
responses to provide Hal resources.

If you register the listener it will decorate the responses from Guzzle
giving them a `hal` method. This will return a [Nocarrier\Hal](https://github.com/blongden/hal)
resource created from the response body.

## Installation

Require the extension:

```
$ composer require rmiller/hal-guzzle-response:~0.1
```

## Usage

Attach the listener:

```php
$client = new \GuzzleHttp\Client();
$emitter = $client->getEmitter();
$subscriber = new \RMiller\HalGuzzleResponse\GuzzleSubscriber();
$emitter->attach($subscriber);
```

Get the Hal resource from the response:

```php
$response = $client->get($url);
$hal = $response->hal(); //\Nocarrier\Hal
```

Note: an attempt will be made to convert the response body from JSON and XML to a Hal resource.
If neither is successful a `\RuntimeException` will be thrown. This happens when `hal` is called,
so it is safe to wrap other responses and not call `hal`.

