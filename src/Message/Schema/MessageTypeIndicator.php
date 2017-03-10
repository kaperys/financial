<?php

namespace Kaperys\Financial\Message\Schema;

use Kaperys\Financial\Message\Schema\Exception\MessageTypeIndicator\ClassNotFoundException;
use Kaperys\Financial\Message\Schema\Exception\MessageTypeIndicator\CommunicatorNotFoundException;
use Kaperys\Financial\Message\Schema\Exception\MessageTypeIndicator\FunctionNotFoundException;
use Kaperys\Financial\Message\Schema\Exception\MessageTypeIndicator\VersionNotFoundException;

/**
 * Class MessageTypeIndicator
 *
 * @package Kaperys\Financial\Message\Schema
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class MessageTypeIndicator
{

    // Message type indicator bit definition indexes
    const MTI_VERSION_INDEX      = 0;
    const MTI_CLASS_INDEX        = 1;
    const MTI_FUNCTION_INDEX     = 2;
    const MTI_COMMUNICATOR_INDEX = 3;

    // Version map
    const MTI_VERSION_MAP = [
        0 => 'ISO 8583:1987',
        1 => 'ISO 8583:1993',
        2 => 'ISO 8583:2003',
        3 => 'Reserved for ISO use',
        4 => 'Reserved for ISO use',
        5 => 'Reserved for ISO use',
        6 => 'Reserved for ISO use',
        7 => 'Reserved for ISO use',
        8 => 'Reserved for national use',
        9 => 'Reserved for private use',
    ];

    // Class map
    const MTI_CLASS_MAP = [
        1 => 'Authorisation Message',
        2 => 'Financial Message',
        3 => 'File Action Message',
        4 => 'Reversal and Charge back Message',
        5 => 'Reconciliation Message',
        6 => 'Administrative Message',
        7 => 'Fee Collection Message',
        8 => 'Network Management',
        9 => 'Reserved for ISO use',
    ];

    // Function map
    const MTI_FUNCTION_MAP = [
        0 => 'Request',
        1 => 'Request Response',
        2 => 'Advice',
        3 => 'Advice Response',
        4 => 'Notification',
        5 => 'Notification Acknowledgement',
        6 => 'Instruction (ISO 8583:2003 only)',
        7 => 'Instruction Acknowledgement',
        8 => 'Reserved for ISO use',
        9 => 'Reserved for ISO use',
    ];

    // Communicator map
    const MTI_COMMUNICATOR_MAP = [
        0 => 'Acquirer',
        1 => 'Acquirer Repeat',
        2 => 'Issuer',
        3 => 'Issuer Repeat',
        4 => 'Other',
        5 => 'Other Repeat',
    ];

    /** @var string $mti the message type indicator */
    protected $mti;

    /**
     * MessageTypeIndicator constructor.
     *
     * @param string $mti the message type indicator
     */
    public function __construct(string $mti)
    {
        $this->mti = $mti;
    }

    /**
     * Gets the message version
     *
     * @return string
     *
     * @throws VersionNotFoundException if the message version is not found
     */
    public function getVersion()
    {
        $version = substr($this->mti, self::MTI_VERSION_INDEX, 1);
        if (array_key_exists($version, self::MTI_VERSION_MAP)) {
            return self::MTI_VERSION_MAP[$version];
        }

        throw new VersionNotFoundException('Version ' . $version . ' was not found in the version map');
    }

    /**
     * Gets the message class
     *
     * @return string
     *
     * @throws ClassNotFoundException if the message version is not found
     */
    public function getClass()
    {
        $class = substr($this->mti, self::MTI_CLASS_INDEX, 1);
        if (array_key_exists($class, self::MTI_CLASS_MAP)) {
            return self::MTI_CLASS_MAP[$class];
        }

        throw new ClassNotFoundException('Class ' . $class . ' was not found in the class map');
    }

    /**
     * Gets the message function
     *
     * @return string
     *
     * @throws FunctionNotFoundException if the message version is not found
     */
    public function getFunction()
    {
        $function = substr($this->mti, self::MTI_FUNCTION_INDEX, 1);
        if (array_key_exists($function, self::MTI_FUNCTION_MAP)) {
            return self::MTI_FUNCTION_MAP[$function];
        }

        throw new FunctionNotFoundException('Function ' . $function . ' was not found in the function map');
    }

    /**
     * Gets the message communicator
     *
     * @return string
     *
     * @throws CommunicatorNotFoundException if the message version is not found
     */
    public function getCommunicator()
    {
        $communicator = substr($this->mti, self::MTI_COMMUNICATOR_INDEX, 1);
        if (array_key_exists($communicator, self::MTI_COMMUNICATOR_MAP)) {
            return self::MTI_COMMUNICATOR_MAP[$communicator];
        }

        throw new CommunicatorNotFoundException(
            'Communicator ' . $communicator . ' was not found in the communicator map'
        );
    }

    /**
     * Gets the raw message type indicator
     *
     * @return string
     */
    public function __toString()
    {
        return $this->mti;
    }
}
