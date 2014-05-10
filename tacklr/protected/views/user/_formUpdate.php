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

		<?php echo $form->textFieldRow($model, 'username',array('readonly'=>true)); ?>
		<?php echo $form->passwordFieldRow($model, 'password'); ?>
		<?php echo $form->passwordFieldRow($model, 'password_repeat');?>
		<?php echo $form->textFieldRow($model,'email'); ?>

		
	<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Update')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'cancel', 'label'=>'Cancel','url'=>Yii::app()->request->urlReferrer)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->