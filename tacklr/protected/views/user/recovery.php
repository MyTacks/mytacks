<?php
/* @var $this RecoveryFormController */
/* @var $model RecoveryForm */
/* @var $form CActiveForm */
?>
</br>
<div class="form">
<fieldset>
		<legend>Password Recovery</legend>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'recovery-form-recovery-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			'htmlOptions'=>array('class'=>'well'),
			),
		)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->textFieldRow($model,'email'); ?>
	</br>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary', 'label'=>'Submit')); ?>
	
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->
