<?php

class TackController extends Controller
{
	public function actionCreate()
	{
        $model=new Tack;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Tack']))
        {
            var_dump($_POST);
            //echo var_dump($_POST["Tack"]);
            $model->attributes=$_POST['Tack'];
            echo "\n\nmodel:";
            var_dump($model);
            if($model->save())
            {
                $this->redirect(array('../board/view','id'=>$_POST['boardID']));
            }
            else
            {
                echo "nope";
            }
        }
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSaveState()
	{
		$this->render('saveState');
	}

	public function actionUpdate()
	{
		$this->render('update');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}