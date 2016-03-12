<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Profile;
use frontend\models\search\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use common\models\RecordHelpers;

class UpgradeController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$name = Profile::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
    	//$name = Yii::$app->user->identity->username;
        return $this->render('index',['name' => $name]);
        //return $this->render('index');
    }

}
