<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

use DateTime;
use Laminas\Stdlib\ArraySerializableInterface;

interface SmsReceivedInterface extends ArraySerializableInterface
{
    /**
     * Get the Received id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Set the Received id
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Get the Received received
     *
     * @return DateTime|string
     */
    public function getReceived();

    /**
     * Set the Received received
     *
     * @param DateTime|string $received
     *
     * @return self
     */
    public function setReceived($received): self;

    /**
     * Get the Received mobile
     *
     * @return string
     */
    public function getMobile(): string;

    /**
     * Set the Received mobile
     *
     * @param string $mobile
     *
     * @return self
     */
    public function setMobile(string $mobile): self;

    /**
     * Get the Received body
     *
     * @return string
     */
    public function getBody(): string;

    /**
     * Set the Received body
     *
     * @param string $body
     *
     * @return self
     */
    public function setBody(string $body): self;

    /**
     * Get the Received shortCode
     *
     * @return string
     */
    public function getShortCode(): string;

    /**
     * Set the Received shortCode
     *
     * @param string $shortCode
     *
     * @return self
     */
    public function setShortCode(string $shortCode): self;

    /**
     * Get the Received mobileOperatorName
     *
     * @return string
     */
    public function getMobileOperatorName(): string;

    /**
     * Set the Received mobileOperatorName
     *
     * @param string $mobileOperatorName
     *
     * @return self
     */
    public function setMobileOperatorName(string $mobileOperatorName): self;

    /**
     * Get the Received correlatedMessageSmsId
     *
     * @return string
     */
    public function getCorrelatedMessageSmsId(): string;

    /**
     * Set the Received correlatedMessageSmsId
     *
     * @param string $correlatedMessageSmsId
     *
     * @return self
     */
    public function setCorrelatedMessageSmsId(string $correlatedMessageSmsId): self;
}
