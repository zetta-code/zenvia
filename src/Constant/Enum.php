<?php
/**
 * @link      http://github.com/zettaconstrepo/zenvia for the canonical source repository
 * @copyright Copyright (c) 2017 Zetta Code
 */

namespace Zetta\Zenvia\Constant;

class Enum
{
    /**
     * Default value
     */
    const __default = null;

    /**
     * Value
     * @var mixed
     */
    protected $__value = null;

    /**
     * @var array
     */
    protected $__values = [];

    /**
     * Enum constructor.
     * @param mixed $initialValue
     * @param bool $strict
     */
    public function __construct($initialValue = null, $strict = true)
    {
        $class = \get_called_class();
        $reflect = new \ReflectionClass($class);
        $this->__values = (array) $reflect->getConstants();
        if($strict && !\in_array($initialValue, $this->__values)) {
            throw new \UnexpectedValueException('Value ' . $initialValue . ' not a const in enum ' . $class);
        }

        $this->__value = \is_null($initialValue) ? self::__default : $initialValue;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return (string)$this->__value;
    }

    /**
     * @param bool $includeDefault
     * @return array
     */
    public function getConstList($includeDefault = true)
    {
        if($includeDefault) {
            return $this->__values;
        } else {
            $values = $this->__values;
            unset($values['__default']);
            return $values;
        }
    }
}