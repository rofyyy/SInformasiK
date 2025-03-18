<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form card shadow p-4 mb-4 bg-white rounded">

    <h2 class="card-title text-left mb-2">Daftar sebagai pasien</h2>
    <p class="text-left text-muted mb-3 mt-0">Membuat akun untuk mengakses SInformasiK.</p>

    <?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation'], 'enableClientValidation' => true]); ?>

    <div class="form-group mb-3">
        <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Username', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Full Name', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Email Address', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'phone')->textInput(['class' => 'form-control'])->label('Phone Number', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Address', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'gender')->dropDownList(['man' => 'Man', 'woman' => 'Woman'], ['prompt' => 'Select..', 'class' => 'form-select'])->label('Gender', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'age')->textInput(['maxlength' => true, 'class' => 'form-control'])->label('Age', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group mb-3">
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control'])->label('Password', ['class' => 'form-label']) ?>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
