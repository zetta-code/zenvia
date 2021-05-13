<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

use Zetta\Zenvia\Enum\DetailCodeEnum;
use Zetta\Zenvia\Enum\ResponseParamEnum;
use Zetta\Zenvia\Enum\StatusCodeEnum;

interface SmsResponseInterface
{
    /**
     * Get the SmsResponse name
     *
     * @return ResponseParamEnum
     */
    public function getName(): ResponseParamEnum;

    /**
     * Set the SmsResponse name
     *
     * @param ResponseParamEnum|string $name
     *
     * @return self
     */
    public function setName($name): self;

    /**
     * Get the SmsResponse statusCode
     *
     * @return StatusCodeEnum
     */
    public function getStatusCode(): StatusCodeEnum;

    /**
     * Set the SmsResponse statusCode
     *
     * @param StatusCodeEnum|string $statusCode
     *
     * @return self
     */
    public function setStatusCode($statusCode): self;

    /**
     * Get the SmsResponse statusDescription
     *
     * @return string
     */
    public function getStatusDescription(): string;

    /**
     * Set the SmsResponse statusDescription
     * @param string $statusDescription
     * @return self
     */
    public function setStatusDescription(string $statusDescription): self;

    /**
     * Get the SmsResponse detailCode
     *
     * @return DetailCodeEnum
     */
    public function getDetailCode(): DetailCodeEnum;

    /**
     * Set the SmsResponse detailCode
     *
     * @param DetailCodeEnum|string $detailCode
     *
     * @return self
     */
    public function setDetailCode($detailCode): self;

    /**
     * Get the SmsResponse detailDescription
     *
     * @return string
     */
    public function getDetailDescription(): string;

    /**
     * Set the SmsResponse detailDescription
     *
     * @param string $detailDescription
     *
     * @return self
     */
    public function setDetailDescription(string $detailDescription): self;
}
