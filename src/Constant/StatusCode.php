<?php
/**
 * @link      http://github.com/zettaconstrepo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia;

namespace Zetta\Zenvia\Constant;

class StatusCode extends Enum
{
    const __default = self::OK;

    const OK                          = '00';
    const SCHEDULED                   = '01';
    const SENT                        = '02';
    const DELIVERED                   = '03';
    const NOT_RECEIVED                = '04';
    const BLOCKED_NO_COVERAGE         = '05';
    const BLOCKED_BLACK_LISTED        = '06';
    const BLOCKED_INVALID_NUMBER      = '07';
    const BLOCKED_CONTENT_NOT_ALLOWED = '08';
    const BLOCKED_MESSAGE_EXPIRED     = '08';
    const BLOCKED                     = '09';
    const ERROR                       = '10';
}
