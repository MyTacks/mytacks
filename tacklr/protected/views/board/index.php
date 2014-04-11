<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Boards',
);

$this->menu=array(
	array('label'=>'Create Board', 'url'=>array('create')),
	array('label'=>'Manage Board', 'url'=>array('admin')),
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


//Yii::import('extensions/Yiitube');
?>

<h1 xmlns="http://www.w3.org/1999/html">Boards</h1>
<div id='boards'>

</div>

<?php
// Get the boards from the user in the DB...
$user_in_db = User::model()->findByAttributes(array('username'=>Yii::app()->user->getId()));
$UID = ($user_in_db['userID']);
//echo $UID;
$boards = Board::model()->findAllByAttributes( array('userID'=>(int)$UID));


?>
<div class="row">
    <div class="span12">
        <ul class="thumbnails">
<?php
foreach ($boards as $board)
{
    //echo CHtml::button($board['boardTitle'], array('onclick' => 'js:document.location.href="board/view?&id='.$board['boardID'].'"'));
    ?>
    <li class="span4">
       <!-- <div class="col-sm-6 col-md-3"> -->
            <a href="board/view?&id=<?php echo $board['boardID']; ?>" class="thumbnail">
                <!-- <img src="holder.js/300x200" alt=""> -->
                <div class="caption">
                    <h3> <?php echo $board['boardTitle'] ?></h3>
                </div>
            </a>
        <!-- </div> -->
    </li>
<?php
}

?>
            </ul>
        </div>
    </div>
