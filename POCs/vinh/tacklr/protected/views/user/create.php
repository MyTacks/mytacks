<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

?>

<div class="form">
	<fieldset>
			<legend>Create User</legend>
	
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</fieldset>
</div><!-- form -->