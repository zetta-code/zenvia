<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

use DateTime;
use Zetta\Zenvia\Enum\DetailCodeEnum;
use Zetta\Zenvia\Enum\RequestParamEnum;
use Zetta\Zenvia\Enum\StatusCodeEnum;

interface SmsRequestInterface
{
    /**
     * Get the SmsRequest name
     *
     * @return RequestParamEnum
     */
    public function getName(): RequestParamEnum;

    /**
     * Set the SmsRequest name
     * @param RequestParamEnum|string $name
     * @return SmsRequestInterface
     */
    public function setName($name);

    /**
     * Get the SmsRequest statusCode
     *
     * @return StatusCodeEnum
     */
    public function getStatusCode();

    /**
     * Set the SmsRequest statusCode
     *
     * @param StatusCodeEnum|string $statusCode
     *
     * @return SmsRequestInterface
     */
    public function setStatusCode($statusCode);

    /**
     * Get the SmsRequest statusDescription
     *
     * @return string
     */
    public function getStatusDescription(): string;

    /**
     * Set the SmsRequest statusDescription
     *
     * @param string $statusDescription
     *
     * @return self
     */
    public function setStatusDescription($statusDescription): self;

    /**
     * Get the SmsRequest detailCode
     *
     * @return DetailCodeEnum
     */
    public function getDetailCode(): DetailCodeEnum;

    /**
     * Set the SmsRequest detailCode
     *
     * @param DetailCodeEnum|string $detailCode
     *
     * @return SmsRequestInterface
     */
    public function setDetailCode($detailCode);

    /**
     * Get the SmsRequest detailDescription
     *
     * @return string
     */
    public function getDetailDescription(): string;

    /**
     * Set the SmsRequest detailDescription
     *
     * @param string $detailDescription
     *
     * @return self
     */
    public function setDetailDescription(string $detailDescription): self;

    /**
     * Get the SmsRequest id
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Set the SmsRequest id
     *
     * @param string $id
     *
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Get the SmsRequest received
     *
     * @return DateTime|string
     */
    public function getReceived();

    /**
     * Set the SmsRequest received
     *
     * @param DateTime|string $received
     *
     * @return self
     */
    public function setReceived($received): self;

    /**
     * Get the SmsRequest shortCode
     *
     * @return string
     */
    public function getShortCode(): string;

    /**
     * Set the SmsRequest shortCode
     *
     * @param string $shortCode
     *
     * @return self
     */
    public function setShortCode(string $shortCode): self;

    /**
     * Get the SmsRequest mobileOperatorName
     *
     * @return string
     */
    public function getMobileOperatorName(): string;

    /**
     * Set the SmsRequest mobileOperatorName
     *
     * @param string $mobileOperatorName
     *
     * @return self
     */
    public function setMobileOperatorName(string $mobileOperatorName): self;

    /**
     * Get the SmsRequest smsReceived
     *
     * @return SmsReceivedInterface|null
     */
    public function getSmsReceived(): ?SmsReceivedInterface;

    /**
     * Set the SmsRequest smsReceived
     *
     * @param SmsReceivedInterface|null $smsReceived
     *
     * @return self
     */
    public function setSmsReceived(?SmsReceivedInterface $smsReceived): self;
}
