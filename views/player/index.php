<?php
/** @var app\models\SteamIdForm $model */


use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Просмотр статистики';
?>

<div>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'steamId')->textInput(['id' => 'steamIdInput']) ?>
    <?= Html::submitButton('Получить статистику', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>

<div id="result-container">
    <?php if (isset($savedDataPlayer)): ?>
        <pre>
            Steam ID: <?= $savedDataPlayer->steam_id ?><br>
            Имя пользователя: <?= $savedDataPlayer->persona_name ?><br>
            Аватарка: <img src="<?= $savedDataPlayer->avatar ?>" alt="Avatar">
        </pre>
    <?php endif; ?>
    <?php if(isset($savedDataPlayerStats)): ?>
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
</div>