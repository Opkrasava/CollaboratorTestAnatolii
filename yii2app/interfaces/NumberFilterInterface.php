<?php

namespace app\interfaces;

interface NumberFilterInterface
{
    public function filter(array $numbers): array;
}
