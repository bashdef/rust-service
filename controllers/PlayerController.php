<?php

namespace app\controllers;

use app\models\Player;
use app\models\SteamIdForm;
use GuzzleHttp\Exception\GuzzleException;
use Yii;
use yii\helpers\Console;
use yii\web\Controller;
use GuzzleHttp\Client;
use app\models\PlayerStats;

class PlayerController extends Controller
{
    /**
     * @throws GuzzleException
     */
    public function actionIndex()
    {
        $model = new SteamIdForm();
        $apiData = null;
        $savedDataPlayer = null;
        $savedDataPlayerStats = null;

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            // Валидация данных
            if ($model->validate()) {
                $steamId = $model->steamId;
                $apiData = $this->getSteamUserData($steamId);
                $this->saveToDatabasePlayer($steamId, $apiData);
                // Получение сохраненных данных из базы данных
                $savedDataPlayer = $this->getSavedDataPlayer($steamId);
            }
        }
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            // Валидация данных
            if ($model->validate()) {
                $steamId = $model->steamId;
                $apiData = $this->getSteamUserStats($steamId);
                $this->saveToDatabasePlayerStats($steamId, $apiData);
                // Получение сохраненных данных из базы данных
                $savedDataPlayerStats = $this->getSavedDataPlayerStats($steamId);
            }
        }

        return $this->render('index', [
            'model' => $model,
            'apiData' => $apiData,
            'savedDataPlayer' => $savedDataPlayer,
            'savedDataPlayerStats' => $savedDataPlayerStats,
        ]);
    }

    /**
     * @throws GuzzleException
     */
    protected function getSteamUserData($steamId)
    {
        $apiKey = 'E41A546A4AD2F8BA23B8805F6F2919FD';
        $url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=$apiKey&steamids=$steamId";

        try {
            $client = new Client();
            $response = $client->request('GET', $url);

            $data = json_decode($response->getBody(), true);

            if (isset($data['response']['players'][0])) {
                return $data['response']['players'][0];
            } else {
                return null;
            }
        } catch (\Exception $e) {
            Yii::error("Error fetching Steam data: " . $e->getMessage());
            return null;
        }
    }

    /**
     * @throws GuzzleException
     */
    protected function getSteamUserStats($steamId)
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

    protected function saveToDatabasePlayer($steamId, $apiData)
    {
        // Сохранение данных в базу данных
        $player = new Player();
        $player->steam_id = $steamId;
        $player->persona_name = $apiData['personaname'];
        $player->avatar = $apiData['avatarfull'];
        $player->save();
    }

    protected function saveToDatabasePlayerStats($steamId, $apiData)
    {
        // Сохранение данных в базу данных
        $playerStats = new PlayerStats();
        $playerStats->steam_id = $steamId;
        $playerStats->deaths = $this->findValueByName($apiData, 'deaths');
        $playerStats->bullet_fired = $this->findValueByName($apiData, 'bullet_fired');
        $playerStats->arrow_fired = $this->findValueByName($apiData, 'arrow_fired');
        $playerStats->item_drop = $this->findValueByName($apiData, 'item_drop');
        $playerStats->blueprint_studied = $this->findValueByName($apiData, 'blueprint_studied');
        $playerStats->death_suicide = $this->findValueByName($apiData, 'death_suicide');
        $playerStats->death_fall = $this->findValueByName($apiData, 'death_fall');
        $playerStats->kill_player = $this->findValueByName($apiData, 'kill_player');
        $playerStats->bullet_hit_player = $this->findValueByName($apiData, 'bullet_hit_player');
        $playerStats->arrow_hit_entity = $this->findValueByName($apiData, 'arrow_hit_entity');
        $playerStats->harvested_stones = $this->findValueByName($apiData, 'harvested_stones');
        $playerStats->harvested_cloth = $this->findValueByName($apiData, 'harvested_cloth');
        $playerStats->harvested_wood = $this->findValueByName($apiData, 'harvested_wood');
        $playerStats->kill_bear = $this->findValueByName($apiData, 'kill_bear');
        $playerStats->kill_boar = $this->findValueByName($apiData, 'kill_boar');
        $playerStats->kill_stag = $this->findValueByName($apiData, 'kill_stag');
        $playerStats->kill_chicken = $this->findValueByName($apiData, 'kill_chicken');
        $playerStats->kill_wolf = $this->findValueByName($apiData, 'kill_wolf');
        $playerStats->headshot = $this->findValueByName($apiData, 'headshot');
        $playerStats->arrow_hit_player = $this->findValueByName($apiData, 'arrow_hit_player');
        $playerStats->harvested_leather = $this->findValueByName($apiData, 'harvested_leather');
        $playerStats->acquired_low_grade_fuel = $this->findValueByName($apiData, 'acquired_lowgradefuel');
        $playerStats->acquired_metal_ore = $this->findValueByName($apiData, 'acquired_metal.ore');
        $playerStats->acquired_scrap = $this->findValueByName($apiData, 'acquired_scrap');
        $playerStats->destroyed_barrels = $this->findValueByName($apiData, 'destroyed_barrels');
        $playerStats->save();
    }

    protected function getSavedDataPlayer($steamId)
    {
        // Получение сохраненных данных из базы данных
        return Player::findOne(['steam_id' => $steamId]);
    }

    protected function getSavedDataPlayerStats($steamId)
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