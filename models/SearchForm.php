<?php

namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $personaName;

    public function rules()
    {
        return [
            ['personaName', 'string', 'max' => 255],
        ];
    }
}