<?php
namespace app\modules\api\controllers;

use app\processors\NumberEvenFilterProcessor;
use app\processors\NumberSumProcessor;
use Yii;
use app\dto\SumRequestDto;

class SumController extends BaseController
{

    public function actionIndex(): array
    {
        $data = $this->getJsonBody();
        $dto = new SumRequestDto();
        $dto->load($data, '');

        if (!$dto->validate()) {
            return ['errors' => $dto->getErrors()];
        }

        $numberSumProcessor = Yii::createObject(NumberSumProcessor::class);
        $result = $numberSumProcessor->compute($dto->getNumbers());

        return ['sum' => $result];
    }

    public function actionEven(): array
    {
        $data = $this->getJsonBody();
        $dto = new SumRequestDto();
        $dto->load($data, '');

        if (!$dto->validate()) {
            return ['errors' => $dto->getErrors()];
        }

        $numberEvenFilterProcessor = Yii::createObject(NumberEvenFilterProcessor::class);
        $numbersFiltered = $numberEvenFilterProcessor->compute($dto->getNumbers());

        $numberSumProcessor = Yii::createObject(NumberSumProcessor::class);
        $result = $numberSumProcessor->compute($numbersFiltered);

        return ['sum' => $result];
    }
}
