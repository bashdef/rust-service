<?php

namespace app\models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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

    /**
     * @throws GuzzleException
     */
    public function getSteamUserStats($steamId)
    {
        $apiKey = 'E41A546A4AD2F8BA23B8805F6F2919FD';
        $url = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=252490&key=$apiKey&steamid=$steamId";

        try {
            $client = new Client();
            $response = $client->request('GET', $url);

            $data = json_decode($response->getBody(), true);

            if(isset($data['playerstats']['stats'])) {
                return $data['playerstats']['stats'];
            } else {
                return null;
            }
        } catch (\Exception $e) {
            Yii::error('Error fetching Steam data: ' . $e->getMessage());
            return null;
        }
    }

    public function saveToDatabasePlayerStats($steamId, $apiData)
    {
        // Сохранение данных в базу данных
        $playerStats = new PlayerStats();
        $playerStats->steam_id = $steamId;
        $playerStats->deaths = $this->findValueByName($apiData, 'deaths') ?? 0;
        $playerStats->bullet_fired = $this->findValueByName($apiData, 'bullet_fired') ?? 0;
        $playerStats->arrow_fired = $this->findValueByName($apiData, 'arrow_fired') ?? 0;
        $playerStats->item_drop = $this->findValueByName($apiData, 'item_drop') ?? 0;
        $playerStats->blueprint_studied = $this->findValueByName($apiData, 'blueprint_studied') ?? 0;
        $playerStats->death_suicide = $this->findValueByName($apiData, 'death_suicide') ?? 0;
        $playerStats->death_fall = $this->findValueByName($apiData, 'death_fall') ?? 0;
        $playerStats->kill_player = $this->findValueByName($apiData, 'kill_player') ?? 0;
        $playerStats->bullet_hit_player = $this->findValueByName($apiData, 'bullet_hit_player') ?? 0;
        $playerStats->arrow_hit_entity = $this->findValueByName($apiData, 'arrow_hit_entity') ?? 0;
        $playerStats->harvested_stones = $this->findValueByName($apiData, 'harvested_stones') ?? 0;
        $playerStats->harvested_cloth = $this->findValueByName($apiData, 'harvested_cloth') ?? 0;
        $playerStats->harvested_wood = $this->findValueByName($apiData, 'harvested_wood') ?? 0;
        $playerStats->kill_bear = $this->findValueByName($apiData, 'kill_bear') ?? 0;
        $playerStats->kill_boar = $this->findValueByName($apiData, 'kill_boar') ?? 0;
        $playerStats->kill_stag = $this->findValueByName($apiData, 'kill_stag') ?? 0;
        $playerStats->kill_chicken = $this->findValueByName($apiData, 'kill_chicken') ?? 0;
        $playerStats->kill_wolf = $this->findValueByName($apiData, 'kill_wolf') ?? 0;
        $playerStats->headshot = $this->findValueByName($apiData, 'headshot') ?? 0;
        $playerStats->arrow_hit_player = $this->findValueByName($apiData, 'arrow_hit_player') ?? 0;
        $playerStats->harvested_leather = $this->findValueByName($apiData, 'harvested_leather') ?? 0;
        $playerStats->acquired_low_grade_fuel = $this->findValueByName($apiData, 'acquired_lowgradefuel') ?? 0;
        $playerStats->acquired_metal_ore = $this->findValueByName($apiData, 'acquired_metal.ore') ?? 0;
        $playerStats->acquired_scrap = $this->findValueByName($apiData, 'acquired_scrap') ?? 0;
        $playerStats->destroyed_barrels = $this->findValueByName($apiData, 'destroyed_barrels') ?? 0;

        $playerStats->save();
    }

    public function getSavedDataPlayerStats($steamId)
    {
        // Получение сохраненных данных из базы данных
        return PlayerStats::findOne(['steam_id' => $steamId]);
    }

    protected function findValueByName($array, $name)
    {
        foreach ($array as $item) {
            if (isset($item['name']) && $item['name'] === $name) {
                return $item['value'];
            }
        }
        return null;
    }
}
