<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Contract\SmsResponseInterface;
use Zetta\Zenvia\Enum\DetailCodeEnum;
use Zetta\Zenvia\Enum\ResponseParamEnum;
use Zetta\Zenvia\Enum\StatusCodeEnum;

class SmsResponse implements SmsResponseInterface
{
    /**
     * Name
     *
     * @var ResponseParamEnum
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
     * SmsResponse constructor.
     * @param StatusCodeEnum|string $statusCode
     * @param string $statusDescription
     * @param DetailCodeEnum|string $detailCode
     * @param string $detailDescription
     */
    public function __construct($statusCode, string $statusDescription, $detailCode, string $detailDescription)
    {
        $this->setStatusCode($statusCode);
        $this->statusDescription = $statusDescription;
        $this->setDetailCode($detailCode);
        $this->detailDescription = $detailDescription;
    }

    public function getName(): ResponseParamEnum
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = ! $name instanceof ResponseParamEnum && $name !== null
            ? ResponseParamEnum::from($name)
            : $name;
        return $this;
    }

    public function getStatusCode(): StatusCodeEnum
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode): self
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

    public function setStatusDescription(string $statusDescription): self
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
}
