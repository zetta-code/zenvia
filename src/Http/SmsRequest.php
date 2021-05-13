<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Http;

use DateTime;
use Zetta\Zenvia\Contract\SmsReceivedInterface;
use Zetta\Zenvia\Contract\SmsRequestInterface;
use Zetta\Zenvia\Enum\DetailCodeEnum;
use Zetta\Zenvia\Enum\RequestParamEnum;
use Zetta\Zenvia\Enum\StatusCodeEnum;
use Laminas\Stdlib\ArraySerializableInterface;

class SmsRequest implements SmsRequestInterface, ArraySerializableInterface
{
    /**
     * Name
     *
     * @var RequestParamEnum
     */
    protected $name;

    /**
     * Status code
     *
     * @var StatusCodeEnum
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
     * @var DetailCodeEnum
     */
    protected $detailCode;

    /**
     * Detail description
     *
     * @var string
     */
    protected $detailDescription;

    /**
     * Id
     *
     * @var string
     */
    protected $id;

    /**
     * Received
     *
     * @var DateTime
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
     * Sms Received
     *
     * @var SmsReceivedInterface
     */
    protected $smsReceived;

    /**
     * SmsRequest constructor.
     * @param RequestParamEnum|string $name
     */
    public function __construct($name = null)
    {
        if ($name !== null) {
            $this->setName($name);
        }
    }

    public function getName(): RequestParamEnum
    {
        return $this->name;
    }

    /**
     * Set the SmsRequest name
     * @param RequestParamEnum|string $name
     * @return SmsRequest
     */
    public function setName($name)
    {
        $this->name = ! $name instanceof RequestParamEnum && $name !== null
            ? RequestParamEnum::from($name)
            : $name;
        return $this;
    }

    public function getStatusCode(): StatusCodeEnum
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = ! $statusCode instanceof StatusCodeEnum && $statusCode !== null
            ? StatusCodeEnum::from($statusCode)
            : $statusCode;
        return $this;
    }

    public function getStatusDescription(): string
    {
        return $this->statusDescription;
    }

    public function setStatusDescription($statusDescription): self
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }

    public function getDetailCode(): DetailCodeEnum
    {
        return $this->detailCode;
    }

    public function setDetailCode($detailCode): self
    {
        $this->detailCode = ! $detailCode instanceof DetailCodeEnum && $detailCode !== null
            ? DetailCodeEnum::from($detailCode)
            : $detailCode;
        return $this;
    }

    public function getDetailDescription(): string
    {
        return $this->detailDescription;
    }

    public function setDetailDescription(string $detailDescription): self
    {
        $this->detailDescription = $detailDescription;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getReceived()
    {
        return $this->received;
    }

    public function setReceived($received): self
    {
        if ($received !== null && ! $received instanceof DateTime) {
            $received = DateTime::createFromFormat('Y-m-d\TH:i:s', $received);
        }
        $this->received = $received;
        return $this;
    }

    public function getShortCode(): string
    {
        return $this->shortCode;
    }

    public function setShortCode(string $shortCode): self
    {
        $this->shortCode = $shortCode;
        return $this;
    }

    public function getMobileOperatorName(): string
    {
        return $this->mobileOperatorName;
    }

    public function setMobileOperatorName(string $mobileOperatorName): self
    {
        $this->mobileOperatorName = $mobileOperatorName;
        return $this;
    }

    public function getSmsReceived(): ?SmsReceivedInterface
    {
        return $this->smsReceived;
    }

    public function setSmsReceived(?SmsReceivedInterface $smsReceived): self
    {
        $this->smsReceived = $smsReceived;
        return $this;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        if (isset($array['statusCode'])) {
            $this->statusCode = $array['statusCode'];
        }
        if (isset($array['statusDescription'])) {
            $this->statusDescription = $array['statusDescription'];
        }
        if (isset($array['detailCode'])) {
            $this->detailCode = $array['detailCode'];
        }
        if (isset($array['detailDescription'])) {
            $this->detailDescription = $array['detailDescription'];
        }
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
        if (isset($array['received'])) {
            $this->setReceived($array['received']);
        }
        if (isset($array['shortCode'])) {
            $this->shortCode = $array['shortCode'];
        }
        if (isset($array['mobileOperatorName'])) {
            $this->mobileOperatorName = $array['mobileOperatorName'];
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        $array = [];

        if ($this->statusCode !== null) {
            $array['statusCode'] = $this->statusCode;
        }
        if ($this->statusDescription !== null) {
            $array['statusDescription'] = $this->statusDescription;
        }
        if ($this->detailCode !== null) {
            $array['detailCode'] = $this->detailCode;
        }
        if ($this->detailDescription !== null) {
            $array['detailDescription'] = $this->detailDescription;
        }
        if ($this->id !== null) {
            $array['id'] = $this->id;
        }
        if ($this->received !== null) {
            $array['received'] = $this->received->format('Y-m-d\TH:i:s');
            if ($this->received instanceof DateTime) {
                $array['received'] = $this->received->format('Y-m-d\TH:i:s');
            } else {
                $array['received'] = $this->received;
            }
        }
        if ($this->shortCode !== null) {
            $array['shortCode'] = $this->shortCode;
        }
        if ($this->mobileOperatorName !== null) {
            $array['mobileOperatorName'] = $this->mobileOperatorName;
        }

        return $array;
    }
}
