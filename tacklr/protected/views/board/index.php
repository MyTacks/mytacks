<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Boards',
);

$this->menu=array(
	array('label'=>'Create Board', 'url'=>array('create')),
);
?>
<?php
Yii::app()->clientScript->registerCoreScript('jquery');
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/jquery-1.10.2.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');
$cs->registerScriptFile($baseUrl.'/js/tack_generator.js');
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$cs->registerCssFile($baseUrl.'/css/user_tack.css');
$cs->registerCssFile($baseUrl.'/css/board.css');


//Yii::import('extensions/Yiitube');
?>
<div class="board_title" align="center">
    <div class="tack_title">
    Boards
    </div>
    <div class="tack_content">
    Boards that belong to <?php echo Yii::app()->user->getId(); ?>
    </div>
</div>

<?php
// Get the boards from the user in the DB...
$user_in_db = User::model()->findByAttributes(array('username'=>Yii::app()->user->getId()));
$UID = ($user_in_db['userID']);
$boards = Board::model()->findAllByAttributes(array('userID'=>(int)$UID));
?>


<div class = "thumbnail_frame" style="width:90% margin-left:10px align:center" >
        <ul class="thumbnails">
            <?php foreach ($boards as $board): ?>
                <li class="span4">
                    <div class="drag">
                        <div class="">

                            <div class="user_tack">
                                <a href="/mytacks/tacklr/board/view/id/<?php echo $board['boardID']; ?>">
                                    <div class="tack_title"><?php echo $board['boardTitle'] ?></div>
                                    <div class="tack_content"><?php echo $board['description'] ?></div>
                                    </a>

                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
</div>

<script type="text/javascript">

    $( document).ready(function() {
        $(".user_tack").draggable();
        $(".board_title").draggable();
        $(".tack_content").resizable(); 
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