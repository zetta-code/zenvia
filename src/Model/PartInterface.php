<?php
/**
 * Created by PhpStorm.
 * User: thiag
 * Date: 25/05/2017
 * Time: 16:41
 */

namespace Zetta\Zenvia\Model;

use Zend\Stdlib\ArraySerializableInterface;

interface PartInterface extends ArraySerializableInterface
{
    /**
     * Get the Part id
     * @return string
     */
    public function getId();

    /**
     * Set the Part id
     * @param string $id
     * @return PartInterface
     */
    public function setId($id);

    /**
     * Get the Part order
     * @return int
     */
    public function getOrder();

    /**
     * Set the Part order
     * @param int $order
     * @return PartInterface
     */
    public function setOrder($order);
}