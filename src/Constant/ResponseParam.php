<?php
/**
 * @link      http://github.com/zettaconstrepo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Constant;

class ResponseParam extends Enum
{
    const __default = self::SEND_SMS_RESPONSE;

    const SEND_SMS_RESPONSE = 'sendSmsResponse';
    const SEND_SMS_MULTI_RESPONSE = 'sendSmsMultiResponse';
    const SEND_SMS_RESPONSE_LIST = 'sendSmsResponseList';
    const GET_SMS_STATUS_RESP = 'getSmsStatusResp';
    const CANCEL_SMS_RESP = 'cancelSmsResp';
    const RECEIVED_RESPONSE = 'receivedResponse';
    const RECEIVED_MESSAGES = 'receivedMessages';
}