<?php
namespace app\services;

use app\interfaces\NumberAggregatorInterface;

class NumberSumService implements NumberAggregatorInterface
{
    public function aggregate(array $numbers): int
    {
        return array_sum($numbers);
    }
}