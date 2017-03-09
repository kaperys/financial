<?php

require '../vendor/autoload.php';

use Kaperys\Financial\Financial;
use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Message\Schema\ISO8583;
use Kaperys\Financial\Message\Schema\SchemaManager;
use Kaperys\Financial\Message\Unpacker\MessageUnpacker;

/*
 * 1) Generate the schema cache
 *
 *    The cache manager is responsible for creating and reading schema cache files. If there is no cache file created
 *    you'll need to un-comment the ->generateSchemaCache line.
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
 * 3) Setup the message unpacker
 *
 *    We can now unpack the financial message into our schema set in SchemaManager. The message unpacker is responsible
 *    for parsing the message data (mti, header length, bitmap, etc).
 */
/** @var MessageUnpacker $message */
$message = (new Financial($cacheManager))->unpack($schemaManager);

/*
 * 4) Define the message
 *
 *    We are now able define our message. We need to set the ISO message to parse and the header length. The length and
 *    fields will be validated when they are unpacked.
 */
$isoMessage = "012430323030f23e4491a8e08020000000000000002031362a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a3030303030303030303030" .
    "3030303130303031323132313435343038303030303039313435343038313231323137303331323133303030303930323030433030303030" .
    "3030303036303030303230303630303030323033372a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a" .
    "2a2a504652333437303030303039323837353937353830303030303030303030333039333733303134373430342054657374204167656e74" .
    "203220204861746669656c64202020202048654742383236303238303030303030323136317c303030307c50465233343730303030303930" .
    "3135353630313031323634303243313031";

$message->setHeaderLength(2);

/*
 * 5) Parse the unpacked message
 *
 *    The message unpacker also generates the schema class, as well as parsing the length and providing the message type
 *    indicator. We can access the schema (with the help of type hinting) by using ->getParsedSchema().
 */
$parsedMessage = $message->parse($isoMessage);

/** @var ISO8583 $schema */
$schema = $schemaManager->getSchema();

$messageDetail = [
    'mti'    => $parsedMessage->getMti(),
    'fields' => $schemaManager->getSetFields(),
    'pan'    => $schema->getPan(),
];

var_dump($messageDetail);
