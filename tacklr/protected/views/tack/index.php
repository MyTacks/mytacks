<?php
/* @var $this TackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Tacks'=>array('index'),
);

$this->menu=array(
	array('label'=>'Create Tack', 'url'=>array('create')),
    array('label'=>'View Boards', 'url'=>('/mytacks/tacklr/board/index'))
);
?>

<h1>Tacks</h1>

<?php

    //$TID = $model->tackID;
    //$tacks = Tack::model()->findAllByAttributes(array('boardID'=>(int)$BID));

?>

<!-- <h1><?php  ?></h1>

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <?php /*
            foreach ($tacks as $tack)
            {
                ?>
                <li class="span4">
                    <a href="view?&id=<?php echo $tack['tackID']; ?>" class="thumbnail">
                        <div class="caption">
                            <h3> <?php echo $tack['tackName'] ?></h3>
                        </div>
                    </a>
                </li>
            <?php
            }*/
            ?>
        </ul>
    </div>
</div> -->