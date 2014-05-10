<?php

class DefaultController extends Controller
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='/layouts/column1'; //reference to the layout of current module
	
	public function actionIndex()
	{
		$this->render('index');
	}
}