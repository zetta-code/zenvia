<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Model\SmsReceivedInterface;

interface SmsReceivedResponseInterface
{
    /**
     * Get the ReceivedResponse receiveds
     * @return array Lista com as mensagens recebidas.
     */
    public function getReceiveds();

    /**
     * Set the ReceivedResponse receiveds
     * @param array $receiveds
     * @return SmsReceivedResponseInterface
     */
    public function setReceiveds($receiveds);

    /**
     * Has the ReceivedResponse receiveds
     * @return bool
     */
    public function hasReceiveds();

    /**
     * Add received to the ReceivedResponse receiveds
     * @param SmsReceivedInterface $received
     */
    public function addReceived($received);
}
