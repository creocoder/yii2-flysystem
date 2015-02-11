# Flysystem Extension for Yii 2

[![Code Quality](https://img.shields.io/scrutinizer/g/creocoder/yii2-flysystem/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/creocoder/yii2-flysystem/?branch=master)
[![Packagist Version](https://img.shields.io/packagist/v/creocoder/yii2-flysystem.svg?style=flat-square)](https://packagist.org/packages/creocoder/yii2-flysystem)
[![Total Downloads](https://img.shields.io/packagist/dt/creocoder/yii2-flysystem.svg?style=flat-square)](https://packagist.org/packages/creocoder/yii2-flysystem)

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
"creocoder/yii2-flysystem": "0.2.*"
```

to the `require` section of your `composer.json` file.

## Configuring

### Local filesystem

Configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'localFs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@webroot/files',
        ],
    ],
];
```

### FTP filesystem

Configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'ftpFs' => [
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

Configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'nullFs' => [
            'class' => 'creocoder\flysystem\NullFilesystem',
        ],
    ],
];
```

### AWS S3 filesystem

Either run

```bash
$ composer require league/flysystem-aws-s3-v2
```

or add

```
"league/flysystem-aws-s3-v2": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'awss3Fs' => [
            'class' => 'creocoder\flysystem\AwsS3Filesystem',
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

### Copy filesystem

Either run

```bash
$ composer require league/flysystem-copy
```

or add

```
"league/flysystem-copy": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'copyFs' => [
            'class' => 'creocoder\flysystem\CopyFilesystem',
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

Either run

```bash
$ composer require league/flysystem-dropbox
```

or add

```
"league/flysystem-dropbox": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'dropboxFs' => [
            'class' => 'creocoder\flysystem\DropboxFilesystem',
            'token' => 'your-token',
            'app' => 'your-app',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### Rackspace filesystem

Either run

```bash
$ composer require league/flysystem-rackspace
```

or add

```
"league/flysystem-rackspace": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'rackspaceFs' => [
            'class' => 'creocoder\flysystem\RackspaceFilesystem',
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

Either run

```bash
$ composer require league/flysystem-webdav
```

or add

```
"league/flysystem-webdav": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'webdavFs' => [
            'class' => 'creocoder\flysystem\WebDAVFilesystem',
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

Either run

```bash
$ composer require league/flysystem-ziparchive
```

or add

```
"league/flysystem-ziparchive": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'ziparchiveFs' => [
            'class' => 'creocoder\flysystem\ZipArchiveFilesystem',
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
