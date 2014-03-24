<?php
/* @var $this TackController */
/* @var $model Tack */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tack-tack-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tackName'); ?>
		<?php echo $form->textField($model,'tackName'); ?>
		<?php echo $form->error($model,'tackName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackContent'); ?>
		<?php echo $form->textField($model,'tackContent'); ?>
		<?php echo $form->error($model,'tackContent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackDescription'); ?>
		<?php echo $form->textField($model,'tackDescription'); ?>
		<?php echo $form->error($model,'tackDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updateDate'); ?>
		<?php echo $form->textField($model,'updateDate'); ?>
		<?php echo $form->error($model,'updateDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'boardID'); ?>
		<?php echo $form->textField($model,'boardID'); ?>
		<?php echo $form->error($model,'boardID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isPrivate'); ?>
		<?php echo $form->textField($model,'isPrivate'); ?>
		<?php echo $form->error($model,'isPrivate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userID'); ?>
		<?php echo $form->textField($model,'userID'); ?>
		<?php echo $form->error($model,'userID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackImage'); ?>
		<?php echo $form->textField($model,'tackImage'); ?>
		<?php echo $form->error($model,'tackImage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createDate'); ?>
		<?php echo $form->textField($model,'createDate'); ?>
		<?php echo $form->error($model,'createDate'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->