<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

use Ramsey\Uuid\Uuid;

/**
 * @see RequestIdSpec
 * @see RequestIdTest
 */
class RequestId
{
    /** @var string */
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function create(): self
    {
        return new self(Uuid::uuid4()->toString());
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function asString(): string
    {
        return $this->id;
    }

    /**
     * @deprecated Lets use `asString()`
     */
    public function __toString()
    {
        return $this->id;
    }

    public function serialize(): string
    {
        return $this->id;
    }

    public static function deserialize(string $id): self
    {
        return new self($id);
    }
}
