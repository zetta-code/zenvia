<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Constant\DetailCode;
use Zetta\Zenvia\Constant\ResponseParam;
use Zetta\Zenvia\Constant\StatusCode;

interface SmsResponseInterface
{
    /**
     * Get the SmsResponse name
     * @return ResponseParam
     */
    public function getName();

    /**
     * Set the SmsResponse name
     * @param ResponseParam|string $name
     * @return SmsResponseInterface
     */
    public function setName($name);

    /**
     * Get the SmsResponse statusCode
     * @return StatusCode
     */
    public function getStatusCode();

    /**
     * Set the SmsResponse statusCode
     * @param StatusCode|string $statusCode
     * @return SmsResponseInterface
     */
    public function setStatusCode($statusCode);

    /**
     * Get the SmsResponse statusDescription
     * @return string
     */
    public function getStatusDescription();

    /**
     * Set the SmsResponse statusDescription
     * @param string $statusDescription
     * @return SmsResponseInterface
     */
    public function setStatusDescription($statusDescription);

    /**
     * Get the SmsResponse detailCode
     * @return DetailCode
     */
    public function getDetailCode();

    /**
     * Set the SmsResponse detailCode
     * @param DetailCode|string $detailCode
     * @return SmsResponseInterface
     */
    public function setDetailCode($detailCode);

    /**
     * Get the SmsResponse detailDescription
     * @return string
     */
    public function getDetailDescription();

    /**
     * Set the SmsResponse detailDescription
     * @param string $detailDescription
     * @return SmsResponseInterface
     */
    public function setDetailDescription($detailDescription);
}
