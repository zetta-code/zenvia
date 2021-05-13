<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Http;

use DateTime;
use Zetta\Zenvia\Contract\SmsStatusResponseInterface;
use Zetta\Zenvia\Enum\DetailCodeEnum;
use Zetta\Zenvia\Enum\StatusCodeEnum;

class SmsStatusResponse extends SmsResponse implements SmsStatusResponseInterface
{
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
    protected $mobileOperatorName = '';

    /**
     * StatusResponse constructor.
     * @param StatusCodeEnum|string $statusCode
     * @param string $statusDescription
     * @param DetailCodeEnum|string $detailCode
     * @param string $detailDescription
     * @param string $id
     * @param DateTime|string|null $received
     * @param string $shortCode
     * @param string $mobileOperatorName
     */
    public function __construct(
        $statusCode,
        string $statusDescription,
        $detailCode,
        string $detailDescription,
        string $id = '',
        $received = null,
        string $shortCode = '',
        string $mobileOperatorName = ''
    ) {
        parent::__construct($statusCode, $statusDescription, $detailCode, $detailDescription);

        $this->id = $id;
        $this->setReceived($received);
        $this->shortCode = $shortCode;
        $this->mobileOperatorName = $mobileOperatorName;
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

    public function setShortCode($shortCode): self
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
}
