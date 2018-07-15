<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

/**
 * @see \spec\DevboardLib\Generix\EmailAddressSpec
 * @see \Tests\DevboardLib\Generix\EmailAddressTest
 */
class EmailAddress
{
    /** @var string */
    private $value;

    /** @var bool */
    private $valid = true;

    public function __construct(string $value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->valid = false;
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(self $address): bool
    {
        return strtolower($this->getValue()) === strtolower($address->getValue());
    }

    public function serialize(): string
    {
        return $this->value;
    }

    public static function deserialize(string $value): self
    {
        return new self($value);
    }
}
