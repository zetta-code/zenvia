<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Constant\DetailCode;
use Zetta\Zenvia\Constant\RequestParam;
use Zetta\Zenvia\Constant\StatusCode;
use Zetta\Zenvia\Model\SmsReceivedInterface;

interface SmsRequestInterface
{
    /**
     * Get the SmsRequest name
     * @return RequestParam
     */
    public function getName();

    /**
     * Set the SmsRequest name
     * @param RequestParam|string $name
     * @return SmsRequestInterface
     */
    public function setName($name);

    /**
     * Get the SmsRequest statusCode
     * @return StatusCode
     */
    public function getStatusCode();

    /**
     * Set the SmsRequest statusCode
     * @param StatusCode|string $statusCode
     * @return SmsRequestInterface
     */
    public function setStatusCode($statusCode);

    /**
     * Get the SmsRequest statusDescription
     * @return string
     */
    public function getStatusDescription();

    /**
     * Set the SmsRequest statusDescription
     * @param string $statusDescription
     * @return SmsRequestInterface
     */
    public function setStatusDescription($statusDescription);

    /**
     * Get the SmsRequest detailCode
     * @return DetailCode
     */
    public function getDetailCode();

    /**
     * Set the SmsRequest detailCode
     * @param DetailCode|string $detailCode
     * @return SmsRequestInterface
     */
    public function setDetailCode($detailCode);

    /**
     * Get the SmsRequest detailDescription
     * @return string
     */
    public function getDetailDescription();

    /**
     * Set the SmsRequest detailDescription
     * @param string $detailDescription
     * @return SmsRequestInterface
     */
    public function setDetailDescription($detailDescription);

    /**
     * Get the SmsRequest id
     * @return string
     */
    public function getId();

    /**
     * Set the SmsRequest id
     * @param string $id
     * @return SmsRequestInterface
     */
    public function setId($id);

    /**
     * Get the SmsRequest received
     * @return \DateTime|string
     */
    public function getReceived();

    /**
     * Set the SmsRequest received
     * @param \DateTime|string $received
     * @return SmsRequestInterface
     */
    public function setReceived($received);

    /**
     * Get the SmsRequest shortCode
     * @return string
     */
    public function getShortCode();

    /**
     * Set the SmsRequest shortCode
     * @param string $shortCode
     * @return SmsRequestInterface
     */
    public function setShortCode($shortCode);

    /**
     * Get the SmsRequest mobileOperatorName
     * @return string
     */
    public function getMobileOperatorName();

    /**
     * Set the SmsRequest mobileOperatorName
     * @param string $mobileOperatorName
     * @return SmsRequestInterface
     */
    public function setMobileOperatorName($mobileOperatorName);

    /**
     * Get the SmsRequest smsReceived
     * @return SmsReceivedInterface
     */
    public function getSmsReceived();

    /**
     * Set the SmsRequest smsReceived
     * @param SmsReceivedInterface $smsReceived
     * @return SmsRequestInterface
     */
    public function setSmsReceived($smsReceived);
}
