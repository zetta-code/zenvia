<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Model;

use DateTime;
use Zetta\Zenvia\Contract\SmsReceivedInterface;

class SmsReceived implements SmsReceivedInterface
{
    /**
     * Id
     *
     * @var string
     */
    protected $id = '';

    /**
     * Received
     *
     * @var DateTime
     */
    protected $received;

    /**
     * Mobile
     *
     * @var string
     */
    protected $mobile;

    /**
     * Body
     *
     * @var string
     */
    protected $body;

    /**
     * Shortcode
     *
     * @var string
     */
    protected $shortCode;

    /**
     * Account
     *
     * @var string
     */
    protected $account;

    /**
     * MobileOperatorName
     *
     * @var string
     */
    protected $mobileOperatorName;

    /**
     * CorrelatedMessageSmsId
     *
     * @var string
     */
    protected $correlatedMessageSmsId;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the Received dateReceived
     * @return DateTime
     */
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

    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): self
    {
        $this->mobile = $mobile;
        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;
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

    public function getAccount(): string
    {
        return $this->account;
    }

    public function setAccount(string $account): self
    {
        $this->account = $account;
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

    public function getCorrelatedMessageSmsId(): string
    {
        return $this->correlatedMessageSmsId;
    }

    public function setCorrelatedMessageSmsId(string $correlatedMessageSmsId): self
    {
        $this->correlatedMessageSmsId = $correlatedMessageSmsId;
        return $this;
    }

    public function exchangeArray(array $array)
    {
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
        if (isset($array['mobile'])) {
            $this->mobile = $array['mobile'];
        }
        if (isset($array['shortCode'])) {
            $this->shortCode = $array['shortCode'];
        }
        if (isset($array['account'])) {
            $this->account = $array['account'];
        }
        if (isset($array['mobileOperatorName'])) {
            $this->mobileOperatorName = $array['mobileOperatorName'];
        }
        if (isset($array['body'])) {
            $this->body = $array['body'];
        }
        if (isset($array['received'])) {
            $this->setReceived($array['received']);
        }
        if (isset($array['correlatedMessageSmsId'])) {
            $this->correlatedMessageSmsId = $array['correlatedMessageSmsId'];
        } elseif (isset($array['mtId'])) {
            $this->correlatedMessageSmsId = $array['mtId'];
        }
    }

    public function getArrayCopy()
    {
        $array = [];

        if ($this->id !== null) {
            $array['id'] = $this->id;
        }
        if ($this->mobile !== null) {
            $array['mobile'] = $this->mobile;
        }
        if ($this->shortCode !== null) {
            $array['shortCode'] = $this->shortCode;
        }
        if ($this->account !== null) {
            $array['account'] = $this->account;
        }
        if ($this->mobileOperatorName !== null) {
            $array['mobileOperatorName'] = $this->mobileOperatorName;
        }
        if ($this->body !== null) {
            $array['body'] = $this->body;
        }
        if ($this->received !== null) {
            $array['received'] = $this->received->format('Y-m-d\TH:i:s');
            if ($this->received instanceof DateTime) {
                $array['received'] = $this->received->format('Y-m-d\TH:i:s');
            } else {
                $array['received'] = $this->received;
            }
        }
        if ($this->correlatedMessageSmsId !== null) {
            $array['correlatedMessageSmsId'] = $this->correlatedMessageSmsId;
        }

        return $array;
    }
}
