# kaperys/financial
A simple PHP ISO8583 pack and unpack library

[![Build Status](https://travis-ci.org/kaperys/financial.svg?branch=master)](https://travis-ci.org/kaperys/financial)
[![Coverage Status](https://coveralls.io/repos/github/kaperys/financial/badge.svg?branch=master)](https://coveralls.io/github/kaperys/financial?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)


# Note: This library is in development and is not production-ready


## Usage
Packing the message
```php
$cacheManager = new CacheManager();
$cacheManager->generateSchemaCache(new ISO8583());

/** @var ISO8583 $schemaManager */
$schemaManager = new SchemaManager(new ISO8583(), $cacheManager);

$schemaManager->setCurrencyCodeCardholderBilling('GBP');
$schemaManager->setPrivateReserved6('sample');

/** @var MessagePacker $message */
$message = (new Financial($cacheManager))->pack($schemaManager);

$message->setHeaderLength(2);
$message->setMti(0200);

echo $message->generate();
```

Unpacking the message
```php
$cacheManager = new CacheManager();
$cacheManager->generateSchemaCache(new ISO8583());

/** @var ISO8583 $schemaManager */
$schemaManager = new SchemaManager(new ISO8583(), $cacheManager);

/** @var MessageUnpacker $message */
$message = (new Financial($cacheManager))->unpack($schemaManager);

$message->setHeaderLength(2);
$parsedMessage = $message->parse("012430323030f23e4491a8e08020000000000000002031362a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a303030303030303030303030303031303030313231323134353430383030303030393134353430383132313231373033313231333030303039303230304330303030303030303036303030303230303630303030323033372a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a504652333437303030303039323837353937353830303030303030303030333039333733303134373430342054657374204167656e74203220204861746669656c64202020202048654742383236303238303030303030323136317c303030307c504652333437303030303039303135353630313031323634303243313031");

/** @var ISO8583 $schema */
$schema = $parsedMessage->getParsedSchema();

echo $parsedMessage->getMti();
echo $schema->getCardAcceptorNameLocation();
```

## Installation
```bash
composer require kaperys/financial
```

## Contributing
..

## Issues
..

## Change Log
..