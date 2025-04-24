<?php

class SumCest
{
    public function testEvenSum(FunctionalTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/api/sum/even', [
            'numbers' => [1, 2, 3, 4, 5, 6],
        ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['sum' => 12]);
    }
}
