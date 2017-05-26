<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Constant\DetailCode;
use Zetta\Zenvia\Constant\ResponseParam;
use Zetta\Zenvia\Constant\StatusCode;

class SmsResponse implements SmsResponseInterface
{
    /**
     * Name
     *
     * @var ResponseParam
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
     * SmsResponse constructor.
     * @param StatusCode|string $statusCode
     * @param string $statusDescription
     * @param DetailCode|string $detailCode
     * @param string $detailDescription
     */
    public function __construct($statusCode, $statusDescription, $detailCode, $detailDescription)
    {
        $this->setStatusCode($statusCode);
        $this->statusDescription = $statusDescription;
        $this->setDetailCode($detailCode);
        $this->detailDescription = $detailDescription;
    }

    /**
     * Get the SmsResponse name
     * @return ResponseParam
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the SmsResponse name
     * @param ResponseParam|string $name
     * @return SmsResponse
     */
    public function setName($name)
    {
        if (!$name instanceof ResponseParam) {
            $name = new ResponseParam($name);
        }
        $this->name = $name;
        return $this;
    }

    /**
     * Get the SmsResponse statusCode
     * @return StatusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the SmsResponse statusCode
     * @param StatusCode|string $statusCode
     * @return SmsResponse
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
     * Get the SmsResponse statusDescription
     * @return string
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * Set the SmsResponse statusDescription
     * @param string $statusDescription
     * @return SmsResponse
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    /**
     * Get the SmsResponse detailCode
     * @return DetailCode
     */
    public function getDetailCode()
    {
        return $this->detailCode;
    }

    /**
     * Set the SmsResponse detailCode
     * @param DetailCode|string $detailCode
     * @return SmsResponse
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
     * Get the SmsResponse detailDescription
     * @return string
     */
    public function getDetailDescription()
    {
        return $this->detailDescription;
    }

    /**
     * Set the SmsResponse detailDescription
     * @param string $detailDescription
     * @return SmsResponse
     */
    public function setDetailDescription($detailDescription)
    {
        $this->detailDescription = $detailDescription;
        return $this;
    }
}
