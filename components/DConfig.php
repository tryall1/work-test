<?php

namespace app\components;

use yii;
use yii\base\Component;
use yii\base\Exception;
use app\models\Config;

class DConfig extends Component
{
    protected $data = array();

    public function init()
    {
        $items = Config::find()->All();
        foreach ($items as $item){
            if ($item->param)
                $this->data[$item->param] = $item->value === '' ?  $item->default : $item->value;
        }
        parent::init();
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->data)){
            return $this->data[$key];
        } else {
            throw new Exception('Undefined parameter '.$key);
        }
    }

    public function set($key, $value)
    {
        $model = Config::findByAttributes(array('param'=>$key));
        if (!$model)
            throw new Exception('Undefined parameter '.$key);

        $this->data[$key] = $value;
        $model->value = $value;
        $model->save();
    }
}