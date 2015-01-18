# Flysystem Extension for Yii 2

[![PayPal Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DU3XEJTE665EU)
[![Code Quality](https://img.shields.io/scrutinizer/g/creocoder/yii2-flysystem/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/creocoder/yii2-flysystem/?branch=master)

This extension provides [Flysystem](http://flysystem.thephpleague.com/) integration for the Yii framework.

*This extension is under heavy development and not yet ready for production use...*

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

Configure `flysystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'flysystem' => [
            'class' => 'creocoder\flysystem\FlysystemManager',
            'default' => 'local',
            'connectors' => [
                //...
                'local' => [
                    'class' => 'creocoder\flysystem\adapters\LocalConnector',
                    'root' => '@webroot/files',
                ],
                'null' => [
                    'class' => 'creocoder\flysystem\adapters\NullConnector',
                ],
                'zip' => [
                    'class' => 'creocoder\flysystem\adapters\ZipConnector',
                    'location' => '@webroot/files/archive.zip',
                ],
            ],
        ],
    ],
];
```

### Amazon S3 connector

Either run

```bash
$ php composer.phar require aws/aws-sdk-php:~2.4
```

or add

```
"aws/aws-sdk-php": "~2.4"
```

to the `require` section of your `composer.json` file and configure `connectors` as follows

```php
return [
    //...
    'components' => [
        //...
        'flysystem' => [
            //...
            'connectors' => [
                //...
                'awss3' => [
                    'class' => 'creocoder\flysystem\adapters\AwsS3Connector',
                    'key' => 'your-key',
                    'secret' => 'your-secret',
                    'bucket' => 'your-bucket',
                    // 'region' => 'your-region',
                    // 'baseUrl' => 'your-base-url',
                    // 'prefix' => 'your-prefix',
                    // 'options' => [],
                ],
            ],
        ],
    ],
];
```

## Usage

TBD.
