<?php 
namespace frontend\controllers;
use Yii;
use yii\filters\verbFilter;
use frontend\models\Profile;
use frontend\models\search\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use common\models\RecordHelpers;

class ProfileController extends Controller
{
	/*public function behaviors()
	{
		return [
		'verbs' => [
		'class' => VerbFilter::className(),
		'actions' => [
		'delete' => ['post'],
		],
		],
		];
	}*/

	public function behaviors()
	{
	return [
	'access' => [
	'class' => \yii\filters\AccessControl::className(),
	'only' => ['index', 'view','create', 'update', 'delete'],
	'rules' => [
	[
	'actions' => ['index', 'view','create', 'update', 'delete'],
	'allow' => true,
	'roles' => ['@'],
	],
	],
	],
	'access2' => [
	'class' => \yii\filters\AccessControl::className(),
	'only' => ['index', 'view','create', 'update', 'delete'],
	'rules' => [
	[
	'actions' => ['index', 'view','create', 'update', 'delete'],
	'allow' => true,
	'roles' => ['@'],
	'matchCallback' => function ($rule, $action) {
	return PermissionHelpers::requireStatus('Active');
	}
	],
	],
	],
	'verbs' => [
	'class' => VerbFilter::className(),
	'actions' => [
	'delete' => ['post'],
	],
	],
	];
	}

	/**
	* Lists all Profile models.
	* @return mixed
	*/
	/*public function actionIndex()
	{
	$searchModel = new ProfileSearch();
	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
	return $this->render('index', [
	'searchModel' => $searchModel,
	'dataProvider' => $dataProvider,
	]);
	}*/

	public function actionIndex()
	{
	if ($already_exists = RecordHelpers::userHas('profile')) {
	return $this->render('view', [
	'model' => $this->findModel($already_exists),
	]);
	} else {
	return $this->redirect(['create']);
	}
	}
	/**
	* Displays a single Profile model.
	* @param string $id
	* @return mixed
	*/
	/*public function actionView($id)
	{
	return $this->render('view', [
	'model' => $this->findModel($id),
	]);
	}*/

	public function actionView()
	{
	if ($already_exists = RecordHelpers::userHas('profile')) {
	return $this->render('view', [
	'model' => $this->findModel($already_exists),
	]);
	} else {
	return $this->redirect(['create']);
	}
	}

	public function actionCreate
		{
	$model = new Profile;
	$model->user_id = \Yii::$app->user->identity->id;
	if ($already_exists = RecordHelpers::userHas('profile')) {
	return $this->render('view', [
	'model' => $this->findModel($already_exists),
	]);
	} elseif ($model->load(Yii::$app->request->post()) && $model->save()){
	return $this->redirect(['view']);
	} else {
	return $this->render('create', [
	'model' => $model,
	]);
	}
	}

	/**
	* Updates an existing Profile model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param string $id
	* @return mixed
	*if statement in two lines due to avoid wordwrap
	*/
	public function actionUpdate()
	{
		PermissionHelpers::requireUpgradeTo('Paid');
		if($model = Profile::find()->where(['user_id' =>
		Yii::$app->user->identity->id])->one()) {
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
		//return $this->redirect(['view']);
		return $this->redirect(['view', 'id' => $model->id]);
		} else {
		return $this->render('update', [
		'model' => $model,
		]);
		}
		} else {
		throw new NotFoundHttpException('No Such Profile.');
		}
	}
}

	public function actionDelete()
	{
	$model = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
	$this->findModel($model->id)->delete();
	return $this->redirect(['site/index']);
	}

	protected function findModel($id)
	{
		if (($model = Profile::findOne($id)) !== null) {
		return $model;
		} else {
		throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
 ?>