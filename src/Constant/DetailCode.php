<?php
/**
 * @link      http://github.com/zettaconstrepo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia;

namespace Zetta\Zenvia\Constant;

class DetailCode extends Enum
{
    const __default = self::MESSAGE_SENT;

    const MESSAGE_SENT                                 = '000';
    const MESSAGE_SUCCESSFULLY_CANCELED                = '002';
    const MESSAGE_CONTENT_EMPTY                        = '010';
    const MESSAGE_BODY_INVALID                         = '011';
    const MESSAGE_CONTENT_OVERFLOW                     = '012';
    const TO_MOBILE_NUMBER_INCORRECT                   = '013';
    const TO_MOBILE_NUMBER_EMPTY                       = '014';
    const SCHEDULING_INVALID                           = '015';
    const ID_OVERFLOW                                  = '016';
    const URL_INVALID                                  = '017';
    const FROM_INVALID                                 = '018';
    const ID_MANDATORY                                 = '021';
    const MESSAGE_WITH_SAME_ID                         = '080';
    const MESSAGE_QUEUED                               = '100';
    const MESSAGE_SENT_TO_OPERATOR                     = '110';
    const MESSAGE_CONFIRMATION_UNAVAILABLE             = '111';
    const MESSAGE_RECEIVED_BY_MOBILE                   = '120';
    const MESSAGE_BLOCKED                              = '130';
    const MESSAGE_BLOCKED_BY_PREDICTIVE_CLEANSING      = '131';
    const MESSAGE_ALREADY_CANCELED                     = '132';
    const MESSAGE_CONTENT_IN_ANALYSIS                  = '133';
    const MESSAGE_BLOCKED_BY_FORBIDDEN_CONTENT         = '134';
    const AGGREGATE_INVALID_OR_INACTIVE                = '135';
    const MESSAGE_EXPIRED                              = '136';
    const MOBILE_NUMBER_NOT_COVERED                    = '140';
    const INTERNATIONAL_SENDING_NOT_ALLOWED            = '141';
    const INACTIVE_MOBILE_NUMBER                       = '145';
    const MESSAGE_EXPIRED_IN_OPERATOR                  = '150';
    const OPERATOR_NETWORK_ERROR                       = '160';
    const MESSAGE_REJECTED_BY_OPERATOR                 = '161';
    const MESSAGE_CANCELLED_OR_BLOCKED_BY_OPERATOR     = '162';
    const BAD_MESSAGE                                  = '170';
    const BAD_NUMBER                                   = '171';
    const MISSING_PARAMETER                            = '172';
    const MESSAGE_ID_NOTFOUND                          = '180';
    const UNKNOWN_ERROR                                = '190';
    const MESSAGES_SENT                                = '200';
    const MESSAGES_SCHEDULED_BUT_ACCOUNT_LIMIT_REACHED = '210';
    const FILE_EMPTY_OR_NOT_SENT                       = '240';
    const FILE_TOO_LARGE                               = '241';
    const FILE_READERROR                               = '242';
    const RECEIVED_MESSAGES_FOUND                      = '300';
    const NO_RECEIVED_MESSAGES_FOUND                   = '301';
    const ENTITY_SAVED                                 = '400';
    const AUTHENTICATION_ERROR                         = '900';
    const ACCOUNT_TYPE_NOT_SUPPORT_THIS_OPERATION      = '901';
	const ACCOUNT_LIMIT_REACHED                        = '990';
	const WRONG_OPERATION_REQUESTED                    = '998';
	const UNKNOWN                                      = '999';
}
