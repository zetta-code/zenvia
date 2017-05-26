<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Model;

use Zend\Stdlib\ArraySerializableInterface;

interface SmsReceivedInterface extends ArraySerializableInterface
{
    /**
     * Get the Received id
     * @return string
     */
    public function getId();

    /**
     * Set the Received id
     * @param string $id
     * @return SmsReceived
     */
    public function setId($id);

    /**
     * Get the Received received
     * @return \DateTime|string
     */
    public function getReceived();

    /**
     * Set the Received received
     * @param \DateTime|string $received
     * @return SmsReceived
     */
    public function setReceived($received);

    /**
     * Get the Received mobile
     * @return string
     */
    public function getMobile();

    /**
     * Set the Received mobile
     * @param string $mobile
     * @return SmsReceived
     */
    public function setMobile($mobile);

    /**
     * Get the Received body
     * @return string
     */
    public function getBody();

    /**
     * Set the Received body
     * @param string $body
     * @return SmsReceived
     */
    public function setBody($body);

    /**
     * Get the Received shortCode
     * @return string
     */
    public function getShortCode();

    /**
     * Set the Received shortCode
     * @param string $shortCode
     * @return SmsReceived
     */
    public function setShortCode($shortCode);
    /**
     * Get the Received mobileOperatorName
     * @return string
     */
    public function getMobileOperatorName();

    /**
     * Set the Received mobileOperatorName
     * @param string $mobileOperatorName
     * @return SmsReceived
     */
    public function setMobileOperatorName($mobileOperatorName);

    /**
     * Get the Received correlatedMessageSmsId
     * @return string
     */
    public function getCorrelatedMessageSmsId();

    /**
     * Set the Received correlatedMessageSmsId
     * @param string $correlatedMessageSmsId
     * @return SmsReceived
     */
    public function setCorrelatedMessageSmsId($correlatedMessageSmsId);
}
