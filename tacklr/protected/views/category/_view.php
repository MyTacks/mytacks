<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoryName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->categoryName), array('view', 'id'=>$data->categoryID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br /><br /><br />


</div>