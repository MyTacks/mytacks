<?php ?>
<h2> <?php echo 'Check your email to activate your account.'; ?> </h2>

<?php Yii::app()->clientScript->registerMetaTag("3;url={$returnUri}", null, 'refresh') ?>