<?php
namespace app\tests\unit;

use PHPUnit\Framework\TestCase;
use app\processors\NumberSumProcessor;
use app\services\NumberSumService;

class NumberSumProcessorTest extends TestCase
{
    public function testSumNumbers()
    {
        $processor = new NumberSumProcessor(new NumberSumService());
        $result = $processor->compute([2, 4, 6]);
        $this->assertEquals(12, $result);
    }
}
