<?php

declare(strict_types=1);

/*
 * MichelinDevPetstore
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MichelinDevPetstoreLib\Models\Builders;

use Core\Utils\CoreHelper;
use MichelinDevPetstoreLib\Models\Customer;

/**
 * Builder for model Customer
 *
 * @see Customer
 */
class CustomerBuilder
{
    /**
     * @var Customer
     */
    private $instance;

    private function __construct(Customer $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new customer Builder object.
     */
    public static function init(): self
    {
        return new self(new Customer());
    }

    /**
     * Sets id field.
     */
    public function id(?int $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets username field.
     */
    public function username(?string $value): self
    {
        $this->instance->setUsername($value);
        return $this;
    }

    /**
     * Sets address field.
     */
    public function address(?array $value): self
    {
        $this->instance->setAddress($value);
        return $this;
    }

    /**
     * Initializes a new customer object.
     */
    public function build(): Customer
    {
        return CoreHelper::clone($this->instance);
    }
}
