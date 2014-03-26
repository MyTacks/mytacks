<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Board'=>array('index'),
	'Create',
);

$this->menu=array(
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'List Boards', 'url'=>array('index')),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Manage Board', 'url'=>array('admin')),
);
?>

<h1>Create Board</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>