<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->boardID,
);
// allow jQuery
Yii::app()->clientScript->registerCoreScript('jquery');
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

// register js files
//$cs->registerScriptFile($baseUrl.'/js/jquery.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-1.10.2.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');

// register tack css
$cs->registerCssFile($baseUrl.'/css/user_tack.css');

$this->menu=array(
	array('label'=>'List Board', 'url'=>array('index')),
	array('label'=>'Create Board', 'url'=>array('create')),
	array('label'=>'Update Board', 'url'=>array('update', 'id'=>$model->boardID)),
	array('label'=>'Delete Board', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->boardID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Board', 'url'=>array('admin')),
    array('label'=>'New Tack', 'url'=>('/mytacks/tacklr/tack/create'))
);
?>

<?php
$board_in_db = Board::model()->findByAttributes(array('boardID'=>$model->boardID));
$BID = ($board_in_db['boardID']);

$tack_list = "";
$tack_list = Tack::model()->findAllByAttributes( array('boardID'=>(int)$BID));
?>
<h1>View Board #<?php echo $model->boardID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'boardID',
		'boardTitle',
		'userID',
		'categoryID',
		'description',
		'updateDate',
		'createDate',
	),
)); ?>
<div id="tacks">
    <p>tacks:</p>
    <?php
        foreach ($tack_list as $tack)
        {
            $tack_html = $tack->to_html();
            $tack_widget = $tack->get_widget();
            echo $tack_html['pre_content'];
            $this->widget($tack_widget['widget_type'], $tack_widget['widget_params']);
            //echo $tack_html['content'];
            echo $tack_html['post_content'];
        }
    ?>
</div>

<script type="text/javascript">
    $( document).ready(function() {
        $('.user_tack').draggable();
        $('.user_tack').resizable();
    });
</script>


<?php $this->beginWidget(
    'bootstrap.widgets.TbModal',
    array('id' => 'newTack')
); ?>


    <div class="modal-header" align="center">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>New tack</h4>
    </div>

    <div class="modal-body" align="center">
        <?php $this->renderPartial('../Tack/_form', array('model'=>new Tack)); ?>
    </div>
    <!--
    <div class="modal-footer">
       <?php /* $this->widget(
            'bootstrap.widgets.TbButton',
            array(
                'buttonType' => 'button',
                'type' => 'primary',
                'label' => 'Save changes',
                'url' => '/view/'
            )
        ); */?>
    </div>
    -->

<?php $this->endWidget(); ?>

<?php $this->widget(
    'bootstrap.widgets.TbButton',
    array(
        'label' => '+',
        'type' => 'primary',
        'htmlOptions' => array(
            'data-toggle' => 'modal',
            'data-target' => '#newTack',
        ),
    )
);
?>