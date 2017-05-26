<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

interface SmsStatusResponseInterface extends SmsResponseInterface
{
    /**
     * Get the StatusResponse id
     * @return string
     */
    public function getId();

    /**
     * Set the StatusResponse id
     * @param string $id
     * @return SmsStatusResponseInterface
     */
    public function setId($id);

    /**
     * Get the StatusResponse received
     * @return \DateTime|string
     */
    public function getReceived();

    /**
     * Set the StatusResponse received
     * @param \DateTime|string $received
     * @return SmsStatusResponseInterface
     */
    public function setReceived($received);

    /**
     * Get the StatusResponse shortCode
     * @return string
     */
    public function getShortCode();

    /**
     * Set the StatusResponse shortCode
     * @param string $shortCode
     * @return SmsStatusResponseInterface
     */
    public function setShortCode($shortCode);

    /**
     * Get the StatusResponse mobileOperatorName
     * @return string
     */
    public function getMobileOperatorName();

    /**
     * Set the StatusResponse mobileOperatorName
     * @param string $mobileOperatorName
     * @return SmsStatusResponseInterface
     */
    public function setMobileOperatorName($mobileOperatorName);
}
