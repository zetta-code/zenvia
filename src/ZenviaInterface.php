<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia;

use Zetta\Zenvia\Http\SmsReceivedResponseInterface;
use Zetta\Zenvia\Model\SmsInterface;

interface ZenviaInterface
{
    /**
     * Send a message
     *
     * @param SmsInterface $message
     * @param string $aggregateId
     * @return \Zetta\Zenvia\Http\SmsResponseInterface
     */
    public function send($message, $aggregateId = null);

    /**
     * Send multiple messages
     *
     * @param SmsInterface[] $messages
     * @param string $aggregateId
     * @return \Zetta\Zenvia\Http\SmsResponseInterface[]
     */
    public function sendMultiple($messages,$aggregateId = null);

    /**
     * Check the status of a delivered sms
     *
     * @param string $id
     * @return \Zetta\Zenvia\Http\SmsStatusResponseInterface
     */
    public function check($id);

    /**
     * Cancel a message by id
     *
     * @param string $id
     * @return \Zetta\Zenvia\Http\SmsResponseInterface
     */
    public function cancel($id);

    /**
     * @return SmsReceivedResponseInterface
     */
    public function newSmsReceiveds();

    /**
     * @param \DateTime|string $start
     * @param \DateTime|string $end
     * @param string $mobile
     * @param string $id
     * @return SmsReceivedResponseInterface
     */
    public function searchSmsReceiveds($start, $end, $mobile = null, $id = null);
}
