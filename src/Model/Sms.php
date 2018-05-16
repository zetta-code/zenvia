<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Model;

use Zetta\Zenvia\Constant\Callback;

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
     * @var Callback
     */
    protected $callbackOption;

    /**
     * Schedule
     *
     * @var \DateTime
     */
    protected $schedule;

    /**
     * Time to live
     *
     * @var \DateTime
     */
    protected $timeToLive = null;

    /**
     * Expiry date
     *
     * @var \DateTime
     */
    protected $expiryDate = null;

    /**
     * Sms constructor.
     * @param string $to
     * @param string $msg
     * @param string $id
     * @param string $from
     * @param Callback|string $callbackOption
     * @param \DateTime|string $schedule
     */
    public function __construct($to, $msg, $id = null, $from = null, $schedule = null, $callbackOption = Callback::CALLBACK_NONE)
    {
        $this->to = $to;
        $this->msg = $msg;
        $this->id = $id;
        $this->from = $from;
        $this->setCallbackOption($callbackOption);
        $this->setSchedule($schedule);
    }

    /**
     * Get the Sms id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the Sms id
     * @param string $id
     * @return Sms
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the Sms to
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the Sms to
     * @param string $to
     * @return Sms
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * Get the Sms msg
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set the Sms msg
     * @param string $msg
     * @return Sms
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
        return $this;
    }

    /**
     * Get the Sms from
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the Sms from
     * @param string $from
     * @return Sms
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Get the Sms callbackOption
     * @return Callback
     */
    public function getCallbackOption()
    {
        return $this->callbackOption;
    }

    /**
     * Set the Sms callbackOption
     * @param Callback|string $callbackOption
     * @return Sms
     */
    public function setCallbackOption($callbackOption)
    {
        if (!$callbackOption instanceof Callback) {
            $callbackOption = new Callback($callbackOption);
        }
        $this->callbackOption = $callbackOption;
        return $this;
    }

    /**
     * Get the Sms schedule
     * @return \DateTime
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set the Sms schedule
     * @param \DateTime|string $schedule
     * @return Sms
     */
    public function setSchedule($schedule)
    {
        if ($schedule !== null && !$schedule instanceof \DateTime) {
            $schedule = \DateTime::createFromFormat('Y-m-d\TH:i:s', $schedule);
        }
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * Get the Sms timeToLive
     * @return \DateTime
     */
    public function getTimeToLive()
    {
        return $this->timeToLive;
    }

    /**
     * Set the Sms timeToLive
     * @param \DateTime|string $timeToLive
     * @return Sms
     */
    public function setTimeToLive($timeToLive)
    {
        if ($timeToLive !== null && !$timeToLive instanceof \DateTime) {
            $timeToLive = \DateTime::createFromFormat('Y-m-d\TH:i:s', $timeToLive);
        }
        $this->timeToLive = $timeToLive;
        return $this;
    }

    /**
     * Get the Sms expiryDate
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * Set the Sms expiryDate
     * @param \DateTime|string $expiryDate
     * @return Sms
     */
    public function setExpiryDate($expiryDate)
    {
        if ($expiryDate !== null && !$expiryDate instanceof \DateTime) {
            $expiryDate = \DateTime::createFromFormat('Y-m-d\TH:i:s', $expiryDate);
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
            if ($this->schedule instanceof \DateTime) {
                $array['schedule'] = $this->schedule->format('Y-m-d\TH:i:s');
            } else {
                $array['schedule'] = $this->schedule;
            }
        }
        if ($this->msg !== null) {
            $array['msg'] = $this->msg;
        }
        if ($this->callbackOption !== null) {
            $array['callbackOption'] = (string) $this->callbackOption;
        }
        if ($this->id !== null) {
            $array['id'] = $this->id;
        }
        if ($this->expiryDate !== null) {
            if ($this->expiryDate instanceof \DateTime) {
                $array['expiryDate'] = $this->expiryDate->format('Y-m-d\TH:i:s');
            } else {
                $array['expiryDate'] = $this->expiryDate;
            }
        }
        if ($this->timeToLive !== null) {
            if ($this->timeToLive instanceof \DateTime) {
                $array['timetoLive'] = $this->timeToLive->format('Y-m-d\TH:i:s');
            } else {
                $array['timetoLive'] = $this->timeToLive;
            }
        }

        return $array;
    }
}
