<?php

require '../vendor/autoload.php';

use Kaperys\Financial\Financial;
use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Message\Schema\ISO8583;
use Kaperys\Financial\Message\Schema\SchemaManager;
use Kaperys\Financial\Message\Unpacker\MessageUnpacker;

$cacheManager = new CacheManager();
//$cacheManager->generateSchemaCache(new ISO8583());

/** @var ISO8583 $schemaManager */
$schemaManager = new SchemaManager(new ISO8583(), $cacheManager);

/** @var MessageUnpacker $message */
$message = (new Financial($cacheManager))->unpack($schemaManager);

$isoMessage = "012430323030f23e4491a8e08020000000000000002031362a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a303030303030303030303030303031303030313231323134353430383030303030393134353430383132313231373033313231333030303039303230304330303030303030303036303030303230303630303030323033372a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a504652333437303030303039323837353937353830303030303030303030333039333733303134373430342054657374204167656e74203220204861746669656c64202020202048654742383236303238303030303030323136317c303030307c504652333437303030303039303135353630313031323634303243313031";

$message->setHeaderLength(2);

$parsedMessage = $message->parse($isoMessage);

// var_dump($parsedMessage);
