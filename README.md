<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 Hashids</h1>
    <br>
</p>

[![Build Status](https://img.shields.io/travis/lichunqiang/hashids.svg?style=flat-square)](http://travis-ci.org/lichunqiang/hashids)
[![version](https://img.shields.io/packagist/v/light/hashids.svg?style=flat-square)](https://packagist.org/packages/light/hashids)
[![Download](https://img.shields.io/packagist/dt/light/hashids.svg?style=flat-square)](https://packagist.org/packages/light/hashids)
[![Issues](https://img.shields.io/github/issues/lichunqiang/hashids.svg?style=flat-square)](https://github.com/lichunqiang/hashids/issues)


__NOTE__: The master branch for 2.0 version, that require mini php version is 5.6. You can require `light/hashids:^1.0`to use old version.

## Installation

Install this package via [Composer](https://getcomposer.org/):

```
$ composer require light/hashids=^2.0
```

## Usage

### configurate is as a component

In your `main.php` or `web.php` (dependences your yii2 project constructor):

```
[
	'hahsids' => [
		'class' => 'light\hashids\Hashids',
		//'salt' => 'your salt',
		//'minHashLength' => 5,
		//'alphabet' => 'abcdefghigk'
	]
]
```

Also using this like this:

```
$hashids = Yii::createObject([
	'class' => 'light\hashids\Hashids'
]);

$id = $hashids->encode(1, 2, 3);
$numbers = $hashids->decode($id);
var_dump($id, $numbers);
```

## Test

```
$ phpunit
```

## Lisence

![MIT](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/lichunqiang/hashids/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

