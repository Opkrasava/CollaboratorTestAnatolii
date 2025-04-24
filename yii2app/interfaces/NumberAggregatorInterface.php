<?php

namespace app\interfaces;

interface NumberAggregatorInterface
{
    public function aggregate(array $numbers): int;
}
