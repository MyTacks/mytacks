<?php
/* @var $this TackController */
/* @var $model Tack */

$this->breadcrumbs=array(
	'Tacks'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'List Tacks', 'url'=>array('index')),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Manage Tack', 'url'=>array('admin')),
    array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'View Boards', 'url'=>('/mytacks/tacklr/board/index'))
);
?>

<h1>Create Tack</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>