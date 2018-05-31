<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

interface QueryRequest
{
    public function serialize(): array;

    public static function deserialize(array $data);
}
