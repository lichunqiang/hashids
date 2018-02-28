<?php

namespace light\hashids;

use yii\base\Behavior;
use yii\di\Instance;

/**
 *
 * @property \yii\db\BaseActiveRecord $owner owner ActiveRecord instance.
 *
 * @author lichunqiang <light-li@hotmail.com>
 * @since 2.0.0
 */
class HashidsBehavior extends Behavior
{
    /**
     * @var string|array|Hashids The `hashids` component
     */
    public $hashids = 'hashids';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        $this->hashids = Instance::ensure($this->hashids, Hashids::class);
    }
    
    /**
     * @return string
     */
    public function getHashid()
    {
        $primaryKey = $this->owner->getPrimaryKey();
        
        return $this->hashids->encode($this->owner->{$primaryKey});
    }
    
}
