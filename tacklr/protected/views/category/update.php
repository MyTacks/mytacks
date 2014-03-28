<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->categoryID=>array('view','id'=>$model->categoryID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->categoryID)),
	//array('label'=>'Manage Category', 'url'=>array('admin')),
    array('label'=>'View Boards', 'url'=>('/mytacks/tacklr/board/index'))
);
?>

<h1>Update Category <?php echo $model->categoryID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>