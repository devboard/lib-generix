<?php

declare(strict_types=1);

namespace DevboardLib\Generix\Command;

use DevboardLib\Generix\Serializable;

interface QueueableCommand extends Command, Serializable
{
    public function getQueueName(): string;

    public function getQueuePriority(): int;
}
