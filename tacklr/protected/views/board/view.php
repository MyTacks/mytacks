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
$cs->registerScriptFile($baseUrl.'/js/ajaxScript.js');

// register tack css
$cs->registerCssFile($baseUrl.'/css/user_tack.css');
$cs->registerCssFile($baseUrl.'/css/board.css');
?>
<!-- Allow SoundCloud player -->
<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>

<?php

    $isOwner = false;

    $thisUser = User::model()->findByAttributes(array('userID'=>$model->userID)); 
    if($thisUser->username == Yii::app()->user->id)
    {
        $isOwner = true;
    }
    if($isOwner)
    {
        Tack::getCreatorModal($this, $model);
    }
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
<div class="board_title" align="center">
    <div class="tack_title">
    <?php echo $model->boardTitle; ?>
    </div>
    <div class="tack_content">
    <?php echo $model->description; 
        if($isOwner)
        {
            echo "<br/><br/>";
            $this->widget(
        'bootstrap.widgets.TbButton',
        array(
            'label' => 'Add Tack',
            'type' => 'primary',
            'htmlOptions' => array(
                'data-toggle' => 'modal',
                'data-target' => '#newTack',
                ''
            ),
        )
        );
        }
    ?>
    </div>
</div>

<?php
$board_in_db = Board::model()->findByAttributes(array('boardID'=>$model->boardID));
$BID = ($board_in_db['boardID']);

    $BID = $model->boardID;
    $tacks = Tack::model()->findAllByAttributes(array('boardID'=>(int)$BID));
?>

<div class = "thumbnail_frame" style="width:90% margin-top:10px align:center" >
        <ul class="thumbnails" style="width:90% margin-left:10px opacity:0.6">
            <?php foreach ($tacks as $tack): ?>
                <!--<li class="span4">    -->
                            <?php
                                $tackHtml = $tack->toHtml($isOwner);
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


<script type="text/javascript">

    $( document).ready(function() {
        $(".user_tack").draggable();
        $(".board_title").draggable();
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

    addfeedback = function($id) {
        $.post("test.php", $id, "a","b");
    }
</script>
