# kaperys/financial
A simple PHP ISO8583 pack and unpack library

[![Build Status](https://travis-ci.org/kaperys/financial.svg?branch=master)](https://travis-ci.org/kaperys/financial)
[![Coverage Status](https://coveralls.io/repos/github/kaperys/financial/badge.svg?branch=master)](https://coveralls.io/github/kaperys/financial?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)


## Note: This library is in development and is not production-ready


## Basic Usage
Packing the message
```php
$cacheManager = new CacheManager();
$cacheManager->generateSchemaCache(new ISO8583());

/** @var ISO8583 $schemaManager */
$schemaManager = new SchemaManager(new ISO8583(), $cacheManager);

$schemaManager->setCurrencyCodeCardholderBilling('GBP');
$schemaManager->setPrivateReserved6('Your topup was successful');

/** @var MessagePacker $message */
$message = (new Financial($cacheManager))->pack($schemaManager);

$message->setHeaderLength(2);
$message->setMti('0200');

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
Install the latest version with Composer:
```bash
composer require kaperys/financial
```

## About
kaperys/financial is a simple PHP ISO8583 message pack/unpack library, capable of supporting multiple message schemas and versions. 

### Requirements
 - PHP v7.0+
 
### Documentation
 - [Usage](doc/01-usage.md)
 - [Schemas](doc/02-schemas.md)

### Issues
Please use the [GitHub](https://github.com/kaperys/financial/issues) issue tracker to report bugs.

### Contributing
Please use the [HubFlow](https://datasift.github.io/gitflow/) branching strategy to contribute work, using the GitHub issue tracker ID as your branch key. For example, feature/1_ComposerSupport.

If you would like to contribute to core (non-ticketed) work, please grep the codebase for `@todo`.

### Author
Mike Kaperys - <mike@kaperys.io> - <https://kaperys.io>

### License
kaperys/financial is licensed under the MIT License - see the `LICENSE` file for details