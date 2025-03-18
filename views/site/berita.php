<?php 

use yii\web\ForbiddenHttpException;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \app\models\News[] $models */

$this->title = 'Sistem Informasi Klinik';

if (Yii::$app->user->isGuest) {
    throw new ForbiddenHttpException('Not allowed here');
} elseif (Yii::$app->user->identity->role === 'master') {
    $this->title = 'News';
} else {
    throw new ForbiddenHttpException('You are not allowed to access this page.');
}?>
<div class="text-center mt-5">
            <h1>Berita Informasi Klinik</h1>
            <p>Temukan berita informasi layanan kesehatan terbaik untuk Anda dan keluarga di SInformasiK.</p>
        </div>
        <?php foreach ($models as $model): ?>
        <div class="d-flex flex-wrap justify-content-center">
            <div class="news-item card mb-4 shadow-sm" style="border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; max-width: 350px; margin: 10px;">
                <img src="<?php echo yii\helpers\Url::to('@web/uploads/' . $model->image) ?>" alt="News Image" style="width: 100%; height: 180px; object-fit: cover;">
                <div class="card-body" style="padding: 15px; background-color: #ffffff;">
                    <h5 class="card-title" style="font-weight: 600; color: #222; margin-bottom: 8px; font-size: 1.1rem;"><?php echo yii\helpers\Html::encode($model->title) ?></h5>
                    <p class="card-text" style="color: #888; font-size: 0.8rem; margin-bottom: 6px;"><?php echo date('d M Y', strtotime($model->created_at)) ?></p>
                    <p class="card-text" style="color: #555; font-size: 0.9rem; margin-bottom: 12px;"><?php echo yii\helpers\Html::encode($model->tag) ?></p>
                    <a href="<?php echo yii\helpers\Url::to(['news/view', 'id' => $model->id]) ?>" class="btn btn-outline-primary" style="border-radius: 20px; padding: 6px 16px; font-size: 0.9rem;">Baca Selengkapnya</a>
                </div>
        </div>
        <?php endforeach; ?>

</div>