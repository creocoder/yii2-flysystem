# Flysystem Extension for Yii 2

[![Code Quality](https://img.shields.io/scrutinizer/g/creocoder/yii2-flysystem/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/creocoder/yii2-flysystem/?branch=master)

This extension provides [Flysystem](http://flysystem.thephpleague.com/) integration for the Yii framework.
[Flysystem](http://flysystem.thephpleague.com/) is a filesystem abstraction which allows you to easily swap out a local filesystem for a remote one.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require creocoder/yii2-flysystem
```

or add

```
"creocoder/yii2-flysystem": "*"
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
                'ftp' => [
                    'class' => 'creocoder\flysystem\connectors\FtpConnector',
                    'host' => 'ftp.example.com',
                    // 'port' => 21,
                    // 'username' => 'your-username',
                    // 'password' => 'your-password',
                    // 'root' => '/path/to/root',
                    // 'passive' => false,
                    // 'ssl' => true,
                    // 'timeout' => 60,
                    // 'permPrivate' => 0700,
                    // 'permPublic' => 0744,
                    // 'transferMode' => FTP_TEXT,
                ],
                'local' => [
                    'class' => 'creocoder\flysystem\connectors\LocalConnector',
                    'path' => '@webroot/files',
                ],
                'null' => [
                    'class' => 'creocoder\flysystem\connectors\NullConnector',
                ],
            ],
        ],
    ],
];
```

### AWS S3 SDK v2 connector

Connector home: https://github.com/creocoder/yii2-flysystem-aws-s3-v2

Either run

```bash
$ composer require creocoder/yii2-flysystem-aws-s3-v2
```

or add

```
"creocoder/yii2-flysystem-aws-s3-v2": "*"
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
                    'class' => 'creocoder\flysystem\awss3v2\AwsS3Connector',
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

### AWS S3 SDK v3 connector

Connector home: https://github.com/creocoder/yii2-flysystem-aws-s3-v3

Either run

```bash
$ composer require creocoder/yii2-flysystem-aws-s3-v3
```

or add

```
"creocoder/yii2-flysystem-aws-s3-v3": "*"
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
                    'class' => 'creocoder\flysystem\awss3v3\AwsS3Connector',
                    'key' => 'your-key',
                    'secret' => 'your-secret',
                    'bucket' => 'your-bucket',
                    // 'region' => 'your-region',
                    // 'endpoint' => 'your-endpoint',
                    // 'prefix' => 'your-prefix',
                    // 'options' => [],
                ],
            ],
        ],
    ],
];
```

### Copy connector

Connector home: https://github.com/creocoder/yii2-flysystem-copy

Either run

```bash
$ composer require creocoder/yii2-flysystem-copy
```

or add

```
"creocoder/yii2-flysystem-copy": "*"
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
                'copy' => [
                    'class' => 'creocoder\flysystem\copy\CopyConnector',
                    'consumerKey' => 'your-consumer-key',
                    'consumerSecret' => 'your-consumer-secret',
                    'accessToken' => 'your-access-token',
                    'tokenSecret' => 'your-token-secret',
                    // 'prefix' => 'your-prefix',
                ],
            ],
        ],
    ],
];
```

### Dropbox connector

Connector home: https://github.com/creocoder/yii2-flysystem-dropbox

Either run

```bash
$ composer require creocoder/yii2-flysystem-dropbox
```

or add

```
"creocoder/yii2-flysystem-dropbox": "*"
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
                    'class' => 'creocoder\flysystem\dropbox\DropboxConnector',
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

Connector home: https://github.com/creocoder/yii2-flysystem-rackspace

Either run

```bash
$ composer require creocoder/yii2-flysystem-rackspace
```

or add

```
"creocoder/yii2-flysystem-rackspace": "*"
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
                    'class' => 'creocoder\flysystem\rackspace\RackspaceConnector',
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

### WebDAV connector

Connector home: https://github.com/creocoder/yii2-flysystem-webdav

Either run

```bash
$ composer require creocoder/yii2-flysystem-webdav
```

or add

```
"creocoder/yii2-flysystem-webdav": "*"
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
                'webdav' => [
                    'class' => 'creocoder\flysystem\webdav\WebDAVConnector',
                    'baseUri' => 'your-base-uri',
                    // 'userName' => 'your-user-name',
                    // 'password' => 'your-password',
                    // 'proxy' => 'your-proxy',
                    // 'authType' => \Sabre\DAV\Client::AUTH_BASIC,
                    // 'encoding' => \Sabre\DAV\Client::ENCODING_IDENTITY,
                    // 'prefix' => 'your-prefix',
                ],
            ],
        ],
    ],
];
```

### ZipArchive connector

Connector home: https://github.com/creocoder/yii2-flysystem-ziparchive

Either run

```bash
$ composer require creocoder/yii2-flysystem-ziparchive
```

or add

```
"creocoder/yii2-flysystem-ziparchive": "*"
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
                'zip' => [
                    'class' => 'creocoder\flysystem\ziparchive\ZipArchiveConnector',
                    'path' => '@webroot/files/archive.zip',
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

## Donating

Support this project and [others by creocoder](https://gratipay.com/creocoder/) via [gratipay](https://gratipay.com/creocoder/).

[![Support via Gratipay](https://cdn.rawgit.com/gratipay/gratipay-badge/2.3.0/dist/gratipay.svg)](https://gratipay.com/creocoder/)
