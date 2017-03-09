<?php

namespace Kaperys\Financial\Message\Constants;

/**
 * Interface Display
 *
 * @package Kaperys\Financial\Message
 *
 * @see     https://en.wikipedia.org/wiki/ISO_8583#Data_elements
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
interface Display
{

    const ALPHA                 = 'a';   // Alpha, including blanks
    const NUMERIC               = 'n';   // Numeric values only
    const SPECIAL               = 's';   // Special characters only
    const ALPHA_NUMERIC         = 'an';  // Alphanumeric
    const ALPHA_SPECIAL         = 'as';  // Alpha & special characters only
    const NUMERIC_SPECIAL       = 'ns';  // Numeric and special characters only
    const ALPHA_NUMERIC_SPECIAL = 'ans'; // Alphabetic, numeric and special characters
    const BINARY                = 'b';   // Binary data
    const TRACK_DATA            = 'z';   // Tracks 2 and 3 data, set as defined in the ISO/IEC 7813 and ISO/IEC 4909
                                         // specifications respectively
}
