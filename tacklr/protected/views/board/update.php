<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->boardID=>array('view','id'=>$model->boardID),
	'Update',
);

$this->menu=array(
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'List Board', 'url'=>array('index')),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Create Board', 'url'=>array('create')),
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'View Board', 'url'=>array('view', 'id'=>$model->boardID)),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Manage Board', 'url'=>array('admin')),
);
?>

<h1>Update Board <?php echo $model->boardID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>