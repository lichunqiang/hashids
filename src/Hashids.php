<?php

/*
 * This file is part of the light/hashids.
 *
 * (c) lichunqiang <light-li@hotmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace light\hashids;

use Hashids\Hashids as BaseHashids;
use yii\base\BaseObject;

/**
 * This is a wrapper for Hashids.
 *
 * @version 1.0.2
 *
 * @author lichunqiang<light-li@hotmail.com>
 * @license MIT
 */
class Hashids extends Object
{
    /**
     * The salt.
     *
     * @var string
     */
    public $salt;
    /**
     * The min hash length.
     *
     * @var int
     */
    public $minHashLength = 0;
    /**
     * The alphabet for hashids.
     *
     * @var string
     */
    public $alphabet;
    /**
     * The instance of the Hashids.
     *
     * @var Hashids\Hashids
     */
    private $_hashids;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->_hashids = new BaseHashids($this->salt, $this->minHashLength, $this->alphabet);
    }
    /**
     * {@inheritdoc}
     */
    public function __call($name, $params)
    {
        if (method_exists($this->_hashids, $name)) {
            return call_user_func_array([$this->_hashids, $name], $params);
        }

        return parent::__call($name, $params);
    }
}
