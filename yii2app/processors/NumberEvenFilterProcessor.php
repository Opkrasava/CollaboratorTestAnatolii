<?php
namespace app\processors;

use app\interfaces\NumberFilterInterface;

class NumberEvenFilterProcessor
{
    public function __construct(
        private readonly NumberFilterInterface $filter
    ) {}

    public function compute(array $numbers): array
    {
        return $this->filter->filter($numbers);
    }
}