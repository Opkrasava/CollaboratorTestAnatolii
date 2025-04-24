<?php
namespace app\processors;

use app\interfaces\NumberAggregatorInterface;

class NumberSumProcessor
{
    public function __construct(
        private readonly NumberAggregatorInterface $aggregator
    ) {}

    public function compute(array $numbers): int
    {
        return $this->aggregator->aggregate($numbers);
    }
}