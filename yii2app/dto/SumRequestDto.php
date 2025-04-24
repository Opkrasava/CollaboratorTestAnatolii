<?php
namespace app\dto;

use yii\base\Model;

class SumRequestDto extends Model
{
    public array $numbers = [];

    public function rules(): array
    {
        return [
            ['numbers', 'required'],
            ['numbers', 'each', 'rule' => ['integer']],
        ];
    }

    public function getNumbers(): array
    {
        return $this->numbers;
    }
}