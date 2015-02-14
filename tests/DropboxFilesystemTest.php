<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\DropboxFilesystem;

/**
 * DropboxFilesystemTest
 */
class DropboxFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new DropboxFilesystem();
    }

    public function testInstance()
    {
        $fs = new DropboxFilesystem([
            'token' => 'your-token',
            'app' => 'your-app',
            'prefix' => 'your-prefix',
        ]);

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\Dropbox\DropboxAdapter', $fs->getAdapter());
    }
}
