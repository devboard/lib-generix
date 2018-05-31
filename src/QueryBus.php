<?php

declare(strict_types=1);

namespace DevboardLib\Generix;

interface QueryBus
{
    public function dispatch(QueryRequest $query): QueryResult;
}
