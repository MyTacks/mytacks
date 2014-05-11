<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<?php
		echo Yii::app()->bootstrap->registerAllCss();
		echo Yii::app()->bootstrap->registerCoreScripts();
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!--<script src="http://threedubmedia.com/inc/js/jquery-1.7.2.js"></script>
    <script src="http://threedubmedia.com/inc/js/jquery.event.drag-2.2.js"></script>
    <script src="http://threedubmedia.com/inc/js/jquery.event.drag.live-2.2.js"></script>
    <script type="text/javascript">
        jQuery(function($){
            $('.drag').drag(function( ev, dd ){
                    $( this ).css({
                        top: dd.offsetY,
                        left: dd.offsetX
                    });
                });
        });
    </script>

    <style type="text/css">
        .drag {
            position: absolute;
            width: 4in;
            cursor: cell;
        }
    </style>-->
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	    
	<?php
	$this->widget('bootstrap.widgets.TbNavbar', array(
	    'type'=> null ,
	    'brand'=>'Tacklr',
	    'brandUrl'=> array('/site/index'),
	    'collapse'=>true, // requires bootstrap-responsive.css
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
            array('class'=>'bootstrap.widgets.TbButton', 'type'=>'primary', 'label'=>'Boards', 'url'=>array('/board'), 'visible'=>!Yii::app()->user->isGuest)
	    ),
	)); 
	?>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->

</body>
</html>
