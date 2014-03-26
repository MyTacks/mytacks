<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-12">
	<div class="sidebar">
	<?php
		//$this->beginWidget('zii.widgets.CPortlet', array(
		//	'title'=>'Operations',
		//));
		$this->beginWidget('bootstrap.widgets.TbNavbar', array(
            'type'=>null,
            'collapse'=>true,
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'htmlOptions'=>array('class'=>'pull-left'),
                    'items'=>$this->menu,
                )
            ),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="span-10">
    <div class="content">
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>