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
"creocoder/yii2-flysystem": "0.8.*"
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
        'fs' => [
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
            // 'ssl' => true,
            // 'timeout' => 60,
            // 'root' => '/path/to/root',
            // 'permPrivate' => 0700,
            // 'permPublic' => 0744,
            // 'passive' => false,
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

### Azure filesystem

Add the following to the `repositories` section of your `composer.json`

```
{
    "type": "pear",
    "url": "http://pear.php.net"
}
```

Either run

```bash
$ composer require league/flysystem-azure
```

or add

```
"league/flysystem-azure": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'azureFs' => [
            'class' => 'creocoder\flysystem\AzureFilesystem',
            'accountName' => 'your-account-name',
            'accountKey' => 'your-account-key',
            'container' => 'your-container',
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

### GridFS filesystem

Either run

```bash
$ composer require league/flysystem-gridfs
```

or add

```
"league/flysystem-gridfs": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'gridFs' => [
            'class' => 'creocoder\flysystem\GridFSFilesystem',
            'server' => 'mongodb://localhost:27017',
            'database' => 'your-database',
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

### SFTP filesystem

Either run

```bash
$ composer require league/flysystem-sftp
```

or add

```
"league/flysystem-sftp": "~1.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'sftpFs' => [
            'class' => 'creocoder\flysystem\SftpFilesystem',
            'host' => 'sftp.example.com',
            // 'port' => 22,
            'username' => 'your-username',
            'password' => 'your-password',
            'privateKey' => '/path/to/or/contents/of/privatekey',
            // 'timeout' => 60,
            // 'root' => '/path/to/root',
            // 'permPrivate' => 0700,
            // 'permPublic' => 0744,
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

### Caching feature

Either run

```bash
$ composer require league/flysystem-cached-adapter
```

or add

```
"league/flysystem-cached-adapter": "~1.0"
```

to the `require` section of your `composer.json` file and configure `fsID` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'fsID' => [
            //...
            'cache' => 'cacheID',
            // 'cacheKey' => 'flysystem',
            // 'cacheDuration' => 3600,
        ],
    ],
];
```

### Replication feature

Either run

```bash
$ composer require league/flysystem-replicate-adapter
```

or add

```
"league/flysystem-replicate-adapter": "~1.0"
```

to the `require` section of your `composer.json` file and configure `fsID` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'fsID' => [
            //...
            'replica' => 'anotherFsID',
        ],
    ],
];
```

### Global visibility settings

Configure `fsID` application component as follows

```php
return [
    //...
    'components' => [
        //...
        'fsID' => [
            //...
            'config' => [
                'visibility' => \League\Flysystem\AdapterInterface::VISIBILITY_PRIVATE,
            ],
        ],
    ],
];
```

## Usage

### Writing files

To write file

```php
Yii::$app->fs->write('filename.ext', 'contents');
```

To write file using stream contents

```php
$stream = fopen('/path/to/somefile.ext', 'r+');
Yii::$app->fs->writeStream('filename.ext', $stream);
```

### Updating files

To update file

```php
Yii::$app->fs->update('filename.ext', 'contents');
```

To update file using stream contents

```php
$stream = fopen('/path/to/somefile.ext', 'r+');
Yii::$app->fs->updateStream('filename.ext', $stream);
```

### Writing or updating files

To write or update file

```php
Yii::$app->fs->put('filename.ext', 'contents');
```

To write or update file using stream contents

```php
$stream = fopen('/path/to/somefile.ext', 'r+');
Yii::$app->fs->putStream('filename.ext', $stream);
```

### Reading files

To read file

```php
$contents = Yii::$app->fs->read('filename.ext');
```

To retrieve a read-stream

```php
$stream = Yii::$app->fs->readStream('filename.ext');
$contents = stream_get_contents($stream);
fclose($stream);
```

### Checking if a file exists

To check if a file exists

```php
$exists = Yii::$app->fs->has('filename.ext');
```

### Deleting files

To delete file

```php
Yii::$app->fs->delete('filename.ext');
```

### Reading and deleting files

To read and delete file

```php
$contents = Yii::$app->fs->readAndDelete('filename.ext');
```

### Renaming files

To rename file

```php
Yii::$app->fs->rename('filename.ext', 'newname.ext');
```

### Getting files mimetype

To get file mimetype

```php
$mimetype = Yii::$app->fs->getMimetype('filename.ext');
```

### Getting files timestamp

To get file timestamp

```php
$timestamp = Yii::$app->fs->getTimestamp('filename.ext');
```

### Getting files size

To get file size

```php
$timestamp = Yii::$app->fs->getSize('filename.ext');
```

### Creating directories

To create directory

```php
Yii::$app->fs->createDir('path/to/directory');
```

Directories are also made implicitly when writing to a deeper path

```php
Yii::$app->fs->write('path/to/filename.ext');
```

### Deleting directories

To delete directory

```php
Yii::$app->fs->deleteDir('path/to/filename.ext');
```

### Managing visibility

Visibility is the abstraction of file permissions across multiple platforms. Visibility can be either public or private.

```php
use League\Flysystem\AdapterInterface;

Yii::$app->fs->write('filename.ext', 'contents', [
    'visibility' => AdapterInterface::VISIBILITY_PRIVATE
]);
```

You can also change and check visibility of existing files

```php
use League\Flysystem\AdapterInterface;

if (Yii::$app->fs->getVisibility('filename.ext') === AdapterInterface::VISIBILITY_PRIVATE) {
    Yii::$app->fs->setVisibility('filename.ext', AdapterInterface::VISIBILITY_PUBLIC);
}
```

### Listing contents

To list contents

```php
$contents = Yii::$app->fs->listContents();

foreach ($contents as $object) {
    echo $object['basename']
        . ' is located at' . $object['path']
        . ' and is a ' . $object['type'];
}
```

By default Flysystem lists the top directory non-recursively. You can supply a directory name and recursive boolean to get more precise results

```php
$contents = Yii::$app->fs->listContents('path/to/directory', true);
```

### Listing paths

To list paths

```php
$paths = Yii::$app->fs->listPaths();

foreach ($paths as $path) {
    echo $path;
}
```

### Listing with ensured presence of specific metadata

To list with ensured presence of specific metadata

```php
$listing = Yii::$app->fs->listWith(
    ['mimetype', 'size', 'timestamp'],
    'optional/path/to/directory',
    true
);

foreach ($listing as $object) {
    echo $object['path'] . ' has mimetype: ' . $object['mimetype'];
}
```

### Getting file info with explicit metadata

To get file info with explicit metadata

```php
$info = Yii::$app->fs->getWithMetadata('path/to/filename.ext', ['timestamp', 'mimetype']);
echo $info['mimetype'];
echo $info['timestamp'];
```

## Donating

Support this project and [others by creocoder](https://gratipay.com/creocoder/) via [gratipay](https://gratipay.com/creocoder/).

[![Support via Gratipay](https://cdn.rawgit.com/gratipay/gratipay-badge/2.3.0/dist/gratipay.svg)](https://gratipay.com/creocoder/)
