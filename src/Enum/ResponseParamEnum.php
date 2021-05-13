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
 * @method static self sendSmsResponse()
 * @method static self sendSmsMultiResponse()
 * @method static self sendSmsResponseList()
 * @method static self getSmsStatusResp()
 * @method static self cancelSmsResp()
 * @method static self receivedResponse()
 * @method static self receivedMessages()
 */
class ResponseParamEnum extends Enum
{
}
