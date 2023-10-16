<?php
/** @var app\models\SearchForm $model */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Главная';
?>
<?php $form = ActiveForm::begin(['id' => 'steam-id-form']); ?>
<?= $form->field($model, 'personaName')->textInput(['autofocus' => true]) ?>
<div class="form-group">
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php if ($searchPlayer !== null): ?>
    <div>
        <h2>Найденный пользователь:</h2>
        <pre>
            Имя пользователя: <?= Html::encode($searchPlayer->persona_name) ?><br>
            Аватарка: <img src="<?= Html::encode($searchPlayer->avatar) ?>" alt="Avatar">
        </pre>
    </div>
<?php endif; ?>
<?php if($searchPlayerStats !== null): ?>
    <pre>
            Смертей: <?= $searchPlayerStats->deaths ?><br>
            Пуль выпущенно: <?= $searchPlayerStats->bullet_fired ?><br>
            Стрел выпущенно: <?= $searchPlayerStats->arrow_fired ?><br>
            Выброшено вещей: <?= $searchPlayerStats->item_drop ?><br>
            Изучено рецептов: <?= $searchPlayerStats->blueprint_studied ?><br>
            Смертей от суицида: <?= $searchPlayerStats->death_suicide ?><br>
            Смертей от падения: <?= $searchPlayerStats->death_fall ?><br>
            Убито игроков: <?= $searchPlayerStats->kill_player ?><br>
            Попаданий пулей по игрокам: <?= $searchPlayerStats->bullet_hit_player ?><br>
            Попаданий стрелой по игрокам: <?= $searchPlayerStats->arrow_hit_player ?><br>
            Добыто камня: <?= $searchPlayerStats->harvested_stones ?><br>
            Добыто ткани: <?= $searchPlayerStats->harvested_cloth ?><br>
            Добыто дерева: <?= $searchPlayerStats->harvested_wood ?><br>
            Добыто кожи: <?= $searchPlayerStats->harvested_leather ?><br>
            Получено топлива низкого качества: <?= $searchPlayerStats->acquired_low_grade_fuel ?><br>
            Получено железной руды: <?= $searchPlayerStats->acquired_metal_ore ?><br>
            Получено скрапа: <?= $searchPlayerStats->acquired_scrap ?><br>
            Убито медведей: <?= $searchPlayerStats->kill_bear ?><br>
            Убито кабанов: <?= $searchPlayerStats->kill_boar ?><br>
            Убито оленей: <?= $searchPlayerStats->kill_stag ?><br>
            Убито куриц: <?= $searchPlayerStats->kill_chicken ?><br>
            Убито волков: <?= $searchPlayerStats->kill_wolf ?><br>
            Попаданий в голову: <?= $searchPlayerStats->headshot ?><br>
            Разрушено бочек: <?= $searchPlayerStats->destroyed_barrels ?><br>
        </pre>
<?php endif; ?>
