<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Boards',
);

$this->menu=array(
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary' ,'label'=>'Create Board', 'url'=>array('create')),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Manage Board', 'url'=>array('admin')),
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
?>

<h1 xmlns="http://www.w3.org/1999/html">Boards</h1>
<div id='boards'>

</div>

<?php
$user_in_db = User::model()->findByAttributes(array('username'=>Yii::app()->user->getId()));
$UID = ($user_in_db['userID']);
//echo $UID;
$boards = Board::model()->findAllByAttributes(array('userID'=>(int)$UID));
?>

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
<?php
foreach ($boards as $board)
{
    ?>
        <li class="span4">
            <a href="board/view?&id=<?php echo $board['boardID']; ?>" class="thumbnail">
                <div class="caption">
                    <h3> <?php echo $board['boardTitle'] ?></h3>
                </div>
            </a>
        </li>
<?php
}
?>
        </ul>
    </div>
</div>