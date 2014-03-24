<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->boardID,
);

$this->menu=array(
	array('label'=>'List Board', 'url'=>array('index')),
	array('label'=>'Create Board', 'url'=>array('create')),
	array('label'=>'Update Board', 'url'=>array('update', 'id'=>$model->boardID)),
	array('label'=>'Delete Board', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->boardID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Board', 'url'=>array('admin')),
    array('label'=>'New Tack', 'url'=>('/mytacks/tacklr/tack/create'))
);
?>

<h1>View Board #<?php echo $model->boardID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'boardID',
		'boardTitle',
		'userID',
		'categoryID',
		'description',
		'updateDate',
		'createDate',
	),
)); ?>
