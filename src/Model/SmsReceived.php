<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Model;

class SmsReceived implements SmsReceivedInterface
{
    /**
     * Id
     *
     * @var string
     */
    protected $id;

    /**
     * Received
     *
     * @var \DateTime
     */
    protected $received;

    /**
     * Mobile
     *
     * @var string
     */
    protected $mobile;

    /**
     * Body
     *
     * @var string
     */
    protected $body;

    /**
     * Shortcode
     *
     * @var string
     */
    protected $shortCode;

    /**
     * Account
     *
     * @var string
     */
    protected $account;

    /**
     * MobileOperatorName
     *
     * @var string
     */
    protected $mobileOperatorName;

    /**
     * CorrelatedMessageSmsId
     *
     * @var string
     */
    protected $correlatedMessageSmsId;
    
    /**
     * Get the Received id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the Received id
     * @param string $id
     * @return SmsReceived
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the Received dateReceived
     * @return \DateTime
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Set the Received dateReceived
     * @param \DateTime|string $received
     * @return SmsReceived
     */
    public function setReceived($received)
    {
        if (!$received instanceof \DateTime) {
            $received = \DateTime::createFromFormat('Y-m-d\TH:i:s', $received);
        }
        $this->received = $received;
        return $this;
    }

    /**
     * Get the Received mobile
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set the Received mobile
     * @param string $mobile
     * @return SmsReceived
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * Get the Received body
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the Received body
     * @param string $body
     * @return SmsReceived
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Get the Received shortCode
     * @return string
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }

    /**
     * Set the Received shortCode
     * @param string $shortCode
     * @return SmsReceived
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;
        return $this;
    }

    /**
     * Get the SmsReceived account
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set the SmsReceived account
     * @param string $account
     * @return SmsReceived
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * Get the Received mobileOperatorName
     * @return string
     */
    public function getMobileOperatorName()
    {
        return $this->mobileOperatorName;
    }

    /**
     * Set the Received mobileOperatorName
     * @param string $mobileOperatorName
     * @return SmsReceived
     */
    public function setMobileOperatorName($mobileOperatorName)
    {
        $this->mobileOperatorName = $mobileOperatorName;
        return $this;
    }

    /**
     * Get the Received correlatedMessageSmsId
     * @return string
     */
    public function getCorrelatedMessageSmsId()
    {
        return $this->correlatedMessageSmsId;
    }

    /**
     * Set the Received correlatedMessageSmsId
     * @param string $correlatedMessageSmsId
     * @return SmsReceived
     */
    public function setCorrelatedMessageSmsId($correlatedMessageSmsId)
    {
        $this->correlatedMessageSmsId = $correlatedMessageSmsId;
        return $this;
    }
    
    /**
     * @inheritdoc
     */
    public function exchangeArray(array $array)
    {
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
        if (isset($array['mobile'])) {
            $this->mobile = $array['mobile'];
        }
        if (isset($array['shortCode'])) {
            $this->shortCode = $array['shortCode'];
        }
        if (isset($array['account'])) {
            $this->account = $array['account'];
        }
        if (isset($array['mobileOperatorName'])) {
            $this->mobileOperatorName = $array['mobileOperatorName'];
        }
        if (isset($array['body'])) {
            $this->body = $array['body'];
        }
        if (isset($array['received'])) {
            $this->setReceived($array['received']);
        }
        if (isset($array['correlatedMessageSmsId'])) {
            $this->correlatedMessageSmsId = $array['correlatedMessageSmsId'];
        } elseif (isset($array['mtId'])) {
            $this->correlatedMessageSmsId = $array['mtId'];
        }
    }

    /**
     * * @inheritdoc
     */
    public function getArrayCopy()
    {
        $array = [];

        if ($this->id !== null) {
            $array['id'] = $this->id;
        }
        if ($this->mobile !== null) {
            $array['mobile'] = $this->mobile;
        }
        if ($this->shortCode !== null) {
            $array['shortCode'] = $this->shortCode;
        }
        if ($this->account !== null) {
            $array['account'] = $this->account;
        }
        if ($this->mobileOperatorName !== null) {
            $array['mobileOperatorName'] = $this->mobileOperatorName;
        }
        if ($this->body !== null) {
            $array['body'] = $this->body;
        }
        if ($this->received !== null) {
            $array['received'] = $this->received->format('Y-m-d\TH:i:s');
        }
        if ($this->correlatedMessageSmsId !== null) {
            $array['correlatedMessageSmsId'] = $this->correlatedMessageSmsId;
        }

        return $array;
    }
}
