# Flysystem Extension for Yii 2

[![Code Quality](https://img.shields.io/scrutinizer/g/creocoder/yii2-flysystem/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/creocoder/yii2-flysystem/?branch=master)

This extension provides [Flysystem](http://flysystem.thephpleague.com/) integration for the Yii framework.
[Flysystem](http://flysystem.thephpleague.com/) is a filesystem abstraction which allows you to easily swap out a local filesystem for a remote one.

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
                    'path' => '@webroot/files',
                ],
                'null' => [
                    'class' => 'creocoder\flysystem\adapters\NullConnector',
                ],
                'zip' => [
                    'class' => 'creocoder\flysystem\adapters\ZipConnector',
                    'path' => '@webroot/files/archive.zip',
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

### Dropbox connector

Either run

```bash
$ php composer.phar require dropbox/dropbox-sdk:~1.1.1
```

or add

```
"dropbox/dropbox-sdk": "~1.1.1"
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
                'dropbox' => [
                    'class' => 'creocoder\flysystem\adapters\DropboxConnector',
                    'token' => 'your-token',
                    'app' => 'your-app',
                    // 'prefix' => 'your-prefix',
                ],
            ],
        ],
    ],
];
```

### Rackspace connector

Either run

```bash
$ php composer.phar require rackspace/php-opencloud:~1.10.0
```

or add

```
"rackspace/php-opencloud": "~1.10.0"
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
                'rackspace' => [
                    'class' => 'creocoder\flysystem\adapters\RackspaceConnector',
                    'endpoint' => 'your-endpoint',
                    'region' => 'your-region',
                    'username' => 'your-username',
                    'apiKey' => 'your-api-key',
                    'container' => 'your-container',
                    // 'prefix' => 'your-prefix',
                ],
            ],
        ],
    ],
];
```

## Usage

### Writing files

To write file

```php
Yii::$app->flysystem->write('filename.ext', 'contents');
```

### Updating files

To update file

```php
Yii::$app->flysystem->update('filename.ext', 'contents');
```

### Writing or updating files

To write or update file

```php
Yii::$app->flysystem->put('filename.ext', 'contents');
```

### Reading files

To read file

```php
$contents = Yii::$app->flysystem->read('filename.ext');
```

### Checking if a file exists

To check if a file exists

```php
$exists = Yii::$app->flysystem->has('filename.ext');
```

### Deleting files

To delete file

```php
Yii::$app->flysystem->delete('filename.ext');
```

### Reading and deleting files

To read and delete file

```php
$contents = Yii::$app->flysystem->readAndDelete('filename.ext');
```

### Renaming files

To rename file

```php
Yii::$app->flysystem->rename('filename.ext', 'newname.ext');
```

### Getting files mimetype

To get file mimetype

```php
$mimetype = Yii::$app->flysystem->getMimetype('filename.ext');
```

### Getting files timestamp

To get file timestamp

```php
$timestamp = Yii::$app->flysystem->getTimestamp('filename.ext');
```

### Getting files size

To get file size

```php
$timestamp = Yii::$app->flysystem->getSize('filename.ext');
```

### Creating directories

To create directory

```php
Yii::$app->flysystem->createDir('path/to/directory');
```

Directories are also made implicitly when writing to a deeper path

```php
Yii::$app->flysystem->write('path/to/filename.ext');
```

### Deleting directories

To delete directory

```php
Yii::$app->flysystem->deleteDir('path/to/filename.ext');
```
