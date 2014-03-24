<?php
/* @var $this TackController */
/* @var $data Tack */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->linkID), array('view', 'id'=>$data->linkID)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('tackContent')); ?>:</b>
	<?php echo CHtml::encode($data->tackContent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tackImage')); ?>:</b>
	<?php echo CHtml::encode($data->tackImage); ?>
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