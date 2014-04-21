<?php

class BoardController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
            array('allow', // allow authenticated user to perform 'delete' actions
                'actions'=>array('delete'),
                'users'=>array('@'),
            ),
			array('allow', // allow admin user to perform 'admin' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Board;
        $pst = new DateTimeZone('America/Los_Angeles');
        $date = new DateTime();
        $date->setTimezone($pst);
        $timeStamp = $date->format('Y-m-d H:i:s');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Board']))
		{
			$model->attributes=$_POST['Board'];

            $user_in_db = User::model()->findByAttributes(array('username'=>Yii::app()->user->getId()));
            $UID = ($user_in_db['userID']);
            $model->userID = $UID;
            $model->createDate = $timeStamp;

			if($model->save())
				$this->redirect(array('view','id'=>$model->boardID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $pst = new DateTimeZone('America/Los_Angeles');
        $date = new DateTime();
        $date->setTimezone($pst);
        $timeStamp = $date->format('Y-m-d H:i:s');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Board']))
		{
			$model->attributes=$_POST['Board'];
            $model->updateDate = $timeStamp;
			if($model->save())
				$this->redirect(array('view','id'=>$model->boardID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $this->loadModel($id)->delete();
        if (!isset($_GET['ajax']))
        {
            $this->redirect(array('index'));
        }
        $this->redirect(array('board'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Board');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Board('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Board']))
			$model->attributes=$_GET['Board'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Board the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Board::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Board $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='board-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
