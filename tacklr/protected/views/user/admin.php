<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
</br>
<h1>Manage Users</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'userID',
		'groupID',
		'username',
		'password',
		'email',
		'telephone',
		'active',
		'updateDate',
		'joinDate',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}{view}{delete}',
			'buttons'=>array(
					'update'=>array('visible'=>'true',),
					'view'=>array('visible'=>'false',),
					'delete'=>array('visible'=>'false',),
			),
		),
	),
)); ?>
