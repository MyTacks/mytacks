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
?>

<h1>Boards</h1>
<div id='boards'>
    boards

</div>

<?php
$user_in_db = User::model()->findByAttributes(array('username'=>Yii::app()->user->getId()));
$UID = ($user_in_db['userID']);
//echo $UID;
$boards = Board::model()->findAllByAttributes( array('userID'=>(int)$UID));

foreach ($boards as $board)
{
    echo CHtml::button($board['boardTitle'], array('onclick' => 'js:document.location.href="board/view?&id='.$board['boardID'].'"'));
}
//echo 'make_new_tack(\'boards\',"'.$board['boardTitle'].'","'.$board['description'].'","'.$board['updateDate'].'");';
