<?php

namespace app\models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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


    /**
     * @throws GuzzleException
     */
    public function getSteamUserData($steamId)
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

    public function saveToDatabasePlayer($steamId, $apiData)
    {
        // Сохранение данных в базу данных
        $player = new Player();
        $player->steam_id = $steamId;
        $player->persona_name = $apiData['personaname'];
        $player->avatar = $apiData['avatarfull'];
        $player->save();
    }

    public function getSavedDataPlayer($steamId)
    {
        // Получение сохраненных данных из базы данных
        return Player::findOne(['steam_id' => $steamId]);
    }
}
