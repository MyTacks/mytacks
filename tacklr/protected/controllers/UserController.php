<?php

class UserController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view','create','activate'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new User;
		$pst = new DateTimeZone('America/Los_Angeles');
		$date = new DateTime();
		$date->setTimezone($pst);
		$timeStamp = $date->format('Y-m-d H:i:s');
		$rnd = rand(0,9999);  // generate random number between 0-9999
		

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
		
			if(User::model()->exists('username=:username',array('username'=>$model->username)))
			{
					echo 'User already exists';
					//$this->redirect('/mytacks/tacklr/user/create');
            		return;
			}
       

			$model->groupID = 2;
			$model->active = 0;
			$model->updateDate = $timeStamp;
			$model->joinDate = $timeStamp;
			$model->activeKey = crypt($model->username.$rnd);
			$activationUrl = Yii::app()->getBaseUrl(true).'/user/activate?id='.$model->activeKey;
			$uploadedFile=CUploadedFile::getInstance($model,'imageURL'); // get the file name to be uploaded

            if($uploadedFile)
            {
                $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                $uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$fileName);
                // store baseURL and image name .....http://localhost:8080/tckle/images/226-php24.jpg
                $model->imageURL = Yii::app()->getBaseUrl(true).'/images/'.$fileName;
            }

			//$fullImgSource = Yii::getPathOfAlias('webroot').'/media/images/'.$fullImgName;    
			$model->password =crypt($model->password,$model->activeKey);
			if($model->save())
			{
				$this->sendActivatioEmail($activationUrl, $model->email);
				$this->redirect(array('view','id'=>$model->userID));
			}
				
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
	public function actionActivate($id)
	{
		
		$model= User::model()->findByAttributes(array('activeKey'=>$id));
		if($model === null)
		{
			
			echo 'can not find username';
			//$url = $this->createUrl('//registration/activation_failure.php');
			//$this->redirect($url);
		}
		else
		{
			$model->active = 1;
			if ($model->update())
				echo 'Here you are'. $model->username;
			else
				echo 'fail to activate'. $model->username;
			//$url = $this->createUrl('//registration/activation_failure.php');
			//$this->redirect($url);
		}
		//	
	}
	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->userID));
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

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
	 * Send activation email to user
	 * @param activateURL is link used to activate user account
	 * @param sendTo is the email of user
	 */
	public function sendActivatioEmail($activateUrl,$sendTo)
	{
		$email = new YiiMailer();
		$message = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
		<html>
			<head>
				<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
				<title>Tacklr Account Activation</title>
			</head>
			<body>
				<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>
						<h1>Welcome to Tacklr.</h1>
						<div align='center'>
						</div>
						<p>Click the following link to activate your account</strong>.</p>
						<p>$activateUrl</p>
				</div>
			</body>
		</html>";
		$email->setBody($message);
		$email->setSubject = 'Welcome to Tacklr.';
		$email->setTo($sendTo);
			
		if (!$email->send()) 
		{
			echo $email->getError();exit(0);
			Yii::app()->user->setFlash('error','Error while sending email: '.$email->getError());
		}
		
		
		
		
	}
}
