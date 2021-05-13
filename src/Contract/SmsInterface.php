<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

use DateTime;
use Laminas\Stdlib\ArraySerializableInterface;

interface SmsInterface extends ArraySerializableInterface
{
    /**
     * Get the Sms id
     * @return string
     */
    public function getId(): string;

    /**
     * Set the Sms id
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Get the Sms to
     * @return string
     */
    public function getTo(): string;

    /**
     * Set the Sms to
     * @param string $to
     * @return self
     */
    public function setTo(string $to): self;

    /**
     * Get the Sms msg
     * @return string
     */
    public function getMsg();

    /**
     * Set the Sms msg
     * @param string $msg
     * @return self
     */
    public function setMsg(string $msg): self;

    /**
     * Get the Sms from
     * @return string
     */
    public function getFrom(): string;

    /**
     * Set the Sms from
     * @param string $from
     * @return self
     */
    public function setFrom(string $from): self;

    /**
     * Get the Sms callbackOption
     * @return Callback|string
     */
    public function getCallbackOption();

    /**
     * Set the Sms callbackOption
     * @param Callback|string $callbackOption
     * @return self
     */
    public function setCallbackOption($callbackOption): self;

    /**
     * Get the Sms schedule
     * @return DateTime|string
     */
    public function getSchedule();

    /**
     * Set the Sms schedule
     * @param DateTime|string $schedule
     * @return self
     */
    public function setSchedule($schedule): self;

    /**
     * Get the Sms timeToLive
     * @return DateTime|string
     */
    public function getTimeToLive();

    /**
     * Set the Sms timeToLive
     * @param DateTime|string $timeToLive
     * @return self
     */
    public function setTimeToLive($timeToLive): self;

    /**
     * Get the Sms expiryDate
     * @return DateTime|string
     */
    public function getExpiryDate();

    /**
     * Set the Sms expiryDate
     * @param DateTime|string $expiryDate
     * @return self
     */
    public function setExpiryDate($expiryDate): self;
}
