<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Enum;

use Spatie\Enum\Enum;

/**
 * @method static self ok()
 * @method static self scheduled()
 * @method static self sent()
 * @method static self delivered()
 * @method static self notReceived()
 * @method static self blockedNoCoverage()
 * @method static self blockedBlackListed()
 * @method static self blockedInvalidNumber()
 * @method static self blockedContentNotAllowed()
 * @method static self blockedMessageExpired()
 * @method static self blocked()
 * @method static self error()
 */
class StatusCodeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'ok' => '00',
            'scheduled' => '01',
            'sent' => '02',
            'delivered' => '03',
            'notReceived' => '04',
            'blockedNoCoverage' => '05',
            'blockedBlackListed' => '06',
            'blockedInvalidNumber' => '07',
            'blockedContentNotAllowed' => '08',
            'blocked' => '09',
            'error' => '10',
        ];
    }
}
