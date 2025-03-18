<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\ForbiddenHttpException;

/** @var yii\web\View $this */
/** @var app\models\NewsSearch $model */
/** @var yii\widgets\ActiveForm $form */

if (Yii::$app->user->isGuest) {
    throw new ForbiddenHttpException('Not allowed here');
} elseif (Yii::$app->user->identity->role === 'master') {
    $this->title = 'News';
} else {
    throw new ForbiddenHttpException('You are not allowed to access this page.');
}
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'content') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
