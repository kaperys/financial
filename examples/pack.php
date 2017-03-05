<?php

require '../vendor/autoload.php';

use Kaperys\Financial\Financial;
use Kaperys\Financial\Message\Cache\CacheManager;
use Kaperys\Financial\Message\Schema\ISO8583;
use Kaperys\Financial\Message\Schema\SchemaManager;

//$cacheManager = new CacheManager();
//$cacheManager->generateSchemaCache(new ISO8583());

/** @var \Kaperys\Financial\Message\Packer\MessagePacker $message */
$message = (new Financial())->pack(new SchemaManager(new ISO8583()));

$message->schemaManager->setPan('1234567890123456');

$message->setHeaderLength(2);
$message->setMti(0200);

var_dump($message);