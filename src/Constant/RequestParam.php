<?php
/**
 * @link      http://github.com/zettaconstrepo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Constant;

class RequestParam extends Enum
{
    const __default = self::SEND_SMS_REQUEST;

    const SEND_SMS_REQUEST = 'sendSmsRequest';
    const SEND_SMS_MULTI_REQUEST = 'sendSmsMultiRequest';
    const SEND_SMS_REQUEST_LIST = 'sendSmsRequestList';
    const AGGREGATE_ID_KEY = 'aggregateId';
    const CALLBACK_MT_REQUEST = 'callbackMtRequest';
    const CALLBACK_MO_REQUEST = 'callbackMoRequest';
}