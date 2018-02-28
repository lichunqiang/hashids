<?php

namespace light\tests\hashids;

use light\hashids\Hashids;
use light\tests\TestModel;
use PHPUnit\Framework\TestCase;

class HashidsBehaviorTest extends TestCase
{
    protected function setUp()
    {
        new \yii\web\Application([
            'id' => 'testApp',
            'basePath' => __DIR__,
            'components' => [
                'hashids' => [
                    'class' => Hashids::class,
                    'minHashLength' => 10,
                ],
            ],
        ]);
    }
    
    public function testGetHashid()
    {
        $model = new TestModel();
        
        $this->assertTrue(isset($model['hashid']));
        $this->assertTrue(isset($model->hashid));
        
        $this->assertEquals('jnegp26awZ', $model->getHashid());
    }
}
