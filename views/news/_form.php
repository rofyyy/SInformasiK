<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\ForbiddenHttpException;

/** @var yii\web\View $this */
/** @var app\models\News $model */
/** @var yii\widgets\ActiveForm $form */

if (Yii::$app->user->isGuest) {
    throw new ForbiddenHttpException('Not allowed here');
} elseif (Yii::$app->user->identity->role === 'master') {
    $this->title = 'News';
} else {
    throw new ForbiddenHttpException('You are not allowed to access this page.');
}
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput()?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
