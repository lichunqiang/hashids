<?php


namespace light\tests;

use light\hashids\HashidsBehavior;
use yii\base\Model;

class TestModel extends Model
{
    public $id = 10000;
    
    public function getPrimaryKey()
    {
        return 'id';
    }
    
    public function behaviors()
    {
        return [
            'hashid' => [
                'class' => HashidsBehavior::class,
            ],
        ];
    }
}
