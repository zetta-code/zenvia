<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Model;

use DateTime;
use Zetta\Zenvia\Contract\SmsInterface;
use Zetta\Zenvia\Enum\CallbackEnum;

class Sms implements SmsInterface
{
    /**
     * Id
     *
     * @var string
     */
    protected $id;

    /**
     * To
     *
     * @var string
     */
    protected $to;

    /**
     * Message
     *
     * @var string
     */
    protected $msg;

    /**
     * From
     *
     * @var string
     */
    protected $from;

    /**
     * @var CallbackEnum
     */
    protected $callbackOption;

    /**
     * Schedule
     *
     * @var DateTime
     */
    protected $schedule;

    /**
     * Time to live
     *
     * @var DateTime
     */
    protected $timeToLive = null;

    /**
     * Expiry date
     *
     * @var DateTime
     */
    protected $expiryDate = null;

    /**
     * Sms constructor.
     * @param string $to
     * @param string $msg
     * @param string $id
     * @param string $from
     * @param Callback|string $callbackOption
     * @param DateTime|string $schedule
     */
    public function __construct(
        $to,
        $msg,
        $id = null,
        $from = null,
        $schedule = null,
        $callbackOption = null
    ) {
        $this->to = $to;
        $this->msg = $msg;
        $this->id = $id;
        $this->from = $from;
        if ($callbackOption === null) {
            $callbackOption = CallbackEnum::none();
        }
        $this->setCallbackOption($callbackOption);
        $this->setSchedule($schedule);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function setTo(string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function getMsg(): string
    {
        return $this->msg;
    }

    public function setMsg(string $msg): self
    {
        $this->msg = $msg;
        return $this;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getCallbackOption(): CallbackEnum
    {
        return $this->callbackOption;
    }

    public function setCallbackOption($callbackOption): self
    {
        $this->callbackOption = ! $callbackOption instanceof CallbackEnum && $callbackOption !== null
            ? CallbackEnum::from($callbackOption)
            : $callbackOption;
        return $this;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

    public function setSchedule($schedule): self
    {
        if ($schedule !== null && ! $schedule instanceof DateTime) {
            $schedule = DateTime::createFromFormat('Y-m-d\TH:i:s', $schedule);
        }
        $this->schedule = $schedule;
        return $this;
    }

    public function getTimeToLive()
    {
        return $this->timeToLive;
    }

    public function setTimeToLive($timeToLive): self
    {
        if ($timeToLive !== null && ! $timeToLive instanceof DateTime) {
            $timeToLive = DateTime::createFromFormat('Y-m-d\TH:i:s', $timeToLive);
        }
        $this->timeToLive = $timeToLive;
        return $this;
    }

    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    public function setExpiryDate($expiryDate): self
    {
        if ($expiryDate !== null && ! $expiryDate instanceof DateTime) {
            $expiryDate = DateTime::createFromFormat('Y-m-d\TH:i:s', $expiryDate);
        }
        $this->expiryDate = $expiryDate;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function exchangeArray(array $array)
    {
        if (isset($array['from'])) {
            $this->from = $array['from'];
        }
        if (isset($array['to'])) {
            $this->to = $array['to'];
        }
        if (isset($array['schedule'])) {
            $this->setSchedule($array['schedule']);
        }
        if (isset($array['msg'])) {
            $this->msg = $array['msg'];
        }
        if (isset($array['callbackOption'])) {
            $this->callbackOption = $array['callbackOption'];
        }
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
        if (isset($array['expiryDate'])) {
            $this->setExpiryDate($array['expiryDate']);
        }
        if (isset($array['timetoLive'])) {
            $this->setTimeToLive($array['timeToLive']);
        }
    }

    /**
     * @inheritdoc
     */
    public function getArrayCopy()
    {
        $array = [];

        if ($this->from !== null) {
            $array['from'] = $this->from;
        }
        if ($this->to !== null) {
            $array['to'] = $this->to;
        }
        if ($this->schedule !== null) {
            if ($this->schedule instanceof DateTime) {
                $array['schedule'] = $this->schedule->format('Y-m-d\TH:i:s');
            } else {
                $array['schedule'] = $this->schedule;
            }
        }
        if ($this->msg !== null) {
            $array['msg'] = $this->msg;
        }
        if ($this->callbackOption !== null) {
            $array['callbackOption'] = (string)$this->callbackOption;
        }
        if ($this->id !== null) {
            $array['id'] = $this->id;
        }
        if ($this->expiryDate !== null) {
            if ($this->expiryDate instanceof DateTime) {
                $array['expiryDate'] = $this->expiryDate->format('Y-m-d\TH:i:s');
            } else {
                $array['expiryDate'] = $this->expiryDate;
            }
        }
        if ($this->timeToLive !== null) {
            if ($this->timeToLive instanceof DateTime) {
                $array['timetoLive'] = $this->timeToLive->format('Y-m-d\TH:i:s');
            } else {
                $array['timetoLive'] = $this->timeToLive;
            }
        }

        return $array;
    }
}
