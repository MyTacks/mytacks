<?php
/* @var $this TackController */
/* @var $model Tack */

$this->breadcrumbs=array(
	'Tacks'=>array('index'),
	$model->tackID=>array('view','id'=>$model->tackID),
	'Update',
);

$this->menu=array(
	array('label'=>'View Tack', 'url'=>array('view', 'id'=>$model->tackID)),
    array('label'=>'List Boards', 'url'=>('/mytacks/tacklr/board/index'))
);
?>

<h1>Update Tack <?php echo $model->tackID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>