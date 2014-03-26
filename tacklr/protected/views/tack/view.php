<?php
/* @var $this TackController */
/* @var $model Tack */

$this->breadcrumbs=array(
	'Tacks'=>array('index'),
	$model->tackID,
);

$this->menu=array(
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary','label'=>'List Tacks', 'url'=>array('index')),
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary','label'=>'Create Tack', 'url'=>array('create')),
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary','label'=>'Update Tack', 'url'=>array('update', 'id'=>$model->tackID)),
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary','label'=>'Delete Tack', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tackID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Tack', 'url'=>array('admin')),
    array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'List Boards', 'url'=>('/mytacks/tacklr/board/index')),
);
?>

<h1>Tack: #<?php echo $model->tackName; ?></h1>

<?php

    /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tackID',
		'userID',
		'boardID',
		'isPrivate',
		'tackName',
		'tackURL',
		'imageURL',
		'tackDescription',
		'updateDate',
		'createDate',
	),
));*/ ?>
