<?php

namespace Kaperys\Financial\Message\Packer;

use Kaperys\Financial\Cache\CacheManager;
use Kaperys\Financial\Message\AbstractPackUnpack;
use Kaperys\Financial\Message\Schema\SchemaManager;

/**
 * Class MessagePacker
 *
 * @package Kaperys\Financial\Message\Packer
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class MessagePacker extends AbstractPackUnpack
{

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

        $message = $this->parseMti() .
            $this->parseBitmap($this->schemaManager->getSetFields()) .
            $this->parseDataElement($packedFields);

        return $this->parseMessageLengthHeader($message) . $message;
    }

    /**
     * Parses the message length header
     *
     * @param string $message the packed message
     *
     * @return string the message length header (in hex)
     */
    protected function parseMessageLengthHeader(string $message): string
    {
        return str_pad(dechex((strlen($message) / 2)), ($this->getHeaderLength() * 2), 0, STR_PAD_LEFT);
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
            $bit = $this->cacheManager->getSchemaCache(
                $this->schemaManager->getSchema()
            )->getDataForProperty($field)->getBit();

            if ($bit > 64) {
                if (!$presentBitmaps['secondary']) {
                    $bitmap .= str_repeat(0, 64);
                }

                $bitmap[0] = 1;
                $presentBitmaps['secondary'] = true;
            }

            if ($bit > 128) {
                if (!$presentBitmaps['tertiary']) {
                    $bitmap .= str_repeat(0, 64);
                }

                $bitmap[64] = 1;
                $presentBitmaps['tertiary'] = true;
            }

            $bitmap[($bit - 1)] = 1;
        }

        var_dump($bitmap);

        return 'bitmap';
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
        ksort($packedFields);

        $dataElements = '';
        foreach ($packedFields as $field) {
            $dataElements .= $field;
        }

        return $dataElements;
    }
}
