<?php
/**
 * @link      http://github.com/zetta-repo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Model;

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

    /**
     * Get the Part id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the Part id
     * @param string $id
     * @return PartInterface
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the Part order
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the Part order
     * @param int $order
     * @return PartInterface
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }
    
    /**
     * @inheritdoc
     */
    public function exchangeArray(array $array)
    {
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
        if (isset($array['order'])) {
            $this->order = $array['order'];
        }
    }

    /**
     * * @inheritdoc
     */
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
