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
 * @method static self sendSmsRequest()
 * @method static self sendSmsMultiRequest()
 * @method static self sendSmsRequestList()
 * @method static self aggregateId()
 * @method static self callbackMtRequest()
 * @method static self callbackMoRequest()
 */
class RequestParamEnum extends Enum
{
}
