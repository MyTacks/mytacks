<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>



<fieldset>
		<legend>Login</legend>
		<p>Please fill out the following form with your login credentials:</p>
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'horizontalForm',
			'type'=>'verticle',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			'htmlOptions'=>array('class'=>'well'),
			),
		)); ?>
	
		<p class="note">Fields with <span class="required">*</span> are required.</p>
			
			<?php echo $form->textFieldRow($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		    
		    <?php echo $form->passwordFieldRow($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
			</br>
			<p>
			<?php echo CHtml::link('Forget your password?',array('//user/recovery'));
				  echo ' | ';
			?>
			
			<?php echo CHtml::link('Register?',array('//user/create'));?>

			</p>
			
			</br>
			<?php echo $form->checkBoxRow($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
			</br>
		
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary', 'label'=>'Login')); ?>
			
			
			
	
</fieldset>
<?php $this->endWidget(); ?>



