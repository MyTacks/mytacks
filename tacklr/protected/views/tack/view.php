<?php
/* @var $this TackController */
/* @var $model Tack */

$this->breadcrumbs=array(
	'Tacks'=>array('index'),
	$model->tackID,
);

$this->menu=array(
	array('label'=>'List Tacks', 'url'=>array('board/view', 'id'=>$model->boardID)),
	array('label'=>'Create Tack', 'url'=>array('create')),
	array('label'=>'Update Tack', 'url'=>array('update', 'id'=>$model->tackID)),
	array('label'=>'Delete Tack', 'url'=>array('delete', 'id'=>$model->tackID)),
    array('label'=>'List Boards', 'url'=>array('board/index')),
);
?>

<h1>Manage Tack: <?php echo $model->tackName; ?></h1>

<div class="span4">
    <div class="thumbnail">
        <img src="<?php echo $model->imageURL; ?>">
        <div class="caption">
            <h3> <?php echo $model->tackName; ?></h3>
            <p><?php echo $model->tackDescription; ?></p>
            <a href="<?php echo $model->tackURL; ?>"><h5>Link</h5></a>
        </div>
    </div>
</div>