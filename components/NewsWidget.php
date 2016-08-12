<?php

namespace app\components;
use yii;
use yii\base\Widget;
use app\models\News;
use yii\data\ActiveDataProvider;

class NewsWidget extends Widget {
    public function init () {
        parent::init();
    }

    public function run() {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find(),
            'pagination' => [
                'pagesize' => Yii::$app->config->get('pagesize_pagination'),
            ],
        ]);

        return $this->render('news', [
            'dataProvider' => $dataProvider,
        ]);
    }
}