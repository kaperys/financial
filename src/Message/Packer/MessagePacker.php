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
    public $schemaManager;

    /**
     * MessagePacker constructor.
     *
     * @param SchemaManager $schemaManager the schema manager class
     */
    public function __construct(SchemaManager $schemaManager)
    {
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
        $schemaCache = (new CacheManager())->getSchemaCache($this->schemaManager->getSchema());

        $packedFields = [];
        foreach ($this->schemaManager->getSetFields() as $field) {
            $fieldData = $schemaCache->getDataForProperty($field);

            $packedFields[$fieldData->getBit()] = $fieldData->getMapper()->pack(
                $this->schemaManager->{$fieldData->getGetterName()}()
            );
        }

        var_dump($packedFields);

        return 'packed message';
    }
}
