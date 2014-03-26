<?php
/* @var $this TackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tacks',
);

$this->menu=array(
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary','label'=>'Create Tack', 'url'=>array('create')),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary','label'=>'Manage Tack', 'url'=>array('admin')),
    array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'View Boards', 'url'=>('/mytacks/tacklr/board/index'))
);
?>

<h1>Tacks</h1>

<?php
    $board_in_db = Board::model()->findAttributes(array('boardTitle'=>Yii::app()->tack->getId()));
    $BID = ($board_in_db['boardID']);
    //$BID = '2';
    $tacks = Tack::model()->findAllByAttributes(array('boardID'=>(int)$BID));

?>
<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <?php
            foreach ($tacks as $tack)
            {
                ?>
                <li class="span4">
                    <a href="tack/view?&id=<?php echo $tack['tackID']; ?>" class="thumbnail">
                        <div class="caption">
                            <h3> <?php echo $tack['tackName'] ?></h3>
                        </div>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>