<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

interface SmsReceivedResponseInterface extends SmsResponseInterface
{
    /**
     * Get the ReceivedResponse receiveds
     *
     * @return array Lista com as mensagens recebidas.
     *
     */
    public function getReceiveds(): array;

    /**
     * Set the ReceivedResponse receiveds
     *
     * @param array $receiveds
     *
     * @return self
     */
    public function setReceiveds(array $receiveds = []): self;

    /**
     * Has the ReceivedResponse receiveds
     *
     * @return bool
     */
    public function hasReceiveds(): bool;

    /**
     * Add received to the ReceivedResponse receiveds
     *
     * @param SmsReceivedInterface $received
     *
     * @return self
     */
    public function addReceived(SmsReceivedInterface $received): self;
}
