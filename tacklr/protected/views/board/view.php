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
//$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4/ui/');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');
$cs->registerScriptFile('https://w.soundcloud.com/player/api.js');
//$cs->registerScriptFile($baseUrl.'/js/ajaxScript.js');

// register tack css
$cs->registerCssFile($baseUrl.'/css/user_tack.css');
?>

<!-- Allow SoundCloud player -->
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>

<?php
Tack::getCreatorModal($this, $model);
?>

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
                <!--<li class="span4">    -->
                            <?php
                                $tackHtml = $tack->toHtml($isOwner,$this,Yii::app()->user);
                                echo $tackHtml['preContent'];
                                // @todo: follow through with implementing each content type a widget
                                if($tack->has_widget())
                                {
                                    $this->widget($tackHtml['content']['widget_type'], $tackHtml['content']['widget_properties']);
                                }
                                else
                                {
                                    echo $tackHtml['content'];
                                }
                                echo $tackHtml['postContent'];
                                $tack->getFeedbackField($this, Yii::app()->user);
                            ?>
                <!--</li>-->
            <?php endforeach ?>
        </ul>
    </div>
</div>


<script type="text/javascript">

    $( document).ready(function() {
        $(".user_tack").draggable();
        $(".user_tack").resizable();    
    });

    maxZ = 1;
    $(".user_tack").mousedown(function setOnTop() {
        $(this).css("z-index", maxZ + 1);
        maxZ += 1;
    });

    $(".user_tack").dblclick(function() {
        $('tack_modal').modal('show');
    });

    $(".user_tack").mouseup(function() {
        //alert($(this).position().top + " " + $(this).position().left);
    });


    

    
</script>
