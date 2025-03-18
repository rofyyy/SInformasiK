<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\ForbiddenHttpException;

/** @var yii\web\View $this */
/** @var app\models\News $model */

if (Yii::$app->user->isGuest) {
    throw new ForbiddenHttpException('Not allowed here');
} elseif (Yii::$app->user->identity->role === 'master') {
    $this->title = 'News';
} else {
    throw new ForbiddenHttpException('You are not allowed to access this page.');
}

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'author',
            'image',
            'content:ntext',
        ],
    ]) ?>

</div>
