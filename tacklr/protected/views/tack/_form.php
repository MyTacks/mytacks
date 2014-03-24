<?php
/* @var $this TackController */
/* @var $model Tack */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tack-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'tackName'); ?>
		<?php echo $form->textArea($model,'tackName',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tackName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackContent'); ?>
		<?php echo $form->textField($model,'tackContent',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tackContent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackDescription'); ?>
		<?php echo $form->textArea($model,'tackDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tackDescription'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'saveState' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->