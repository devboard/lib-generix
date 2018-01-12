<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

use InvalidArgumentException;

/**
 * @see \spec\DevboardLib\Generix\EmailAddressSpec
 * @see \Tests\DevboardLib\Generix\EmailAddressTest
 */
class EmailAddress
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid email', $value));
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
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
