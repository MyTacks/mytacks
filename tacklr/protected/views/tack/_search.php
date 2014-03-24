<?php
/* @var $this TackController */
/* @var $model Tack */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'linkID'); ?>
		<?php echo $form->textField($model,'linkID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userID'); ?>
		<?php echo $form->textField($model,'userID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boardID'); ?>
		<?php echo $form->textField($model,'boardID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isPrivate'); ?>
		<?php echo $form->textField($model,'isPrivate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tackName'); ?>
		<?php echo $form->textArea($model,'tackName',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tackContent'); ?>
		<?php echo $form->textField($model,'tackContent',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tackImage'); ?>
		<?php echo $form->textField($model,'tackImage',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tackDescription'); ?>
		<?php echo $form->textArea($model,'tackDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updateDate'); ?>
		<?php echo $form->textField($model,'updateDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createDate'); ?>
		<?php echo $form->textField($model,'createDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->