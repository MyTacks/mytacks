<?php
/* @var $this TackController */
/* @var $model Tack */
/* @var $form CActiveForm */

// Include the client scripts
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerCoreScript('jquery');

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/tack_generator.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tack-form',
    'action'=>'/mytacks/tacklr/tack/create',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'tackName'); ?>
		<?php echo $form->textField($model,'tackName',array('size'=>60, 'maxLength'=>50)); ?>
		<?php echo $form->error($model,'tackName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackContent'); ?>
		<?php echo $form->textField($model,'tackContent',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tackContent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tackDescription'); ?>
		<?php echo $form->textArea($model,'tackDescription',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tackDescription'); ?>
	</div>

	<div class="row buttons">
		<?php var_dump($this); echo CHtml::submitButton( ($model->isNewRecord ? 'create' : 'Save'), array('type'=>'input','onclick'=>'js:adduser()')) ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

<script type="text/javascript">
    function adduser($user, $board) {
        var user = $("<input>")
            .attr("type", "hidden")
            .attr("name", "user").val($user);

        var board = $("<input>")
            .attr("type", "hidden")
            .attr("name", "user").val($board);

        $('#tack-form').append($(input));
    }
</script>