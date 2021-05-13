<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Model;

use Zetta\Zenvia\Contract\PartInterface;

class Part implements PartInterface
{
    /**
     * Id
     *
     * @var string
     */
    protected $id;

    /**
     * Order
     *
     * @var int
     */
    protected $order;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function exchangeArray(array $array)
    {
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
        if (isset($array['order'])) {
            $this->order = $array['order'];
        }
    }

    public function getArrayCopy()
    {
        $array = [];

        if ($this->id !== null) {
            $array['id'] = $this->id;
        }
        if ($this->order !== null) {
            $array['order'] = $this->order;
        }

        return $array;
    }
}
