<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "player_stats".
 *
 * @property int $id
 * @property string $steam_id
 * @property int $deaths
 * @property int $bullet_fired
 * @property int $arrow_fired
 * @property int $item_drop
 * @property int $blueprint_studied
 * @property int $death_suicide
 * @property int $death_fall
 * @property int $kill_player
 * @property int $bullet_hit_player
 * @property int $arrow_hit_entity
 * @property int $harvested_stones
 * @property int $harvested_cloth
 * @property int $harvested_wood
 * @property int $kill_bear
 * @property int $kill_boar
 * @property int $kill_stag
 * @property int $kill_chicken
 * @property int $kill_wolf
 * @property int $headshot
 * @property int $arrow_hit_player
 * @property int $harvested_leather
 * @property int $acquired_low_grade_fuel
 * @property int $acquired_metal_ore
 * @property int $acquired_scrap
 * @property int $destroyed_barrels
 */
class PlayerStats extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'player_stats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['steam_id', 'deaths', 'bullet_fired', 'arrow_fired', 'item_drop', 'blueprint_studied', 'death_suicide', 'death_fall', 'kill_player', 'bullet_hit_player', 'arrow_hit_entity', 'harvested_stones', 'harvested_cloth', 'harvested_wood', 'kill_bear', 'kill_boar', 'kill_stag', 'kill_chicken', 'kill_wolf', 'headshot', 'arrow_hit_player', 'harvested_leather', 'acquired_low_grade_fuel', 'acquired_metal_ore', 'acquired_scrap', 'destroyed_barrels'], 'required'],
            [['deaths', 'bullet_fired', 'arrow_fired', 'item_drop', 'blueprint_studied', 'death_suicide', 'death_fall', 'kill_player', 'bullet_hit_player', 'arrow_hit_entity', 'harvested_stones', 'harvested_cloth', 'harvested_wood', 'kill_bear', 'kill_boar', 'kill_stag', 'kill_chicken', 'kill_wolf', 'headshot', 'arrow_hit_player', 'harvested_leather', 'acquired_low_grade_fuel', 'acquired_metal_ore', 'acquired_scrap', 'destroyed_barrels'], 'integer'],
            [['steam_id'], 'string', 'max' => 255],
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
            'deaths' => 'Deaths',
            'bullet_fired' => 'Bullet Fired',
            'arrow_fired' => 'Arrow Fired',
            'item_drop' => 'Item Drop',
            'blueprint_studied' => 'Blueprint Studied',
            'death_suicide' => 'Death Suicide',
            'death_fall' => 'Death Fall',
            'kill_player' => 'Kill Player',
            'bullet_hit_player' => 'Bullet Hit Player',
            'arrow_hit_entity' => 'Arrow Hit Entity',
            'harvested_stones' => 'Harvested Stones',
            'harvested_cloth' => 'Harvested Cloth',
            'harvested_wood' => 'Harvested Wood',
            'kill_bear' => 'Kill Bear',
            'kill_boar' => 'Kill Boar',
            'kill_stag' => 'Kill Stag',
            'kill_chicken' => 'Kill Chicken',
            'kill_wolf' => 'Kill Wolf',
            'headshot' => 'Headshot',
            'arrow_hit_player' => 'Arrow Hit Player',
            'harvested_leather' => 'Harvested Leather',
            'acquired_low_grade_fuel' => 'Acquired Low Grade Fuel',
            'acquired_metal_ore' => 'Acquired Metal Ore',
            'acquired_scrap' => 'Acquired Scrap',
            'destroyed_barrels' => 'Destroyed Barrels',
        ];
    }
}
