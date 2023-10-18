<?php

use yii\helpers\Html;

$this->title = 'Статистика игрока';

$avatarStyle = 'max-width: 100%; border-radius: 50%;';
$playerInfoStyle = 'margin-left: 20px;';

?>
<h1>Информация об игроке</h1>

<?php if ($player !== null): ?>
    <div class="player-info">
        <img src="<?= Html::encode($player->avatar) ?>" alt="Avatar" style="<?= $avatarStyle ?>">
        <div style="<?= $playerInfoStyle ?>">
            <p>Имя пользователя: <?= Html::encode($player->persona_name) ?></p>
            <p>Steam ID: <?= Html::encode($player->steam_id) ?></p>
        </div>
    </div>
<?php endif; ?>
<?php if ($playerStats !== null): ?>
    <div class="player-stats">
        <table>
            <tr>
                <th>Параметр</th>
                <th>Значение</th>
            </tr>
            <tr>
                <td>Смертей</td>
                <td><?= $playerStats->deaths ?></td>
            </tr>
            <tr>
                <td>Пуль выпущенно</td>
                <td><?= $playerStats->bullet_fired ?></td>
            </tr>
            <tr>
                <td>Стрел выпущенно</td>
                <td><?= $playerStats->arrow_fired ?></td>
            </tr>
            <tr>
                <td>Выброшено вещей</td>
                <td><?= $playerStats->item_drop ?></td>
            </tr>
            <tr>
                <td>Изучено рецептов</td>
                <td><?= $playerStats->blueprint_studied ?></td>
            </tr>
            <tr>
                <td>Смертей от суицида</td>
                <td><?= $playerStats->death_suicide ?></td>
            </tr>
            <tr>
                <td>Смертей от падения</td>
                <td><?= $playerStats->death_fall ?></td>
            </tr>
            <tr>
                <td>Убито игроков</td>
                <td><?= $playerStats->kill_player ?></td>
            </tr>
            <tr>
                <td>Попаданий пулей по игрокам</td>
                <td><?= $playerStats->bullet_hit_player ?></td>
            </tr>
            <tr>
                <td>Попаданий стрелой по игрокам</td>
                <td><?= $playerStats->arrow_hit_player ?></td>
            </tr>
            <tr>
                <td>Добыто камня</td>
                <td><?= $playerStats->harvested_stones ?></td>
            </tr>
            <tr>
                <td>Добыто ткани</td>
                <td><?= $playerStats->harvested_cloth ?></td>
            </tr>
            <tr>
                <td>Добыто дерева</td>
                <td><?= $playerStats->harvested_wood ?></td>
            </tr>
            <tr>
                <td>Добыто кожи</td>
                <td><?= $playerStats->harvested_leather ?></td>
            </tr>
            <tr>
                <td>Получено топлива низкого качества</td>
                <td><?= $playerStats->acquired_low_grade_fuel ?></td>
            </tr>
            <tr>
                <td>Получено железной руды</td>
                <td><?= $playerStats->acquired_metal_ore ?></td>
            </tr>
            <tr>
                <td>Получено скрапа</td>
                <td><?= $playerStats->acquired_scrap ?></td>
            </tr>
            <tr>
                <td>Убито медведей</td>
                <td><?= $playerStats->kill_bear ?></td>
            </tr>
            <tr>
                <td>Убито кабанов</td>
                <td><?= $playerStats->kill_boar ?></td>
            </tr>
            <tr>
                <td>Убито оленей</td>
                <td><?= $playerStats->kill_stag ?></td>
            </tr>
            <tr>
                <td>Убито куриц</td>
                <td><?= $playerStats->kill_chicken ?></td>
            </tr>
            <tr>
                <td>Убито волков</td>
                <td><?= $playerStats->kill_wolf ?></td>
            </tr>
            <tr>
                <td>Попаданий в голову</td>
                <td><?= $playerStats->headshot ?></td>
            </tr>
            <tr>
                <td>Разрушено бочек</td>
                <td><?= $playerStats->destroyed_barrels ?></td>
            </tr>
        </table>
    </div>
<?php endif; ?>