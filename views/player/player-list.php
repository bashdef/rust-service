<?php
use yii\helpers\Html;

$this->title = 'Список игроков';
?>

<h1>Список игроков</h1>

<div class="player-list">
    <?php foreach ($players as $player): ?>
        <div class="player-item">
            <?= Html::a(Html::img($player->avatar, ['alt' => 'Avatar']), ['player/player-details', 'steamId' => $player->steam_id]) ?>
            <div class="player-name"><?= Html::encode($player->persona_name) ?></div>
        </div>
    <?php endforeach; ?>
</div>