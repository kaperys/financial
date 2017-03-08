<?php

namespace Kaperys\Financial\Message\Packer;

use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Message\Schema\SchemaManager;

/**
 * Class MessagePacker
 *
 * @package Kaperys\Financial\Message\Packer
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 *
 * @property SchemaManager $schemaManager
 */
class MessagePacker
{

    /** @var int $headerLength the message header length */
    protected $headerLength;

    /** @var string $mti the message type indicator */
    protected $mti;

    /** @var SchemaManager $schemaManager the message schema manager */
    protected $schemaManager;

    /** @var CacheManager $cacheManager the schema cache manager */
    protected $cacheManager;

    /**
     * MessagePacker constructor.
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
     * Sets the message header length
     *
     * @param int $headerLength
     *
     * @return MessagePacker
     */
    public function setHeaderLength(int $headerLength): MessagePacker
    {
        $this->headerLength = $headerLength;

        return $this;
    }

    /**
     * Gets the message header length
     *
     * @return int
     */
    public function getHeaderLength(): int
    {
        return $this->headerLength;
    }

    /**
     * Sets the message type indicator
     *
     * @param string $mti
     *
     * @return MessagePacker
     */
    public function setMti(string $mti): MessagePacker
    {
        $this->mti = $mti;

        return $this;
    }

    /**
     * Gets the message type indicator
     *
     * @return string
     */
    public function getMti(): string
    {
        return $this->mti;
    }

    /**
     * Generates the packed message
     *
     * @return string
     */
    public function generate(): string
    {
        $schemaCache = $this->cacheManager->getSchemaCache($this->schemaManager->getSchema());

        $packedFields = [];
        foreach ($this->schemaManager->getSetFields() as $field) {
            $fieldData = $schemaCache->getDataForProperty($field);

            $packedFields[$fieldData->getBit()] = $fieldData->getMapper()->pack(
                $this->schemaManager->{$fieldData->getGetterName()}()
            );
        }

        return $this->parseMessageLengthHeader() .
            $this->parseMti() .
            $this->parseBitmap($this->schemaManager->getSetFields()) .
            $this->parseDataElement($packedFields);
    }

    /**
     * Parses the message length header
     *
     * @return string
     */
    protected function parseMessageLengthHeader(): string
    {
        return '00';
    }

    /**
     * Parses the message type indicator
     *
     * @return string
     */
    protected function parseMti(): string
    {
        return bin2hex($this->getMti());
    }

    /**
     * Parses the message bitmap
     *
     * @param array $setFields set fields on the schema
     *
     * @return string
     */
    protected function parseBitmap(array $setFields): string
    {
        $bitmap = str_repeat(0, 64);

        $presentBitmaps = [
            'primary'   => true,
            'secondary' => false,
            'tertiary'  => false,
        ];

        foreach ($setFields as $field) {
            $propertyData = $this->cacheManager->getSchemaCache(
                $this->schemaManager->getSchema()
            )->getDataForProperty($field);

            $bit = $propertyData->getBit();

            if ($bit > 64) {
                if (!$presentBitmaps['secondary']) {
                    $bitmap .= str_repeat(0, 64);
                }

                $presentBitmaps['secondary'] = true;
            }

            if ($bit > 128) {
                if (!$presentBitmaps['tertiary']) {
                    $bitmap .= str_repeat(0, 64);
                }

                $presentBitmaps['tertiary'] = true;
            }

            $bitmap[($bit - 1)] = 1;
        }

        var_dump($bitmap);

        return 'bitmap';

        //return bin2hex($bitmap);
    }

    /**
     * Parses the data element
     *
     * @param array $packedFields set fields on the schema
     *
     * @return string
     */
    protected function parseDataElement(array $packedFields): string
    {
        return 'data';
    }
}
