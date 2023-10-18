<?php
/** @var app\models\SteamIdForm $model */


use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Просмотр статистики';

$avatarStyle = 'max-width: 100%; border-radius: 50%;';
$playerInfoStyle = 'margin-left: 20px;';
?>

<div>
    <?php $form = ActiveForm::begin(); ?>
    <h2>Посмотреть статистику игрока</h2>
    <?= $form->field($model, 'steamId')->label(false)->textInput(['id' => 'steamIdInput', 'placeholder' => 'Введите Steam ID пользователя']) ?>
    <?= Html::submitButton('Получить статистику', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>

<div id="result-container">
    <?php if (isset($savedDataPlayer)): ?>
        <div class="player-info">
            <img src="<?= Html::encode($savedDataPlayer->avatar) ?>" alt="Avatar" style="<?= $avatarStyle ?>">
            <div style="<?= $playerInfoStyle ?>">
                <p>Имя пользователя: <?= Html::encode($savedDataPlayer->persona_name) ?></p>
                <p>Steam ID: <?= Html::encode($savedDataPlayer->steam_id) ?></p>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($savedDataPlayerStats !== null): ?>
        <div class="player-stats">
            <table>
                <tr>
                    <th>Параметр</th>
                    <th>Значение</th>
                </tr>
                <tr>
                    <td>Смертей</td>
                    <td><?= $savedDataPlayerStats->deaths ?></td>
                </tr>
                <tr>
                    <td>Пуль выпущенно</td>
                    <td><?= $savedDataPlayerStats->bullet_fired ?></td>
                </tr>
                <tr>
                    <td>Стрел выпущенно</td>
                    <td><?= $savedDataPlayerStats->arrow_fired ?></td>
                </tr>
                <tr>
                    <td>Выброшено вещей</td>
                    <td><?= $savedDataPlayerStats->item_drop ?></td>
                </tr>
                <tr>
                    <td>Изучено рецептов</td>
                    <td><?= $savedDataPlayerStats->blueprint_studied ?></td>
                </tr>
                <tr>
                    <td>Смертей от суицида</td>
                    <td><?= $savedDataPlayerStats->death_suicide ?></td>
                </tr>
                <tr>
                    <td>Смертей от падения</td>
                    <td><?= $savedDataPlayerStats->death_fall ?></td>
                </tr>
                <tr>
                    <td>Убито игроков</td>
                    <td><?= $savedDataPlayerStats->kill_player ?></td>
                </tr>
                <tr>
                    <td>Попаданий пулей по игрокам</td>
                    <td><?= $savedDataPlayerStats->bullet_hit_player ?></td>
                </tr>
                <tr>
                    <td>Попаданий стрелой по игрокам</td>
                    <td><?= $savedDataPlayerStats->arrow_hit_player ?></td>
                </tr>
                <tr>
                    <td>Добыто камня</td>
                    <td><?= $savedDataPlayerStats->harvested_stones ?></td>
                </tr>
                <tr>
                    <td>Добыто ткани</td>
                    <td><?= $savedDataPlayerStats->harvested_cloth ?></td>
                </tr>
                <tr>
                    <td>Добыто дерева</td>
                    <td><?= $savedDataPlayerStats->harvested_wood ?></td>
                </tr>
                <tr>
                    <td>Добыто кожи</td>
                    <td><?= $savedDataPlayerStats->harvested_leather ?></td>
                </tr>
                <tr>
                    <td>Получено топлива низкого качества</td>
                    <td><?= $savedDataPlayerStats->acquired_low_grade_fuel ?></td>
                </tr>
                <tr>
                    <td>Получено железной руды</td>
                    <td><?= $savedDataPlayerStats->acquired_metal_ore ?></td>
                </tr>
                <tr>
                    <td>Получено скрапа</td>
                    <td><?= $savedDataPlayerStats->acquired_scrap ?></td>
                </tr>
                <tr>
                    <td>Убито медведей</td>
                    <td><?= $savedDataPlayerStats->kill_bear ?></td>
                </tr>
                <tr>
                    <td>Убито кабанов</td>
                    <td><?= $savedDataPlayerStats->kill_boar ?></td>
                </tr>
                <tr>
                    <td>Убито оленей</td>
                    <td><?= $savedDataPlayerStats->kill_stag ?></td>
                </tr>
                <tr>
                    <td>Убито куриц</td>
                    <td><?= $savedDataPlayerStats->kill_chicken ?></td>
                </tr>
                <tr>
                    <td>Убито волков</td>
                    <td><?= $savedDataPlayerStats->kill_wolf ?></td>
                </tr>
                <tr>
                    <td>Попаданий в голову</td>
                    <td><?= $savedDataPlayerStats->headshot ?></td>
                </tr>
                <tr>
                    <td>Разрушено бочек</td>
                    <td><?= $savedDataPlayerStats->destroyed_barrels ?></td>
                </tr>
            </table>
        </div>
    <?php elseif($playerStats == null): ?>
        <p>Профиль игрока скрыт или игрок не имеет игру Rust на своем аккаунте.</p>
    <?php endif; ?>
</div>