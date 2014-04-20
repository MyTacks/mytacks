<?php

class TackController extends Controller
{
	public function actionCreate()
	{
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        echo "actionCreate";
        //var_dump($_POST);
        //if (true) return;
        if(!isset($_POST['Tack']))
        {
            $this->redirect(array('/board/'));
        }

        $boardID = $_POST['Tack']['boardID'];

        $tack_type = $this->deduceTackType($_POST['Tack']['tackContent']);
        $model = new Tack($tack_type);

        if(isset($_POST['Tack']))
        {
            $pst = new DateTimeZone('America/Los_Angeles');
            $date = new DateTime();
            $date->setTimezone($pst);
            $timeStamp = $date->format('Y-m-d H:i:s');
            //echo var_dump($_POST["Tack"]);
            $model->attributes=$_POST['Tack'];
            $model['boardID'] = intval($model['boardID'] );
            $model['userID'] = intval($model['userID'] );
            $model['isPrivate'] = intval($model['isPrivate'] );
            $model['updateDate'] = $timeStamp;
            $save = $model->save(false);
            if($save)
            {
                echo $save;
                echo "errors".var_dump($model->getErrors());
                //$this->redirect(array('/board/view?&id='.$boardID));
            }
            else
            {
                echo "is new record".$model->getIsNewRecord();
                echo "errors".var_dump($model->getErrors());
                echo "save attempt".$save;
                echo "nope";
            }
        }
        else
        {
            $this->redirect(array('/board/'));
        }
	}

    public function deduceTackType($content)
    {
        if(strpos($content, "youtube") !== false)
        {
            return 'ext.Yiitube';
        }
        else if(strpos($content, ".jpg") !== false
            || strpos($content, ".img") !== false
            || strpos($content, ".jpg"))
        {
            return 'image';
        }
        else if(filter_var($content, FILTER_VALIDATE_URL))
        {
            return 'url';
        }
        else
        {
            return 'text';
        }
    }


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $BID = $this->loadModel($id)->boardID;
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
        {
            $this->redirect(array('board/view','id'=>$BID));
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tack');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tack('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tack']))
			$model->attributes=$_GET['Tack'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tack the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tack $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tack-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
