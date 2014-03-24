<?php
/* @var $this TackController */
/* @var $model Tack */

$this->breadcrumbs=array(
	'Tacks'=>array('index'),
	$model->tackID,
);

$this->menu=array(
	array('label'=>'List Tack', 'url'=>array('index')),
	array('label'=>'Create Tack', 'url'=>array('create')),
	array('label'=>'Update Tack', 'url'=>array('update', 'id'=>$model->linkID)),
	array('label'=>'Delete Tack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->linkID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tack', 'url'=>array('admin')),
);
?>

<h1>View Tack #<?php echo $model->linkID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tackID',
		'userID',
		'boardID',
		'isPrivate',
		'tackName',
		'tackContent',
		'tackImage',
		'tackDescription',
		'updateDate',
		'createDate',
	),
)); ?>
