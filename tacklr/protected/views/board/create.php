<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Board'=>array('index'),
	'Create',
);

$this->menu=array(
	array( 'label'=>'List Boards', 'url'=>array('index')),
);
?>

<h1>Create Board</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>