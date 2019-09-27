<?php

namespace app\controllers;

use app\models\UserRecord;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        VarDumper::dump(new UserRecord());
    }

    public function actionVitaly()
    {
        $user = new UserRecord();
        $user->password = Yii::$app->security->generatePasswordHash('no password');
        $user->name = 'Vitaly Litvinov';
        $user->is_admin = 0;
        $user->email = 'cheltend@mail.ru';
        VarDumper::dump($user->save());

    }


}
