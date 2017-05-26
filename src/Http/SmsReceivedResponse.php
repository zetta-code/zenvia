<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Http;

use Zetta\Zenvia\Model\SmsReceivedInterface;

class SmsReceivedResponse extends SmsResponse implements SmsReceivedResponseInterface
{
    /**
     * Receiveds
     *
     * @var SmsReceivedInterface[]
     */
    protected $receiveds = [];

    /**
     * Get the ReceivedResponse receiveds
     * @return array Lista com as mensagens recebidas.
     */
    public function getReceiveds()
    {
        return $this->receiveds;
    }

    /**
     * Set the ReceivedResponse receiveds
     * @param array $receiveds
     * @return SmsReceivedResponseInterface
     */
    public function setReceiveds($receiveds)
    {
        $this->receiveds = $receiveds;
        return $this;
    }

    /**
     * Has the ReceivedResponse receiveds
     * @return bool
     */
    public function hasReceiveds()
    {
        return count($this->receiveds) > 0;
    }

    /**
     * Add received to the ReceivedResponse receiveds
     * @param SmsReceivedInterface $received
     */
    public function addReceived($received)
    {
        $this->receiveds[] = $received;
    }
}
