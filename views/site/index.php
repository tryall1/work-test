<?php

/* @var $this yii\web\View */

use app\components\NewsWidget;
$this->title = 'Добро пожаловать';
?>
<div class="site-index">

        <?php echo NewsWidget::widget(); ?>

    </div>
</div>
