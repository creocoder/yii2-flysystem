# Flysystem Extension for Yii 2

This extension provides [Flysystem](http://flysystem.thephpleague.com/) integration for the Yii framework.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ php composer.phar require creocoder/yii2-flysystem:dev-master
```

or add

```
"creocoder/yii2-flysystem": "dev-master"
```

to the `require` section of your `composer.json` file.

## Configuring

Configure flysystem application component as follows

```php
return [
    //...
    'components' => [
        //...
        'flysystem' => [
            'class' => 'creocoder\flysystem\FlysystemManager',
            'default' => 'local',
            'connectors' => [
                'local' => [
                    'class' => 'creocoder\flysystem\adapters\LocalConnector',
                    'path' => '@webroot/files',
                ],
                'null' => [
                    'class' => 'creocoder\flysystem\adapters\NullConnector',
                ],
                'zip' => [
                    'class' => 'creocoder\flysystem\adapters\ZipConnector',
                    'path' => '@webroot/files',
                ],
            ],
        ],
    ],
];
```

## Usage

TBD.
