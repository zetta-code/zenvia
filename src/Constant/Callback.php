<?php
/**
 * @link      http://github.com/zettaconstrepo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Constant;

class Callback extends Enum
{
    const __default = self::CALLBACK_NONE;

    const CALLBACK_NONE  = 'NONE';
    const CALLBACK_FINAL = 'FINAL';
    const CALLBACK_ALL   = 'ALL';
}