<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "player".
 *
 * @property int $id
 * @property string $steam_id
 * @property string $persona_name
 * @property string $avatar
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['steam_id', 'persona_name', 'avatar'], 'required'],
            [['steam_id', 'persona_name', 'avatar'], 'string', 'max' => 255],
            [['steam_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'steam_id' => 'Steam ID',
            'persona_name' => 'Persona Name',
            'avatar' => 'Avatar',
        ];
    }
}
