<?php
/* @var $this ChangePasswordFormController */
/* @var $model ChangePasswordForm */
/* @var $form CActiveForm */
?>

<div class="form">
<fieldset>
		<legend>Password Recovery</legend>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'change-password-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			'htmlOptions'=>array('class'=>'well'),
			),
		)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


		<?php echo $form->passwordFieldRow($model, 'password'); ?>
		<?php echo $form->passwordFieldRow($model, 'password_repeat');?>
	</br>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary', 'label'=>'Submit')); ?>
	
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->
