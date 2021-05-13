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
 * @method static self none()
 * @method static self final()
 * @method static self all()
 */
class CallbackEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'none' => 'NONE',
            'final' => 'FINAL',
            'all' => 'ALL',
        ];
    }
}
