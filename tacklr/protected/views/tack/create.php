<?php
/* @var $this TackController */

$this->breadcrumbs=array(
	'Tack'=>array('/tack'),
	'Create',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>Tack::model())); ?>
