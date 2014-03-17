<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">


<?php 

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
		),
));

 ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model, 'firstName'); ?>
		<?php echo $form->textFieldRow($model, 'lastName'); ?>
		<?php echo $form->textFieldRow($model, 'username'); ?>
		<?php echo $form->passwordFieldRow($model, 'password'); ?>
		<?php echo $form->passwordFieldRow($model, 'password_repeat');?>
		<?php echo $form->fileFieldRow($model, 'imageURL'); ?>
		<?php echo $form->dropDownListRow($model, 'gender', array('Male','Female')); ?>
		<?php echo $form->textFieldRow($model, 'DOB', array('labelOptions'=>array('label'=>'Day of Birth'))); ?>
		<?php echo $form->textFieldRow($model,'email'); ?>
		<?php echo $form->textFieldRow($model,'telephone'); ?>	
		
	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Create')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->