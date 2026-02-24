# Flysystem Extension for Yii 2

[![Code Quality](https://img.shields.io/scrutinizer/g/creocoder/yii2-flysystem/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/creocoder/yii2-flysystem/?branch=master)
[![Packagist Version](https://img.shields.io/packagist/v/creocoder/yii2-flysystem.svg?style=flat-square)](https://packagist.org/packages/creocoder/yii2-flysystem)
[![Total Downloads](https://img.shields.io/packagist/dt/creocoder/yii2-flysystem.svg?style=flat-square)](https://packagist.org/packages/creocoder/yii2-flysystem)

This extension provides [Flysystem](http://flysystem.thephpleague.com/) integration for the Yii framework.
[Flysystem](http://flysystem.thephpleague.com/) is a filesystem abstraction which allows you to easily swap out a local filesystem for a remote one.

**This version requires Flysystem 3.x and PHP 8.1+**

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require creocoder/yii2-flysystem
```

or add

```
"creocoder/yii2-flysystem": "^2.0"
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
            'class' => \creocoder\flysystem\LocalFilesystem::class,
            'path' => '@webroot/files',
        ],
    ],
];
```

### FTP filesystem

Either run

```bash
$ composer require league/flysystem-ftp
```

or add

```
"league/flysystem-ftp": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'ftpFs' => [
            'class' => \creocoder\flysystem\FtpFilesystem::class,
            'host' => 'ftp.example.com',
            // 'port' => 21,
            // 'username' => 'your-username',
            // 'password' => 'your-password',
            // 'ssl' => true,
            // 'timeout' => 90,
            // 'root' => '/path/to/root',
            // 'passive' => true,
        ],
    ],
];
```

### In-Memory filesystem

Configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'memoryFs' => [
            'class' => \creocoder\flysystem\InMemoryFilesystem::class,
        ],
    ],
];
```

### AWS S3 filesystem

Either run

```bash
$ composer require league/flysystem-aws-s3-v3
```

or add

```
"league/flysystem-aws-s3-v3": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'awss3Fs' => [
            'class' => \creocoder\flysystem\AwsS3Filesystem::class,
            'key' => 'your-key',
            'secret' => 'your-secret',
            'bucket' => 'your-bucket',
            'region' => 'your-region',
            // 'version' => 'latest',
            // 'prefix' => 'your-prefix',
            // 'endpoint' => 'http://my-custom-url'
        ],
    ],
];
```

### Azure Blob Storage filesystem

Either run

```bash
$ composer require league/flysystem-azure-blob-storage
```

or add

```
"league/flysystem-azure-blob-storage": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'azureFs' => [
            'class' => \creocoder\flysystem\AzureFilesystem::class,
            'accountName' => 'your-account-name',
            'accountKey' => 'your-account-key',
            'container' => 'your-container',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### Dropbox filesystem

Either run

```bash
$ composer require spatie/flysystem-dropbox
```

or add

```
"spatie/flysystem-dropbox": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'dropboxFs' => [
            'class' => \creocoder\flysystem\DropboxFilesystem::class,
            'token' => 'your-token',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### Google Cloud Storage filesystem

Run

```bash
$ composer require league/flysystem-google-cloud-storage
```

and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'googleCloudFs' => [
            'class' => \creocoder\flysystem\GoogleCloudFilesystem::class,
            'projectId' => 'GOOGLE_PROJECT_ID',
            'bucket' => 'GOOGLE_BUCKET',
            'keyFilePath' => '@app/config/google-credentials.json',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

> Note: Credential configuration is read from the *keyFilePath*.

### GridFS filesystem

Either run

```bash
$ composer require league/flysystem-gridfs
```

or add

```
"league/flysystem-gridfs": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'gridFs' => [
            'class' => \creocoder\flysystem\GridFSFilesystem::class,
            'uri' => 'mongodb://localhost:27017',
            'database' => 'your-database',
            // 'bucketName' => 'fs',
        ],
    ],
];
```

### SFTP filesystem

Either run

```bash
$ composer require league/flysystem-sftp-v3
```

or add

```
"league/flysystem-sftp-v3": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'sftpFs' => [
            'class' => \creocoder\flysystem\SftpFilesystem::class,
            'host' => 'sftp.example.com',
            // 'port' => 22,
            'username' => 'your-username',
            'password' => 'your-password',
            // 'privateKey' => '/path/to/or/contents/of/privatekey',
            // 'passphrase' => 'your-passphrase',
            // 'timeout' => 10,
            // 'root' => '/path/to/root',
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
"league/flysystem-webdav": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'webdavFs' => [
            'class' => \creocoder\flysystem\WebDAVFilesystem::class,
            'baseUri' => 'your-base-uri',
            // 'userName' => 'your-user-name',
            // 'password' => 'your-password',
            // 'proxy' => 'your-proxy',
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
"league/flysystem-ziparchive": "^3.0"
```

to the `require` section of your `composer.json` file and configure application `components` as follows

```php
return [
    //...
    'components' => [
        //...
        'ziparchiveFs' => [
            'class' => \creocoder\flysystem\ZipArchiveFilesystem::class,
            'path' => '@webroot/files/archive.zip',
            // 'prefix' => 'your-prefix',
        ],
    ],
];
```

### Global visibility settings

Configure `fsID` application component as follows

```php
use League\Flysystem\Visibility;

return [
    //...
    'components' => [
        //...
        'fsID' => [
            //...
            'config' => [
                'visibility' => Visibility::PRIVATE,
            ],
        ],
    ],
];
```

## Usage

### Writing files

To write a file

```php
Yii::$app->fs->write('filename.ext', 'contents');
```

To write a file using stream contents

```php
$stream = fopen('/path/to/somefile.ext', 'r+');
Yii::$app->fs->writeStream('filename.ext', $stream);
```

### Reading files

To read a file

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
$exists = Yii::$app->fs->fileExists('filename.ext');
```

To check if a directory exists

```php
$exists = Yii::$app->fs->directoryExists('path/to/directory');
```

### Deleting files

To delete a file

```php
Yii::$app->fs->delete('filename.ext');
```

### Moving files

To move a file

```php
Yii::$app->fs->move('filename.ext', 'newname.ext');
```

### Copying files

To copy a file

```php
Yii::$app->fs->copy('filename.ext', 'copy.ext');
```

### Getting files mimetype

To get a file mimetype

```php
$mimetype = Yii::$app->fs->mimeType('filename.ext');
```

### Getting files last modified timestamp

To get a file last modified timestamp

```php
$timestamp = Yii::$app->fs->lastModified('filename.ext');
```

### Getting files size

To get a file size

```php
$size = Yii::$app->fs->fileSize('filename.ext');
```

### Creating directories

To create a directory

```php
Yii::$app->fs->createDirectory('path/to/directory');
```

Directories are also made implicitly when writing to a deeper path

```php
Yii::$app->fs->write('path/to/filename.ext', 'contents');
```

### Deleting directories

To delete a directory

```php
Yii::$app->fs->deleteDirectory('path/to/directory');
```

### Managing visibility

Visibility is the abstraction of file permissions across multiple platforms. Visibility can be either public or private.

```php
use League\Flysystem\Visibility;

Yii::$app->fs->write('filename.ext', 'contents', [
    'visibility' => Visibility::PRIVATE
]);
```

You can also change and check visibility of existing files

```php
use League\Flysystem\Visibility;

if (Yii::$app->fs->visibility('filename.ext') === Visibility::PRIVATE) {
    Yii::$app->fs->setVisibility('filename.ext', Visibility::PUBLIC);
}
```

### Listing contents

To list contents

```php
$contents = Yii::$app->fs->listContents('', false);

foreach ($contents as $item) {
    echo $item->path();
    echo $item->isFile() ? 'file' : 'directory';
}
```

By default Flysystem lists the top directory non-recursively. You can supply a directory name and recursive boolean to get more precise results

```php
$contents = Yii::$app->fs->listContents('path/to/directory', true);
```

## Upgrading from v1

If you are upgrading from the Flysystem v1 version of this extension, please note the following breaking changes:

### Removed Features
- **Caching**: The cached adapter is no longer available in Flysystem v3
- **Replication**: The replicate adapter is no longer available in Flysystem v3
- **Rackspace**: The Rackspace adapter has been removed as the service is discontinued
- **NullFilesystem**: Replaced with `InMemoryFilesystem`

### API Changes
| v1 Method | v3 Method |
|-----------|-----------|
| `has($path)` | `fileExists($path)` / `directoryExists($path)` |
| `createDir($path)` | `createDirectory($path)` |
| `deleteDir($path)` | `deleteDirectory($path)` |
| `rename($path, $newpath)` | `move($source, $destination)` |
| `getTimestamp($path)` | `lastModified($path)` |
| `getMimetype($path)` | `mimeType($path)` |
| `getSize($path)` | `fileSize($path)` |
| `getVisibility($path)` | `visibility($path)` |
| `update()` / `put()` | `write()` |
| `updateStream()` / `putStream()` | `writeStream()` |

### Visibility Constants
```php
// Old (v1)
use League\Flysystem\AdapterInterface;
AdapterInterface::VISIBILITY_PRIVATE;
AdapterInterface::VISIBILITY_PUBLIC;

// New (v3)
use League\Flysystem\Visibility;
Visibility::PRIVATE;
Visibility::PUBLIC;
```

## Donating

Support this project and [others by creocoder](https://gratipay.com/creocoder/) via [gratipay](https://gratipay.com/creocoder/).

[![Support via Gratipay](https://cdn.rawgit.com/gratipay/gratipay-badge/2.3.0/dist/gratipay.svg)](https://gratipay.com/creocoder/)
