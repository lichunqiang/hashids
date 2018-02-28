<?php

namespace light\tests\hashids;

use light\hashids\Hashids;
use PHPUnit\Framework\TestCase;
use Yii;

class HashidsTest extends TestCase
{
    /**
     * @var Hashids
     */
    protected $hashids;
    
    /**
     * @throws \yii\base\InvalidConfigException
     */
    protected function setUp()
    {
        $this->hashids = Yii::createObject([
            'class' => Hashids::class,
        ]);
    }
    
    public function testEncode()
    {
        
        $id = $this->hashids->encode(1, 2, 3);
        
        $this->assertEquals('o2fXhV', $id);
        $this->assertEquals($this->hashids->decode($id), [1, 2, 3]);
    }
    
    public function testMultiEncode()
    {
        $this->assertEquals('o2fXhV', $this->hashids->encode(1, 2, 3));
        $this->assertEquals('o2fXhV', $this->hashids->encode('1', '2', '3'));
        $this->assertEquals('o2fXhV', $this->hashids->encode(['1', '2', '3']));
    }
    
    public function testPrimaryKeyEncode()
    {
        $encoded = $this->hashids->encode(1000012);
        
        $this->assertEquals('x73xr', $encoded);
        
        return $encoded;
    }
    
    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testUniqueEncodeResult()
    {
        $otherHashIds = Yii::createObject([
            'class' => Hashids::class,
            'salt' => 'test',
        ]);
        
        
        $this->assertNotEquals($this->hashids->encode(1), $otherHashIds->encode(1));
    }
    
    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function testAddPadding()
    {
        $otherHashIds = Yii::createObject([
            'class' => Hashids::class,
            'minHashLength' => 10,
        ]);
        
        $encode = $otherHashIds->encode(1);
        
        $this->assertNotEquals($this->hashids->encode(1), $encode);
        $this->assertEquals('VolejRejNm', $encode);
    }
    
    
    /**
     * @depends testPrimaryKeyEncode
     */
    public function testPrimaryKeyDecode($encoded)
    {
        $this->assertEquals([1000012], $this->hashids->decode($encoded));
    }
    
    /**
     * @param int $origin
     * @param string $encoded
     *
     * @dataProvider encodeProvider
     */
    public function testEncodePair($origin, $encoded)
    {
        $this->assertEquals($encoded, $this->hashids->encode($origin));
        
        $this->assertEquals([$origin], $this->hashids->decode($encoded));
    }
    
    /**
     * @return array
     */
    public function encodeProvider()
    {
        return [
            [1, 'jR'],
            [10000, 'gp26'],
        ];
    }
}
