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
 * @method static self messageSent()
 * @method static self messageSuccessfullyCanceled()
 * @method static self messageContentEmpty()
 * @method static self messageBodyInvalid()
 * @method static self messageContentOverflow()
 * @method static self toMobileNumberIncorrect()
 * @method static self toMobileNumberEmpty()
 * @method static self schedulingInvalid()
 * @method static self idOverflow()
 * @method static self urlInvalid()
 * @method static self fromInvalid()
 * @method static self idMandatory()
 * @method static self messageWithSameId()
 * @method static self messageQueued()
 * @method static self messageSentToOperator()
 * @method static self messageConfirmationUnavailable()
 * @method static self messageReceivedByMobile()
 * @method static self messageBlocked()
 * @method static self messageBlockedByPredictiveCleansing()
 * @method static self messageAlreadyCanceled()
 * @method static self messageContentInAnalysis()
 * @method static self messageBlockedByForbiddenContent()
 * @method static self aggregateInvalidOrInactive()
 * @method static self messageExpired()
 * @method static self mobileNumberNotCovered()
 * @method static self internationalSendingNotAllowed()
 * @method static self inactiveMobileNumber()
 * @method static self messageExpiredInOperator()
 * @method static self operatorNetworkError()
 * @method static self messageRejectedByOperator()
 * @method static self messageCancelledOrBlockedByOperator()
 * @method static self badMessage()
 * @method static self badNumber()
 * @method static self missingParameter()
 * @method static self messageIdNotfound()
 * @method static self unknownError()
 * @method static self messagesSent()
 * @method static self messagesScheduledButAccountLimitReached()
 * @method static self fileEmptyOrNotSent()
 * @method static self fileTooLarge()
 * @method static self fileReaderror()
 * @method static self receivedMessagesFound()
 * @method static self noReceivedMessagesFound()
 * @method static self entitySaved()
 * @method static self authenticationError()
 * @method static self accountTypeNotSupportThisOperation()
 * @method static self accountLimitReached()
 * @method static self wrongOperationRequested()
 * @method static self unknown()
 */
class DetailCodeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'messageSent' => '000',
            'messageSuccessfullyCanceled' => '002',
            'messageContentEmpty' => '010',
            'messageBodyInvalid' => '011',
            'messageContentOverflow' => '012',
            'toMobileNumberIncorrect' => '013',
            'toMobileNumberEmpty' => '014',
            'schedulingInvalid' => '015',
            'idOverflow' => '016',
            'urlInvalid' => '017',
            'fromInvalid' => '018',
            'idMandatory' => '021',
            'messageWithSameId' => '080',
            'messageQueued' => '100',
            'messageSentToOperator' => '110',
            'messageConfirmationUnavailable' => '111',
            'messageReceivedByMobile' => '120',
            'messageBlocked' => '130',
            'messageBlockedByPredictiveCleansing' => '131',
            'messageAlreadyCanceled' => '132',
            'messageContentInAnalysis' => '133',
            'messageBlockedByForbiddenContent' => '134',
            'aggregateInvalidOrInactive' => '135',
            'messageExpired' => '136',
            'mobileNumberNotCovered' => '140',
            'internationalSendingNotAllowed' => '141',
            'inactiveMobileNumber' => '145',
            'messageExpiredInOperator' => '150',
            'operatorNetworkError' => '160',
            'messageRejectedByOperator' => '161',
            'messageCancelledOrBlockedByOperator' => '162',
            'badMessage' => '170',
            'badNumber' => '171',
            'missingParameter' => '172',
            'messageIdNotfound' => '180',
            'unknownError' => '190',
            'messagesSent' => '200',
            'messagesScheduledButAccountLimitReached' => '210',
            'fileEmptyOrNotSent' => '240',
            'fileTooLarge' => '241',
            'fileReaderror' => '242',
            'receivedMessagesFound' => '300',
            'noReceivedMessagesFound' => '301',
            'entitySaved' => '400',
            'authenticationError' => '900',
            'accountTypeNotSupportThisOperation' => '901',
            'accountLimitReached' => '990',
            'wrongOperationRequested' => '998',
            'unknown' => '999',
        ];
    }
}
