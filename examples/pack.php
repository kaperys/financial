<?php

require '../vendor/autoload.php';

use Kaperys\Financial\Financial;
use Kaperys\Financial\Message\Cache\CacheManager;
use Kaperys\Financial\Message\Schema\ISO8583;
use Kaperys\Financial\Message\Schema\SchemaManager;

//$cacheManager = new CacheManager();
//$cacheManager->generateSchemaCache(new ISO8583());

/** @var ISO8583 $schemaManager */
$schemaManager = new SchemaManager(new ISO8583());

$schemaManager->setPan('12344567890098765');

/** @var \Kaperys\Financial\Message\Packer\MessagePacker $message */
$message = (new Financial())->pack($schemaManager);

$message->setHeaderLength(2);
$message->setMti(0200);

var_dump($message);

echo $message->generate();