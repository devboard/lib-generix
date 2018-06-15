<?php

declare(strict_types=1);

namespace DevboardLib\Generix\Command;

interface QueueableCommand extends Command
{
    public function serialize(): array;

    public static function deserialize(array $data);

    public function getQueueName(): string;

    public function getQueuePriority(): int;
}
