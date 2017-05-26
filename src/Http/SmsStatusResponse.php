<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Constant\DetailCode;
use Zetta\Zenvia\Constant\StatusCode;

class SmsStatusResponse extends SmsResponse implements SmsStatusResponseInterface
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
     * StatusResponse constructor.
     * @param StatusCode|string $statusCode
     * @param string $statusDescription
     * @param DetailCode|string $detailCode
     * @param string $detailDescription
     * @param string $id
     * @param \DateTime|string $received
     * @param string $shortCode
     * @param string $mobileOperatorName
     */
    public function __construct($statusCode, $statusDescription, $detailCode, $detailDescription, $id = null, $received  = null, $shortCode  = null, $mobileOperatorName = null)
    {
        parent::__construct($statusCode, $statusDescription, $detailCode, $detailDescription);

        $this->id = $id;
        $this->setReceived($received);
        $this->shortCode = $shortCode;
        $this->mobileOperatorName = $mobileOperatorName;
    }

    /**
     * Get the StatusResponse id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the StatusResponse id
     * @param string $id
     * @return SmsStatusResponse
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the StatusResponse received
     * @return \DateTime
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Set the StatusResponse received
     * @param \DateTime|string $received
     * @return SmsStatusResponse
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
     * Get the StatusResponse shortCode
     * @return string
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }

    /**
     * Set the StatusResponse shortCode
     * @param string $shortCode
     * @return SmsStatusResponse
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;
        return $this;
    }

    /**
     * Get the StatusResponse mobileOperatorName
     * @return string
     */
    public function getMobileOperatorName()
    {
        return $this->mobileOperatorName;
    }

    /**
     * Set the StatusResponse mobileOperatorName
     * @param string $mobileOperatorName
     * @return SmsStatusResponse
     */
    public function setMobileOperatorName($mobileOperatorName)
    {
        $this->mobileOperatorName = $mobileOperatorName;
        return $this;
    }
}
