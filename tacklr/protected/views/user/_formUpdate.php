<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form_tack">
		<div class="tack_title">Update Profile</div>

<?php 
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'vertical',
		'enableAjaxValidation'=>true,
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
		),
		'htmlOptions'=>array('class'=>'tack_content'),
));

 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model, 'username',array('readonly'=>true)); ?>
		<?php echo $form->passwordFieldRow($model, 'password'); ?>
		<?php echo $form->textFieldRow($model,'email',array('readonly'=>true)); ?>

	</br> </br>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Update')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'cancel', 'label'=>'Cancel','url'=>Yii::app()->request->urlReferrer)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->