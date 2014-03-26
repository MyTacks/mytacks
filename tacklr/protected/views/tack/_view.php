<?php
/* @var $this TackController */
/* @var $data Tack */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tackID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tackID), array('view', 'id'=>$data->tackID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('boardID')); ?>:</b>
	<?php echo CHtml::encode($data->boardID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isPrivate')); ?>:</b>
	<?php echo CHtml::encode($data->isPrivate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tackName')); ?>:</b>
	<?php echo CHtml::encode($data->tackName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tackURL')); ?>:</b>
	<?php echo CHtml::encode($data->tackURL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imageURL')); ?>:</b>
	<?php echo CHtml::encode($data->imageURL); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tackDescription')); ?>:</b>
	<?php echo CHtml::encode($data->tackDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateDate')); ?>:</b>
	<?php echo CHtml::encode($data->updateDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	*/ ?>

</div>