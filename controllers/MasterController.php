<?php 

namespace app\controllers;

use yii\filters\AccessControl;
use Yii;

class MasterController extends \yii\web\Controller
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
                            return Yii::$app->user->identity->role === 'master';
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    
}