<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Model;

use Zend\Stdlib\ArraySerializableInterface;

interface SmsInterface extends ArraySerializableInterface
{
    /**
     * Get the Sms id
     * @return string
     */
    public function getId();

    /**
     * Set the Sms id
     * @param string $id
     * @return SmsInterface
     */
    public function setId($id);

    /**
     * Get the Sms to
     * @return string
     */
    public function getTo();

    /**
     * Set the Sms to
     * @param string $to
     * @return SmsInterface
     */
    public function setTo($to);

    /**
     * Get the Sms msg
     * @return string
     */
    public function getMsg();

    /**
     * Set the Sms msg
     * @param string $msg
     * @return SmsInterface
     */
    public function setMsg($msg);

    /**
     * Get the Sms from
     * @return string
     */
    public function getFrom();

    /**
     * Set the Sms from
     * @param string $from
     * @return SmsInterface
     */
    public function setFrom($from);

    /**
     * Get the Sms callbackOption
     * @return Callback
     */
    public function getCallbackOption();

    /**
     * Set the Sms callbackOption
     * @param Callback|string $callbackOption
     * @return SmsInterface
     */
    public function setCallbackOption($callbackOption);

    /**
     * Get the Sms schedule
     * @return \DateTime|string
     */
    public function getSchedule();

    /**
     * Set the Sms schedule
     * @param \DateTime|string $schedule
     * @return SmsInterface
     */
    public function setSchedule($schedule);

    /**
     * Get the Sms timeToLive
     * @return \DateTime|string
     */
    public function getTimeToLive();

    /**
     * Set the Sms timeToLive
     * @param \DateTime|string $timeToLive
     * @return SmsInterface
     */
    public function setTimeToLive($timeToLive);

    /**
     * Get the Sms expiryDate
     * @return \DateTime|string
     */
    public function getExpiryDate();

    /**
     * Set the Sms expiryDate
     * @param \DateTime|string $expiryDate
     * @return SmsInterface
     */
    public function setExpiryDate($expiryDate);
}
