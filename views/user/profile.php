<?php

/** @var app\models\SteamIdForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Профиль';

$avatarStyle = 'max-width: 100%; border-radius: 50%;';
$playerInfoStyle = 'margin-left: 20px;';
?>
<h1>Профиль пользователя</h1>
<?php if (!$user->steam_id): ?>
    <?php $form = ActiveForm::begin(['id' => 'steam-id-form']); ?>
    <?= $form->field($model, 'steamId')->label(false)->textInput(['autofocus' => true, 'placeholder' => 'Введите свой Steam ID']) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить Steam ID', ['class' => 'btn btn-primary', 'name' => 'steam-id-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
<?php endif; ?>
<?php if ($savedDataPlayer !== null): ?>
    <div class="player-info">
        <img src="<?= Html::encode($savedDataPlayer->avatar) ?>" alt="Avatar" style="<?= $avatarStyle ?>">
        <div style="<?= $playerInfoStyle ?>">
            <p>Имя пользователя: <?= Html::encode($savedDataPlayer->persona_name) ?></p>
            <p>Логин: <?= Html::encode($user->username) ?></p>
            <p>Steam ID: <?= Html::encode($user->steam_id) ?></p>
        </div>
    </div>
<?php endif; ?>
<?php if ($savedDataPlayerStats !== null && $savedDataPlayerStats !== 1): ?>
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
<?php elseif($savedDataPlayerStats == 1): ?>
    <p>Ваш профиль Steam скрыт или у вас нету игры Rust.</p>
<?php endif; ?>
