<?php

namespace Appwrite\Network\Validator;

use Utopia\Validator;

/**
 * Timestamp
 *
 * Validate that an variable is a valid unix timestamp
 *
 * @package Utopia\Validator
 */
class Timestamp extends Validator
{
    /**
     * Get Description
     *
     * Returns validator description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return 'Value must be a valid unix timestamp between '  . $this->min . ' and ' . $this->max;
    }

     /**
     * @param int|float $min
     * @param int|float $max
     */
    public function __construct(int $min = 0, int $max = 2147483647)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Is valid
     *
     * Validation will pass when $value is valid unix timestamp.
     * 
     * ref: https://stackoverflow.com/a/4684066/797620
     *
     * @param  mixed $value
     * @return bool
     */
    public function isValid($value): bool
    {
        if (!\filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => $this->min, 'max_range' => $this->max]])) {
            return false;
        }

        return true;
    }

    /**
     * Is array
     *
     * Function will return true if object is array.
     *
     * @return bool
     */
    public function isArray(): bool
    {
        return false;
    }

    /**
     * Get Type
     *
     * Returns validator type.
     *
     * @return string
     */
    public function getType(): string
    {
        return self::TYPE_INTEGER;
    }
}
