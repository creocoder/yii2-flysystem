<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\ZipArchiveFilesystem;

/**
 * ZipArchiveFilesystemTest
 */
class ZipArchiveFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new ZipArchiveFilesystem();
    }

    public function testInstance()
    {
        $fs = new ZipArchiveFilesystem([
            'path' => __DIR__ . '/stub/test.zip',
        ]);

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\ZipArchive\ZipArchiveAdapter', $fs->getAdapter());
    }
}
