<?php
/** @var app\models\SearchForm $model */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Главная';

$avatarStyle = 'max-width: 100%; border-radius: 50%;';
$playerInfoStyle = 'margin-left: 20px;';
?>
<?php $form = ActiveForm::begin(['id' => 'steam-id-form']); ?>
<h2>Найти игрока</h2>
<?= $form->field($model, 'personaName')->label(false)->textInput(['autofocus' => true, 'placeholder' => 'Введите имя пользователя из Steam']) ?>
<div class="form-group">
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
</div>
<?php ActiveForm::end(); ?>
<?php if ($searchPlayer !== null): ?>
    <div class="player-info">
        <img src="<?= Html::encode($searchPlayer->avatar) ?>" alt="Avatar" style="<?= $avatarStyle ?>">
        <div style="<?= $playerInfoStyle ?>">
            <p>Имя пользователя: <?= Html::encode($searchPlayer->persona_name) ?></p>
            <p>Steam ID: <?= Html::encode($searchPlayer->steam_id) ?></p>
        </div>
    </div>
<?php endif; ?>
<?php if ($searchPlayerStats !== null && $searchPlayerStats !== 1): ?>
    <div class="player-stats">
        <table>
            <tr>
                <th>Параметр</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>Смертей</td>
                <td><?= $searchPlayerStats->deaths ?></td>
            </tr>
            <tr>
                <td>Пуль выпущенно</td>
                <td><?= $searchPlayerStats->bullet_fired ?></td>
            </tr>
            <tr>
                <td>Стрел выпущенно</td>
                <td><?= $searchPlayerStats->arrow_fired ?></td>
            </tr>
            <tr>
                <td>Выброшено вещей</td>
                <td><?= $searchPlayerStats->item_drop ?></td>
            </tr>
            <tr>
                <td>Изучено рецептов</td>
                <td><?= $searchPlayerStats->blueprint_studied ?></td>
            </tr>
            <tr>
                <td>Смертей от суицида</td>
                <td><?= $searchPlayerStats->death_suicide ?></td>
            </tr>
            <tr>
                <td>Смертей от падения</td>
                <td><?= $searchPlayerStats->death_fall ?></td>
            </tr>
            <tr>
                <td>Убито игроков</td>
                <td><?= $searchPlayerStats->kill_player ?></td>
            </tr>
            <tr>
                <td>Попаданий пулей по игрокам</td>
                <td><?= $searchPlayerStats->bullet_hit_player ?></td>
            </tr>
            <tr>
                <td>Попаданий стрелой по игрокам</td>
                <td><?= $searchPlayerStats->arrow_hit_player ?></td>
            </tr>
            <tr>
                <td>Добыто камня</td>
                <td><?= $searchPlayerStats->harvested_stones ?></td>
            </tr>
            <tr>
                <td>Добыто ткани</td>
                <td><?= $searchPlayerStats->harvested_cloth ?></td>
            </tr>
            <tr>
                <td>Добыто дерева</td>
                <td><?= $searchPlayerStats->harvested_wood ?></td>
            </tr>
            <tr>
                <td>Добыто кожи</td>
                <td><?= $searchPlayerStats->harvested_leather ?></td>
            </tr>
            <tr>
                <td>Получено топлива низкого качества</td>
                <td><?= $searchPlayerStats->acquired_low_grade_fuel ?></td>
            </tr>
            <tr>
                <td>Получено железной руды</td>
                <td><?= $searchPlayerStats->acquired_metal_ore ?></td>
            </tr>
            <tr>
                <td>Получено скрапа</td>
                <td><?= $searchPlayerStats->acquired_scrap ?></td>
            </tr>
            <tr>
                <td>Убито медведей</td>
                <td><?= $searchPlayerStats->kill_bear ?></td>
            </tr>
            <tr>
                <td>Убито кабанов</td>
                <td><?= $searchPlayerStats->kill_boar ?></td>
            </tr>
            <tr>
                <td>Убито оленей</td>
                <td><?= $searchPlayerStats->kill_stag ?></td>
            </tr>
            <tr>
                <td>Убито куриц</td>
                <td><?= $searchPlayerStats->kill_chicken ?></td>
            </tr>
            <tr>
                <td>Убито волков</td>
                <td><?= $searchPlayerStats->kill_wolf ?></td>
            </tr>
            <tr>
                <td>Попаданий в голову</td>
                <td><?= $searchPlayerStats->headshot ?></td>
            </tr>
            <tr>
                <td>Разрушено бочек</td>
                <td><?= $searchPlayerStats->destroyed_barrels ?></td>
            </tr>
        </table>
    </div>
<?php elseif($searchPlayerStats == 1): ?>
    <p>Профиль игрока скрыт или игрок не имеет игру Rust на своем аккаунте.</p>
<?php endif; ?>
