<?php

declare(strict_types=1);

namespace DevboardLib\Generix\Command;

interface CommandBus
{
    public function handle(Command $command): ?CommandResponse;

    public function queue(QueueableCommand $command): ?CommandResponse;
}
