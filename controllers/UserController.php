<?php

namespace app\controllers;

use app\models\SteamIdForm;
use Yii;
use yii\web\Controller;
use app\models\Player;
use app\models\PlayerStats;

class UserController extends Controller
{
    public function actionProfile()
    {
        $user = Yii::$app->user->identity;

        $model = new SteamIdForm();
        $savedDataPlayer = null;
        $savedDataPlayerStats = null;

        $steamId = Yii::$app->session->get('steamId');

        if ($user->steam_id !== null && $steamId === null) {
            Yii::$app->session->set('steamId', $user->steam_id);
            $steamId = $user->steam_id;
        }

        if ($steamId !== null) {
            $playerModel = new Player();
            $playerModelStats = new PlayerStats();
            $savedDataPlayer = $playerModel->getSavedDataPlayer($steamId);
            $savedDataPlayerStats = $playerModelStats->getSavedDataPlayerStats($steamId);
        }

        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
            if($model->validate()){
                Yii::$app->session->set('steamId', $model->steamId);

                $user->steam_id = $model->steamId;
                $user->save();
            }
        }

        return $this->render('profile', [
            'user' => $user,
            'model' => $model,
            'savedDataPlayer' => $savedDataPlayer,
            'savedDataPlayerStats' => $savedDataPlayerStats,
        ]);
    }
}