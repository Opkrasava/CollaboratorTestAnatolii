<?php
namespace app\tests\unit;

use PHPUnit\Framework\TestCase;
use app\processors\NumberEvenFilterProcessor;
use app\services\NumberEvenFilterService;

class NumberEvenFilterProcessorTest extends TestCase
{
    public function testFilterEvenNumbers()
    {
        $processor = new NumberEvenFilterProcessor(new NumberEvenFilterService());
        $result = $processor->compute([1, 2, 3, 4]);
        $this->assertEquals([2, 4], array_values($result));
    }
}
