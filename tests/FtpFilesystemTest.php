<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\FtpFilesystem;

/**
 * FtpFilesystemTest
 */
class FtpFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new FtpFilesystem();
    }

    public function testInstance()
    {
        $fs = new FtpFilesystem([
            'host' => 'ftp.example.com',
            'port' => 21,
            'username' => 'your-username',
            'password' => 'your-password',
            'root' => '/path/to/root',
            'passive' => false,
            'ssl' => true,
            'timeout' => 60,
            'permPrivate' => 0700,
            'permPublic' => 0744,
            'transferMode' => FTP_TEXT,
        ]);

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\Adapter\Ftp', $fs->getAdapter());
    }
}
