<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->boardID,
);
// allow jQuery
//Yii::app()->clientScript->registerCoreScript('jquery');
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

// register js files
$cs->registerScriptFile($baseUrl.'/js/jquery.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');

// register tack css
$cs->registerCssFile($baseUrl.'/css/user_tack.css');
?>

<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'newTack')
); ?>

<div class="modal-header" align="center">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>New tack</h4>
    <?php
        $new_tack = new Tack(null);
    ?>
</div>

<div class="modal-body" align="center">
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'tack-form',
            'action'=>'/mytacks/tacklr/tack/create/',
            'method'=>'post',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($new_tack); ?>


        <div class="row">
            <?php echo $form->labelEx($new_tack,'tackName'); ?>
            <?php echo $form->textField($new_tack,'tackName',array('size'=>60, 'maxLength'=>50)); ?>
            <?php echo $form->error($new_tack,'tackName'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($new_tack,'tackURL'); ?>
            <?php echo $form->textField($new_tack,'tackURL',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($new_tack,'tackURL'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($new_tack,'tackDescription'); ?>
            <?php echo $form->textArea($new_tack,'tackDescription',array('rows'=>3, 'cols'=>50)); ?>
            <?php echo $form->error($new_tack,'tackDescription'); ?>
        </div>
        <div class="hidden">
            <?php echo $form->hiddenField($new_tack, 'userID', array('value'=>$model->userID)); ?>
            <?php echo $form->hiddenField($new_tack, 'boardID', array('value'=>$model->boardID)); ?>
            <?php echo $form->hiddenField($new_tack, 'isPrivate', array('value'=>0)); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton( ($new_tack->isNewRecord ? 'create' : 'Save'), array('boardID'=>$model->boardID,'userID'=>$model->userID)); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->

<!---
<div class="modal-footer" align="center">
    <?php /*$this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Save Tack',
            'url' => array('/view/', 'save', 'tack'=>$new_tack)
        )
    ); */?>

</div>
-->
<?php $this->endWidget(); ?>

<?php
$this->menu=array(
	array('label'=>'Update Board', 'url'=>array('update', 'id'=>$model->boardID)),
	array('label'=>'Delete Board', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->boardID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Board', 'url'=>array('admin')),
    array('label'=>'Delete Board', 'url'=>array('delete', 'id'=>$model->boardID)),
    array('label'=>'List Boards', 'url'=>array('index')),
    //array('label'=>'New Tack', 'url'=>array('#', 'htmlOptions'=>array('data-target' => 'newTack')))
);
?>
<div id="create_tack" align="right">

</div>

<h1 align="center">
    <?php echo $model->boardTitle; ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'label' => 'Add Tack',
            'type' => 'primary',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#newTack',
            ),
        )
    );
    ?>
</h1>

<?php

$BID = $model->boardID;
$tacks = Tack::model()->findAllByAttributes(array('boardID'=>(int)$BID));
$isOwner = false;
if(User::model()->findByAttributes(array('userID'=>$model->userID))->username == Yii::app()->user->id)
{
    $isOwner = true;
}
?>

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <?php foreach ($tacks as $tack): ?>
                <li class="span4">
                    <div class="drag">
                        <div class="thumbnail">
                            <?php
                                $tackHtml = $tack->toHtml($isOwner);
                                echo $tackHtml['preContent'];
                                if($tack->has_widget())
                                {
                                    $this->widget($tackHtml['content']['widget_type'], $tackHtml['content']['widget_properties']);
                                }
                                else
                                {
                                    echo $tackHtml['content'];
                                }
                                echo $tackHtml['postContent'];
                            ?>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<script type="text/javascript">

    $( document).ready(function() {
        $('.drag').draggable();
        $('.drag').resizable();
    });

    maxZ = 1;
    $(".user_tack").click(function setOnTop() {
        $(this).css("z-index", maxZ + 1);
        maxZ += 1;
    });
</script>
