<?php

/**
 * @link      https://github.com/zetta-code/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 * @license   https://github.com/zetta-code/zenvia/blob/master/LICENSE.d
 */

declare(strict_types=1);

namespace Zetta\Zenvia\Contract;

use Laminas\Stdlib\ArraySerializableInterface;

interface PartInterface extends ArraySerializableInterface
{
    /**
     * Get the Part id
     * @return string
     */
    public function getId(): string;

    /**
     * Set the Part id
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Get the Part order
     * @return int
     */
    public function getOrder(): int;

    /**
     * Set the Part order
     * @param int $order
     * @return self
     */
    public function setOrder(int $order): self;
}
