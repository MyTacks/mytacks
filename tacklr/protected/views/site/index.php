<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

// register js files
$cs->registerScriptFile($baseUrl.'/js/jquery.js');
//$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4/ui/');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');
$cs->registerScriptFile('https://w.soundcloud.com/player/api.js');
$cs->registerCssFile($baseUrl.'/css/index.css');
//$cs->registerCssFile($baseUrl.'/css/board.css');
$cs->registerCssFile($baseUrl.'/css/user_tack.css');
?>

<div class="TacklrTack board_title">
<div class="tack_title" style="font-size:big">Tacklr</div>
<div class="tack_content">Welcome to tacklr!<br/>Below are some popular tacks!</div>
</div>
			
<?php

    $tacks = Tack::model()->findAll();
    $isOwner = false;
 ?>
<div class = "thumbnail_frame" style="width:90% margin-left:30px align:center" >
        <ul class="thumbnails" style="width:90% margin-left:30px opacity:0.6">
            <?php foreach ($tacks as $tack): ?>
                <!--<li class="span4">    -->
                            <?php
                            if(!is_null($tack->boardID) && $tack->get_type() != 'text')
                            {
                            	$tackHtml = $tack->toHtml($isOwner,true);
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
                            }
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
</script>
