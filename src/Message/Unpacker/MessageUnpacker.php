<?php

namespace Kaperys\Financial\Message\Unpacker;

use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Message\AbstractPackUnpack;
use Kaperys\Financial\Message\Schema\MessageSchemaInterface;
use Kaperys\Financial\Message\Schema\SchemaManager;
use Kaperys\Financial\Message\Unpacker\Exception\MessageLengthHeaderException;

/**
 * Class MessageUnpacker
 *
 * @package Kaperys\Financial\Message\Unpacker
 *
 * @auhtor  Mike Kaperys <mike@kaperys.io>
 */
class MessageUnpacker extends AbstractPackUnpack
{

    /** @var SchemaManager $schemaManager the message schema manager */
    protected $schemaManager;

    /** @var CacheManager $cacheManager the schema cache manager */
    protected $cacheManager;

    /**
     * MessageUnpacker constructor.
     *
     * @param CacheManager  $cacheManager  the schema cache manager
     * @param SchemaManager $schemaManager the schema manager class
     */
    public function __construct(CacheManager $cacheManager, SchemaManager $schemaManager)
    {
        $this->cacheManager  = $cacheManager;
        $this->schemaManager = $schemaManager;
    }

    /**
     * Parses the message to the schema format
     *
     * @param string $message the iso message, in hexadecimal format
     *
     * @return MessageUnpacker
     *
     * @throws MessageLengthHeaderException if the message fails length validation
     */
    public function parse(string $message): MessageUnpacker
    {
        // Parse the message length header
        $messageLengthHeader = $this->parseMessageLengthHeader($message);
        $this->shrink($message, ($this->getHeaderLength() * 2));

        if (($messageLengthHeader - $this->getHeaderLength()) != (strlen($message) / 2)) {
            throw new MessageLengthHeaderException(
                'Message length should be ' . $messageLengthHeader . ', but ' . (strlen($message) / 2) . ' was found'
            );
        }

        // Parse the message type indicator
        $this->setMti($this->parseMti($message));
        $this->shrink($message, 8);

        // Parse the bitmap
        $bitmap = $this->parseBitmap($message);

        if (strlen($bitmap) > 64) {
            $numberOfBitmaps = 2;
        } elseif (strlen($bitmap) > 128) {
            $numberOfBitmaps = 3;
        } else {
            $numberOfBitmaps = 1;
        }

        // Message without bitmaps
        $this->shrink($message, ($numberOfBitmaps * 16));

        // Parse the data element
        $dataElement = $this->parseDataElement($bitmap, $message);

        foreach ($dataElement as $bit => $value) {
            $this->schemaManager
                ->{$this->cacheManager
                    ->getSchemaCache($this->schemaManager->getSchema())
                    ->getDataForBit($bit)
                    ->getSetterName()
                }($value);
        }

        return $this;
    }

    /**
     * Gets the schema manager
     *
     * @return SchemaManager
     */
    public function getSchemaManager(): SchemaManager
    {
        return $this->schemaManager;
    }

    /**
     * Parses the message length header
     *
     * @param string $message
     *
     * @return string
     */
    protected function parseMessageLengthHeader(string $message): string
    {
        return base_convert(substr($message, 0, ($this->getHeaderLength() * 2)), 16, 10);
    }

    /**
     * Parses the message type indicator
     *
     * @param string $message
     *
     * @return string
     */
    protected function parseMti(string $message): string
    {
        return hex2bin(substr($message, 0, 8));
    }

    /**
     * Parses the bitmap
     *
     * @param string $message
     *
     * @return string
     */
    protected function parseBitmap(string $message): string
    {
        $compiledBitmap = "";

        for (;;) {
            // Support for PHPs accuracy issues when using base_convert - ugly, I know!
            $bitmap = implode(null, array_map(function ($bit) {
                return str_pad(base_convert($bit, 16, 2), 8, 0, STR_PAD_LEFT);
            }, str_split(substr($message, 0, 16), 2)));

            $this->shrink($message, 16);

            $compiledBitmap .= $bitmap;

            if (substr($bitmap, 0, 1) !== "1" || strlen($compiledBitmap) > 128) {
                break;
            }
        }

        return $compiledBitmap;
    }

    /**
     * Parses the data element
     *
     * @param string $bitmap  the message bitmap
     * @param string $message the message data element
     *
     * @return array
     */
    protected function parseDataElement(string $bitmap, string $message): array
    {
        $dataElement = [];

        $schemaCache = $this->cacheManager->getSchemaCache($this->schemaManager->getSchema());

        for ($i = 0; $i < strlen($bitmap); $i++) {
            if ($bitmap[$i] === "1") {
                $bit = $i + 1;

                // @todo: Do we need the || $bit === 65 ?
                if ($bit === 1 || $bit === 65) {
                    continue;
                }

                $bitData = $schemaCache->getDataForBit($bit);

                if ($bitData->isFixedLength()) {
                    $bitReadLength = $bitData->getLength() * 2;
                } else {
                    $bitLengthIndicator = $bitData->getLengthIndicator() * 2;
                    $bitReadLength      = hex2bin(substr($message, 0, $bitLengthIndicator)) * 2;

                    $this->shrink($message, $bitLengthIndicator);
                }

                $unpackedBit = $bitData->getMapper()->unpack(substr($message, 0, $bitReadLength));

                $this->shrink($message, $bitReadLength);

                $dataElement[$bit] = $unpackedBit;
            }
        }

        return $dataElement;
    }

    /**
     * Shrinks the message
     *
     * @param string $message the message
     * @param int    $length  the length to shrink by
     */
    private function shrink(&$message, $length)
    {
        $message = substr($message, $length);
    }
}
