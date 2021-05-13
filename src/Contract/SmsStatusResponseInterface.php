<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

use DateTime;

interface SmsStatusResponseInterface extends SmsResponseInterface
{
    /**
     * Get the SmsStatusResponse id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Set the SmsStatusResponse id
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Get the SmsStatusResponse received
     *
     * @return DateTime|string
     */
    public function getReceived();

    /**
     * Set the SmsStatusResponse received
     *
     * @param DateTime|string $received
     *
     * @return self
     */
    public function setReceived($received): self;

    /**
     * Get the SmsStatusResponse shortCode
     *
     * @return string
     */
    public function getShortCode(): string;

    /**
     * Set the SmsStatusResponse shortCode
     *
     * @param string $shortCode
     *
     * @return self
     */
    public function setShortCode(string $shortCode): self;

    /**
     * Get the SmsStatusResponse mobileOperatorName
     *
     * @return string
     */
    public function getMobileOperatorName(): string;

    /**
     * Set the SmsStatusResponse mobileOperatorName
     *
     * @param string $mobileOperatorName
     *
     * @return self
     */
    public function setMobileOperatorName(string $mobileOperatorName): self;
}
