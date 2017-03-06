<?php

require '../vendor/autoload.php';

use Kaperys\Financial\Financial;
use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Message\Schema\ISO8583;
use Kaperys\Financial\Message\Schema\SchemaManager;
use Kaperys\Financial\Message\Packer\MessagePacker;

/*
 * 1) Generate the schema cache
 *
 *    The cache manager is responsible for creating and reading schema cache files
 */
$cacheManager = new CacheManager();
//$cacheManager->generateSchemaCache(new ISO8583());

/*
 * 2) Create a schema manager
 *
 *    The schema manager is responsible for accessing methods on the schema class and monitoring the files set. It can
 *    return information about the current state of the schema.
 */
/** @var ISO8583 $schemaManager */
$schemaManager = new SchemaManager(new ISO8583(), $cacheManager);

/*
 * 3) Build the message
 *
 *    We are now able to set fields on the message schema through the schema manager (with the help of type hinting).
 *    The schema manager will log the fields we set in preparation for packing the generated message.
 */
$schemaManager->setCurrencyCodeCardholderBilling('GBP');

/*
 * 4) Setup the message packer
 *
 *    We can now pack the financial message based on our current schema. The message packer is responsible for setting
 *    the message data (mti, header length, bitmap, etc).
 */
/** @var MessagePacker $message */
$message = (new Financial())->pack($schemaManager);

$message->setHeaderLength(2);
$message->setMti(0200);

/*
 * 5) Generate the packed message
 *
 *    The message packer also generates the ISO message. This combines the message length header, mti, bitmap and data
 *    element (a parsed message schema class).
 */
echo $message->generate();
