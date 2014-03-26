<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->boardID,
);

$this->menu=array(
    array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Create Tack', 'url'=>('/mytacks/tacklr/tack/create')),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Create Board', 'url'=>array('create')),
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Update Board', 'url'=>array('update', 'id'=>$model->boardID)),
	array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Delete Board', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->boardID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Manage Board', 'url'=>array('admin')),
    array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'List Boards', 'url'=>array('index')),
);
?>

<h1>Board: <?php echo $model->boardTitle; ?></h1>

<?php

$BID = $model->boardID;
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
