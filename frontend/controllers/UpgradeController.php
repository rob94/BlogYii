<?php

namespace frontend\controllers;

class UpgradeController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$name = Profile::find()->where(['user_id' =>
		Yii::$app->user->identity->id])->one();
    	//$name = Yii::$app->user->identity->username;
        return $this->render('index',['name' => $name]);
        //return $this->render('index');
    }

}
