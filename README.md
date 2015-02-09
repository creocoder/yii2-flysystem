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

### Local filesystem

Configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@webroot/files',
        ],
    ],
];
```

### FTP filesystem

Configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\FtpFilesystem',
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
    ],
];
```

### NULL filesystem

Configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\NullFilesystem',
        ],
    ],
];
```

### AWS S3 SDK v2 filesystem

Filesystem home: https://github.com/creocoder/yii2-flysystem-aws-s3-v2

Either run

```bash
$ composer require creocoder/yii2-flysystem-aws-s3-v2
```

or add

```
"creocoder/yii2-flysystem-aws-s3-v2": "*"
```

to the `require` section of your `composer.json` file and configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\awss3v2\AwsS3Filesystem',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'bucket' => 'your-bucket',
            // 'region' => 'your-region',
            // 'baseUrl' => 'your-base-url',
            // 'prefix' => 'your-prefix',
            // 'options' => [],
        ],
    ],
];
```

### AWS S3 SDK v3 filesystem

Filesystem home: https://github.com/creocoder/yii2-flysystem-aws-s3-v3

Either run

```bash
$ composer require creocoder/yii2-flysystem-aws-s3-v3
```

or add

```
"creocoder/yii2-flysystem-aws-s3-v3": "*"
```

to the `require` section of your `composer.json` file and configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\awss3v3\AwsS3Filesystem',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'bucket' => 'your-bucket',
            // 'region' => 'your-region',
            // 'endpoint' => 'your-endpoint',
            // 'prefix' => 'your-prefix',
            // 'options' => [],
        ],
    ],
];
```

### Copy filesystem

Filesystem home: https://github.com/creocoder/yii2-flysystem-copy

Either run

```bash
$ composer require creocoder/yii2-flysystem-copy
```

or add

```
"creocoder/yii2-flysystem-copy": "*"
```

to the `require` section of your `composer.json` file and configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\copy\CopyFilesystem',
            'consumerKey' => 'your-consumer-key',
            'consumerSecret' => 'your-consumer-secret',
            'accessToken' => 'your-access-token',
            'tokenSecret' => 'your-token-secret',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### Dropbox filesystem

Filesystem home: https://github.com/creocoder/yii2-flysystem-dropbox

Either run

```bash
$ composer require creocoder/yii2-flysystem-dropbox
```

or add

```
"creocoder/yii2-flysystem-dropbox": "*"
```

to the `require` section of your `composer.json` file and configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\dropbox\DropboxFilesystem',
            'token' => 'your-token',
            'app' => 'your-app',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### Rackspace filesystem

Filesystem home: https://github.com/creocoder/yii2-flysystem-rackspace

Either run

```bash
$ composer require creocoder/yii2-flysystem-rackspace
```

or add

```
"creocoder/yii2-flysystem-rackspace": "*"
```

to the `require` section of your `composer.json` file and configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\rackspace\RackspaceFilesystem',
            'endpoint' => 'your-endpoint',
            'region' => 'your-region',
            'username' => 'your-username',
            'apiKey' => 'your-api-key',
            'container' => 'your-container',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### WebDAV filesystem

Filesystem home: https://github.com/creocoder/yii2-flysystem-webdav

Either run

```bash
$ composer require creocoder/yii2-flysystem-webdav
```

or add

```
"creocoder/yii2-flysystem-webdav": "*"
```

to the `require` section of your `composer.json` file and configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\webdav\WebDAVFilesystem',
            'baseUri' => 'your-base-uri',
            // 'userName' => 'your-user-name',
            // 'password' => 'your-password',
            // 'proxy' => 'your-proxy',
            // 'authType' => \Sabre\DAV\Client::AUTH_BASIC,
            // 'encoding' => \Sabre\DAV\Client::ENCODING_IDENTITY,
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### ZipArchive filesystem

Filesystem home: https://github.com/creocoder/yii2-flysystem-ziparchive

Either run

```bash
$ composer require creocoder/yii2-flysystem-ziparchive
```

or add

```
"creocoder/yii2-flysystem-ziparchive": "*"
```

to the `require` section of your `composer.json` file and configure `filesystem` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'filesystem' => [
            'class' => 'creocoder\flysystem\ziparchive\ZipArchiveFilesystem',
            'path' => '@webroot/files/archive.zip',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

## Usage

### Writing files

To write file

```php
Yii::$app->filesystem->write('filename.ext', 'contents');
```

### Updating files

To update file

```php
Yii::$app->filesystem->update('filename.ext', 'contents');
```

### Writing or updating files

To write or update file

```php
Yii::$app->filesystem->put('filename.ext', 'contents');
```

### Reading files

To read file

```php
$contents = Yii::$app->filesystem->read('filename.ext');
```

### Checking if a file exists

To check if a file exists

```php
$exists = Yii::$app->filesystem->has('filename.ext');
```

### Deleting files

To delete file

```php
Yii::$app->filesystem->delete('filename.ext');
```

### Reading and deleting files

To read and delete file

```php
$contents = Yii::$app->filesystem->readAndDelete('filename.ext');
```

### Renaming files

To rename file

```php
Yii::$app->filesystem->rename('filename.ext', 'newname.ext');
```

### Getting files mimetype

To get file mimetype

```php
$mimetype = Yii::$app->filesystem->getMimetype('filename.ext');
```

### Getting files timestamp

To get file timestamp

```php
$timestamp = Yii::$app->filesystem->getTimestamp('filename.ext');
```

### Getting files size

To get file size

```php
$timestamp = Yii::$app->filesystem->getSize('filename.ext');
```

### Creating directories

To create directory

```php
Yii::$app->filesystem->createDir('path/to/directory');
```

Directories are also made implicitly when writing to a deeper path

```php
Yii::$app->filesystem->write('path/to/filename.ext');
```

### Deleting directories

To delete directory

```php
Yii::$app->filesystem->deleteDir('path/to/filename.ext');
```

## Donating

Support this project and [others by creocoder](https://gratipay.com/creocoder/) via [gratipay](https://gratipay.com/creocoder/).

[![Support via Gratipay](https://cdn.rawgit.com/gratipay/gratipay-badge/2.3.0/dist/gratipay.svg)](https://gratipay.com/creocoder/)
