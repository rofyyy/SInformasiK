<?php

/** @var yii\web\View $this */
/** @var \app\models\News[] $models */

$this->title = 'Sistem Informasi Klinik';
?>
<div class="site-index">

    <div class="jumbotron text-left bg-transparent mt-5 mb-5 d-flex align-items-center" style="background-color: transparent;">
        <div class="text-left" style="flex: 1;">
            <h1 class="display-4">Sistem Informasi Klinik</h1>
            <p class="lead">Selamat datang di SInformasiK, website sistem informasi klinik yang melayani pasien secara online.</p>
            
            <p><a class="btn btn-lg btn-primary" href="#daftar">Mulai</a></p>
        </div>
        <div class="text-right" style="flex: 1;">
            <img src="/sistem-informasi-klinik/web/images/background/ilustrasi1.png" alt="Illustration" style="max-width: 100%; height: auto;">
        </div>
    
    </div>
        <?php if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'user') : ?>
        <div class="row justify-content-center">
            <a id="daftar" href="index.php?r=site%2Fregister" class="col-lg-6 mb-4 text-center" style="text-decoration: none;">
                <img src="/sistem-informasi-klinik/web/images/icons/patient-icon.jpg" alt="Patient Icon" style="max-width: 100%; height: auto; margin-bottom: 20px; border-radius: 20px;">
                <h2 style="font-size: 1.8rem; position: absolute; top: 75%; left: 30%; transform: translate(-50%, -50%); color: white;">Daftar sebagai pasien</h2>
                <style>
                    #daftar {
                        position: relative;
                        display: inline-block;
                    }
                    #daftar img {
                        transition: filter 0.3s ease;
                        filter: brightness(83%);
                    }
                    #daftar:hover img {
                        filter: brightness(50%);
                    }
                </style>

                <p style="font-size: 1rem; position: absolute; top: 86%; left: 36.9%; transform: translate(-50%, -50%); color: white; text-align: left;">Jika anda belum memiliki akun SInformasiK, maka daftarlah sebagai pasien.</p>
            </a>

            <a id="daftar" href="index.php?r=site%2Flogin" class="col-lg-6 mb-4 text-center" style="text-decoration: none;">
                <img src="/sistem-informasi-klinik/web/images/icons/patient-icon1.jpg" alt="Patient Icon" style="max-width: 100%; height: auto; margin-bottom: 20px; border-radius: 20px;">
                <h2 style="font-size: 1.8rem; position: absolute; top: 75%; left: 11.5%; transform: translate(-50%, -50%); color: white;">Login</h2>
                <p style="font-size: 1rem; position: absolute; top: 86%; left: 36.9%; transform: translate(-50%, -50%); color: white; text-align: left;">Bagi yang sudah memiliki akun SInformasik, silahkan login.</p>
            </a>
            </div>
        
           </div>
        <?php endif; ?>
    
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
    </div>
</div>
</div>

