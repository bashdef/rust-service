<?php

namespace app\models;

use yii\base\Model;

class SteamIdForm extends Model
{
    public $steamId;

    public function rules()
    {
        return [
            ['steamId', 'required'],
            ['steamId', 'string', 'max' => 255],
        ];
    }
}