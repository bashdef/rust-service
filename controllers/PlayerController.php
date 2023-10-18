<?php

namespace app\controllers;

use app\models\Player;
use app\models\SteamIdForm;
use Yii;
use yii\web\Controller;
use app\models\PlayerStats;

class PlayerController extends Controller
{
    public function actionIndex()
    {
        $model = new SteamIdForm();
        $modelPlayer = new Player();
        $modelPlayerStats = new PlayerStats();
        $apiData = null;
        $savedDataPlayer = null;
        $savedDataPlayerStats = null;
        $playerStats = 1;

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            // Валидация данных
            if ($model->validate()) {
                $steamId = $model->steamId;
                $apiData = $modelPlayer->getSteamUserData($steamId);
                $modelPlayer->saveToDatabasePlayer($steamId, $apiData);
                // Получение сохраненных данных из базы данных
                $savedDataPlayer = $modelPlayer->getSavedDataPlayer($steamId);
            }
        }
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            // Валидация данных
            if ($model->validate()) {
                $steamId = $model->steamId;
                $apiData = $modelPlayerStats->getSteamUserStats($steamId);
                $modelPlayerStats->saveToDatabasePlayerStats($steamId, $apiData);
                $playerStats = $modelPlayerStats->saveToDatabasePlayerStats($steamId, $apiData);
                // Получение сохраненных данных из базы данных
                $savedDataPlayerStats = $modelPlayerStats->getSavedDataPlayerStats($steamId);
            }
        }

        return $this->render('index', [
            'model' => $model,
            'playerStats' => $playerStats,
            'apiData' => $apiData,
            'savedDataPlayer' => $savedDataPlayer,
            'savedDataPlayerStats' => $savedDataPlayerStats,
        ]);
    }

    public function actionPlayerList()
    {
        $players = Player::find()->all();

        return $this->render('player-list', [
            'players' => $players,
        ]);
    }

    public function actionPlayerDetails($steamId)
    {
        $player = Player::findOne(['steam_id' => $steamId]);
        $playerStats = PlayerStats::findOne(['steam_id' => $steamId]);

        return $this->render('player-details', [
            'player' => $player,
            'playerStats' => $playerStats,
        ]);
    }
}