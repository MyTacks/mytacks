<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->categoryID,
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	//array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'Update Category', 'url'=>array('update', 'id'=>$model->categoryID)),
	array('label'=>'Delete Category', 'url'=>('/mytacks/tacklr/category/delete?&id='.$model->categoryID)),
	//array('label'=>'Manage Category', 'url'=>array('admin')),
    array('label'=>'View Boards', 'url'=>('/mytacks/tacklr/board/index'))
);
?>

<h1>View Category #<?php echo $model->categoryID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'categoryID',
		'categoryName',
		'description',
		'updateDate',
		'createDate',
	),
)); ?>
