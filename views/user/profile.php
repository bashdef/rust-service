<?php

/** @var app\models\SteamIdForm $model */

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'User Profile';
?>
<h1>Профиль пользователя</h1>
<p>Логин: <?= Html::encode($user->username) ?></p>
<p>Steam ID: <?= Html::encode($user->steam_id) ?></p>
<?php if (!$user->steam_id): ?>
    <?php $form = ActiveForm::begin(['id' => 'steam-id-form']); ?>
    <?= $form->field($model, 'steamId')->textInput(['autofocus' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save Steam ID', ['class' => 'btn btn-primary', 'name' => 'steam-id-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
<?php endif; ?>
<?php if ($savedDataPlayer !== null): ?>
    <div>
        <h2>Данные пользователя из Steam:</h2>
        <pre>
            Имя пользователя: <?= Html::encode($savedDataPlayer->persona_name) ?><br>
            Аватарка: <img src="<?= Html::encode($savedDataPlayer->avatar) ?>" alt="Avatar">
        </pre>
    </div>
<?php endif; ?>
<?php if($savedDataPlayerStats !== null): ?>
    <pre>
            Смертей: <?= $savedDataPlayerStats->deaths ?><br>
            Пуль выпущенно: <?= $savedDataPlayerStats->bullet_fired ?><br>
            Стрел выпущенно: <?= $savedDataPlayerStats->arrow_fired ?><br>
            Выброшено вещей: <?= $savedDataPlayerStats->item_drop ?><br>
            Изучено рецептов: <?= $savedDataPlayerStats->blueprint_studied ?><br>
            Смертей от суицида: <?= $savedDataPlayerStats->death_suicide ?><br>
            Смертей от падения: <?= $savedDataPlayerStats->death_fall ?><br>
            Убито игроков: <?= $savedDataPlayerStats->kill_player ?><br>
            Попаданий пулей по игрокам: <?= $savedDataPlayerStats->bullet_hit_player ?><br>
            Попаданий стрелой по игрокам: <?= $savedDataPlayerStats->arrow_hit_player ?><br>
            Добыто камня: <?= $savedDataPlayerStats->harvested_stones ?><br>
            Добыто ткани: <?= $savedDataPlayerStats->harvested_cloth ?><br>
            Добыто дерева: <?= $savedDataPlayerStats->harvested_wood ?><br>
            Добыто кожи: <?= $savedDataPlayerStats->harvested_leather ?><br>
            Получено топлива низкого качества: <?= $savedDataPlayerStats->acquired_low_grade_fuel ?><br>
            Получено железной руды: <?= $savedDataPlayerStats->acquired_metal_ore ?><br>
            Получено скрапа: <?= $savedDataPlayerStats->acquired_scrap ?><br>
            Убито медведей: <?= $savedDataPlayerStats->kill_bear ?><br>
            Убито кабанов: <?= $savedDataPlayerStats->kill_boar ?><br>
            Убито оленей: <?= $savedDataPlayerStats->kill_stag ?><br>
            Убито куриц: <?= $savedDataPlayerStats->kill_chicken ?><br>
            Убито волков: <?= $savedDataPlayerStats->kill_wolf ?><br>
            Попаданий в голову: <?= $savedDataPlayerStats->headshot ?><br>
            Разрушено бочек: <?= $savedDataPlayerStats->destroyed_barrels ?><br>
        </pre>
<?php endif; ?>
