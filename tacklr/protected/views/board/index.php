<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Boards',
);

$user = Yii::app()->user->checkAccess('admin');
echo ($user);
//if($user->groupID == 1)
{
    $this->menu=array(
        array('label'=>'Create Board', 'url'=>array('create')),
        array('label'=>'Manage Board', 'url'=>array('admin')),
    );
}
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


<?php
// Get the boards from the user in the DB...
$user_in_db = User::model()->findByAttributes(array('username'=>Yii::app()->user->getId()));
$UID = ($user_in_db['userID']);
//echo $UID;
$boards = Board::model()->findAllByAttributes( array('userID'=>(int)$UID));

$board_list = "";
foreach ($boards as $board)
{
    $board_list = $board_list . CHtml::button($board['boardTitle'], array('onclick' => 'js:document.location.href="view?&id='.$board['boardID'].'"'));
}

//echo 'make_new_tack(\'boards\',"'.$board['boardTitle'].'","'.$board['description'].'","'.$board['updateDate'].'");';
?>
<h1>Boards</h1>
<div id='boards'>
    <p>boards:</p>
    <?php echo $board_list; ?>
</div>
