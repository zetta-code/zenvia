<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Contract\SmsReceivedInterface;
use Zetta\Zenvia\Contract\SmsReceivedResponseInterface;

class SmsReceivedResponse extends SmsResponse implements SmsReceivedResponseInterface
{
    /**
     * Receiveds
     *
     * @var SmsReceivedInterface[]
     */
    protected $receiveds = [];

    public function getReceiveds(): array
    {
        return $this->receiveds;
    }

    public function setReceiveds(array $receiveds = []): self
    {
        $this->receiveds = $receiveds;
        return $this;
    }

    public function hasReceiveds(): bool
    {
        return count($this->receiveds) > 0;
    }

    public function addReceived(SmsReceivedInterface $received): self
    {
        $this->receiveds[] = $received;
        return $this;
    }
}
