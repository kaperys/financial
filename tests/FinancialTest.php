<?php

namespace Kaperys\Financial\Tests;

use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Financial;
use Kaperys\Financial\Message\Packer\MessagePacker;
use Kaperys\Financial\Message\Schema\ISO8583;
use Kaperys\Financial\Message\Schema\SchemaManager;
use Kaperys\Financial\Message\Unpacker\MessageUnpacker;
use PHPUnit\Framework\TestCase;

/**
 * Class FinancialTest
 *
 * @package Kaperys\Financial\Tests
 *
 * @author Mike Kaperys <mike@kaperys.io>
 */
class FinancialTest extends TestCase
{

    const DUMMY_MTI           = '0200';
    const DUMMY_PAN           = '1029384756193749';
    const DUMMY_HEADER_LENGTH = 2;

    /** @test */
    public function pack()
    {
        $cacheManager = new CacheManager(
            [
                'cacheDirectory' => '../fixtures/schema.json'
            ]
        );

        /** @var ISO8583 $schemaManager */
        $schemaManager = new SchemaManager(new ISO8583(), $cacheManager);

        $schemaManager->setPan(self::DUMMY_PAN);

        $messagePacker = (new Financial($cacheManager))->pack($schemaManager);

        $messagePacker->setMti(self::DUMMY_MTI);
        $messagePacker->setHeaderLength(self::DUMMY_HEADER_LENGTH);

        $this->assertInstanceOf(MessagePacker::class, $messagePacker);

        $this->assertEquals(
            '001e303230304000000000000000313631303239333834373536313933373439',
            $messagePacker->generate()
        );
    }

    /** @test */
    public function unpack()
    {
        $cacheManager = new CacheManager(
            [
                'cacheDirectory' => '../fixtures/schema.json'
            ]
        );

        /** @var ISO8583 $schemaManager */
        $schemaManager = new SchemaManager(new ISO8583(), $cacheManager);

        $messageUnpacker = (new Financial($cacheManager))->unpack($schemaManager);

        $isoMessage = "012430323030f23e4491a8e0802000000000000000203136313032393338343735363139333734393030303030303030303030" .
            "3030303130303031323132313435343038303030303039313435343038313231323137303331323133303030303930323030433030303030" .
            "3030303036303030303230303630303030323033372a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a2a" .
            "2a2a504652333437303030303039323837353937353830303030303030303030333039333733303134373430342054657374204167656e74" .
            "203220204861746669656c64202020202048654742383236303238303030303030323136317c303030307c50465233343730303030303930" .
            "3135353630313031323634303243313031";

        $messageUnpacker->setHeaderLength(self::DUMMY_HEADER_LENGTH);

        $unpackedMessage = $messageUnpacker->parse($isoMessage);

        /** @var ISO8583 $schema */
        $schema = $schemaManager->getSchema();

        $this->assertInstanceOf(MessageUnpacker::class, $messageUnpacker);
        $this->assertEquals(self::DUMMY_MTI, $unpackedMessage->getMti());
        $this->assertEquals(self::DUMMY_PAN, $schema->getPan());
    }
}
