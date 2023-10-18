<?php
/** @var app\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <h3>Логин</h3>
            <?= $form->field($model, 'username')->label(false)->textInput(['autofocus' => true, 'placeholder' => 'Придумайте логин']) ?>
            <h3>Почта</h3>
            <?= $form->field($model, 'email')->label(false)->textInput(['placeholder' => 'Введите свою почту'])?>
            <h3>Пароль</h3>
            <?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder' => 'Придумайте пароль']) ?>
            <div class="form-group">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>