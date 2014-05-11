<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/index.css');
?>

 

<?php 
	// return to login page
	//$this->redirect(array('login'));  
	/*$this->widget('bootstrap.widgets.TbCarousel', array(
		'items'=>array(
				array('image'=>$baseUrl . '/images/cork.jpg',
					  'src' => 'http://localhost:8080/tacklr', 
					  'label'=>'Tacklr Welcome', 
					  'caption'=>'Welcome to Tacklr World!!'),
				
		),
	));*/ 
	
?>
