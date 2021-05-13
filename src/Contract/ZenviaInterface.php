<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

use DateTime;

interface ZenviaInterface
{
    /**
     * Send a message
     *
     * @param SmsInterface $message
     * @param string|null $aggregateId
     * @return SmsResponseInterface
     */
    public function send(SmsInterface $message, ?string $aggregateId = null): SmsResponseInterface;

    /**
     * Send multiple messages
     *
     * @param SmsInterface[] $messages
     * @param string|null $aggregateId
     * @return SmsResponseInterface[]
     */
    public function sendMultiple(array $messages, ?string $aggregateId = null): array;

    /**
     * Check the status of a delivered sms
     *
     * @param string $id
     * @return SmsStatusResponseInterface
     */
    public function check(string $id): SmsStatusResponseInterface;

    /**
     * Cancel a message by id
     *
     * @param string $id
     * @return SmsResponseInterface
     */
    public function cancel(string $id): SmsResponseInterface;

    /**
     * @return SmsReceivedResponseInterface
     */
    public function newSmsReceiveds(): SmsReceivedResponseInterface;

    /**
     * @param DateTime|string $start
     * @param DateTime|string $end
     * @param string|null $mobile
     * @param string|null $id
     * @return SmsReceivedResponseInterface
     */
    public function searchSmsReceiveds(
        $start,
        $end,
        ?string $mobile = null,
        ?string $id = null
    ): SmsReceivedResponseInterface;
}
