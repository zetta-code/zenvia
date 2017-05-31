<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zend\Stdlib\ArraySerializableInterface;
use Zetta\Zenvia\Constant\DetailCode;
use Zetta\Zenvia\Constant\RequestParam;
use Zetta\Zenvia\Constant\StatusCode;

class SmsRequest implements SmsRequestInterface, ArraySerializableInterface
{
    /**
     * Name
     *
     * @var RequestParam
     */
    protected $name;

    /**
     * Status code
     *
     * @var StatusCode
     */
    protected $statusCode;

    /**
     * Status description
     *
     * @var string
     */
    protected $statusDescription;

    /**
     * Detail code
     *
     * @var DetailCode
     */
    protected $detailCode;

    /**
     * Detail description
     *
     * @var string
     */
    protected $detailDescription;

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
     * Shortcode
     *
     * @var string
     */
    protected $shortCode;

    /**
     * Mobile operator name
     *
     * @var string
     */
    protected $mobileOperatorName;

    /**
     * Sms Received
     *
     * @var string
     */
    protected $smsReceived;

    /**
     * SmsRequest constructor.
     * @param RequestParam|string $name
     */
    public function __construct($name = null)
    {
        if ($name !== null) {
            $this->setName($name);
        }
    }

    /**
     * Get the SmsRequest name
     * @return RequestParam
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the SmsRequest name
     * @param RequestParam|string $name
     * @return SmsRequest
     */
    public function setName($name)
    {
        if (!$name instanceof RequestParam) {
            $name = new RequestParam($name);
        }
        $this->name = $name;
        return $this;
    }

    /**
     * Get the SmsRequest statusCode
     * @return StatusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the SmsRequest statusCode
     * @param StatusCode|string $statusCode
     * @return SmsRequest
     */
    public function setStatusCode($statusCode)
    {
        if (!$statusCode instanceof StatusCode) {
            $statusCode = new StatusCode($statusCode);
        }
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Get the SmsRequest statusDescription
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Set the SmsRequest statusDescription
     * @param string $statusDescription
     * @return SmsRequest
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    /**
     * Get the SmsRequest detailCode
     * @return DetailCode
     */
    public function getDetailCode()
    {
        return $this->detailCode;
    }

    /**
     * Set the SmsRequest detailCode
     * @param DetailCode|string $detailCode
     * @return SmsRequest
     */
    public function setDetailCode($detailCode)
    {
        if (!$detailCode instanceof DetailCode) {
            $detailCode = new DetailCode($detailCode);
        }

        $this->detailCode = $detailCode;
        return $this;
    }

    /**
     * Get the SmsRequest detailDescription
     * @return string
     */
    public function getDetailDescription()
    {
        return $this->detailDescription;
    }

    /**
     * Set the SmsRequest detailDescription
     * @param string $detailDescription
     * @return SmsRequest
     */
    public function setDetailDescription($detailDescription)
    {
        $this->detailDescription = $detailDescription;
        return $this;
    }

    /**
     * Get the SmsRequest id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the SmsRequest id
     * @param string $id
     * @return SmsRequest
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the SmsRequest received
     * @return \DateTime
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Set the SmsRequest received
     * @param \DateTime|string $received
     * @return SmsRequest
     */
    public function setReceived($received)
    {
        if ($received !== null && !$received instanceof \DateTime) {
            $received = \DateTime::createFromFormat('Y-m-d\TH:i:s', $received);
        }
        $this->received = $received;
        return $this;
    }

    /**
     * Get the SmsRequest shortCode
     * @return string
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }

    /**
     * Set the SmsRequest shortCode
     * @param string $shortCode
     * @return SmsRequest
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;
        return $this;
    }

    /**
     * Get the SmsRequest mobileOperatorName
     * @return string
     */
    public function getMobileOperatorName()
    {
        return $this->mobileOperatorName;
    }

    /**
     * Set the SmsRequest mobileOperatorName
     * @param string $mobileOperatorName
     * @return SmsRequest
     */
    public function setMobileOperatorName($mobileOperatorName)
    {
        $this->mobileOperatorName = $mobileOperatorName;
        return $this;
    }

    /**
     * Get the SmsRequest smsReceived
     * @return string
     */
    public function getSmsReceived()
    {
        return $this->smsReceived;
    }

    /**
     * Set the SmsRequest smsReceived
     * @param string $smsReceived
     * @return SmsRequest
     */
    public function setSmsReceived($smsReceived)
    {
        $this->smsReceived = $smsReceived;
        return $this;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        if (isset($array['statusCode'])) {
            $this->statusCode = $array['statusCode'];
        }
        if (isset($array['statusDescription'])) {
            $this->statusDescription = $array['statusDescription'];
        }
        if (isset($array['detailCode'])) {
            $this->detailCode = $array['detailCode'];
        }
        if (isset($array['detailDescription'])) {
            $this->detailDescription = $array['detailDescription'];
        }
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
        if (isset($array['received'])) {
            $this->setReceived($array['received']);
        }
        if (isset($array['shortCode'])) {
            $this->shortCode = $array['shortCode'];
        }
        if (isset($array['mobileOperatorName'])) {
            $this->mobileOperatorName = $array['mobileOperatorName'];
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        $array = [];

        if ($this->statusCode !== null) {
            $array['statusCode'] = $this->statusCode;
        }
        if ($this->statusDescription !== null) {
            $array['statusDescription'] = $this->statusDescription;
        }
        if ($this->detailCode !== null) {
            $array['detailCode'] = $this->detailCode;
        }
        if ($this->detailDescription !== null) {
            $array['detailDescription'] = $this->detailDescription;
        }
        if ($this->id !== null) {
            $array['id'] = $this->id;
        }
        if ($this->received !== null) {
            $array['received'] = $this->received->format('Y-m-d\TH:i:s');
            if ($this->received instanceof \DateTime) {
                $array['received'] = $this->received->format('Y-m-d\TH:i:s');
            } else {
                $array['received'] = $this->received;
            }
        }
        if ($this->shortCode !== null) {
            $array['shortCode'] = $this->shortCode;
        }
        if ($this->mobileOperatorName !== null) {
            $array['mobileOperatorName'] = $this->mobileOperatorName;
        }

        return $array;
    }
}
