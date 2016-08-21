<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
?>

<div class="news-index">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            echo Html::tag("h2", Html::encode($model->title));
            echo Html::tag("p", Html::encode($model->preview).Html::a(" readmore...", ['news/view', 'id' => $model->id]));
        },
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'prevPageLabel' => 'previous',
            'nextPageLabel' => 'next',
            'maxButtonCount' => 3,
        ],
    ]) ?>

</div>