<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/boardlayout'); ?>
<div class="span-12">
	<div class="sidebar">
	<?php
		$this->beginWidget('bootstrap.widgets.TbNavbar', array(
            'type'=>null,
            'collapse'=>true,
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'htmlOptions'=>array('class'=>'pull-left'),
                    'items'=>$this->menu,
                ),
                array(
                    'class'=>'bootstrap.widgets.TbButton',
                    'htmlOptions'=>array('class'=>'pull-right'),
                    'label'=>'Logout ('.Yii::app()->user->name.')',
                    'url'=>array('/site/logout'),
                    'visible'=>!Yii::app()->user->isGuest)
            ),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="tacks_container" style="margin:30px">
    <div class="content">
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>