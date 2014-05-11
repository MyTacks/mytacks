<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/indexlayout'); ?>
<div class="span-12">
	<div class="sidebar">
	<?php
		$this->beginWidget('bootstrap.widgets.TbNavbar', array(
            'type'=>null,
            'collapse'=>true,
            'items'=> array(
            array(
                'class'=>'bootstrap.widgets.TbMenu',
                'htmlOptions'=>array('class'=>'pull-right'),
                'items'=>array(
                    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Edit Profile', 'url'=>array('/user/UpdateProfile', 'id'=>Yii::app()->user->getId()),'visible'=>!Yii::app()->user->isGuest)
                ),
            ),
            array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Boards', 'url'=>array('/board'), 'visible'=>!Yii::app()->user->isGuest,'htmlOptions'=>array('style'=>'float:left'))

        ),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<div class="tacks_container" style="margin-left:100px padding-top:30px">
    <div class="content">
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>
