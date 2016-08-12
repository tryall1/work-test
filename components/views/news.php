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
            // Проверяем на статус пользователя и выводим ссылки на полный текст новости
            echo !Yii::$app->user->isGuest ? (
            Html::tag("p", Html::encode($model->preview).Html::a(" читать далее...", ['news/view', 'id' => $model->id]))) :
                (
               Html::tag("p", Html::encode($model->preview))
            );
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