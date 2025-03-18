<?php

namespace app\controllers;

use yii\filters\AccessControl;
use Yii;

class PatientController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Hanya pengguna yang login
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role === 'user';
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionPatient()
    {
        return $this->render('/site/index');
    }
    public function actionProfile()
    {
    return $this->render('//role/user/profile');
    }

    
}
