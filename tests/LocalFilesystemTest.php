<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\LocalFilesystem;

/**
 * LocalFilesystemTest
 */
class LocalFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new LocalFilesystem();
    }

    public function testInstance()
    {
        $fs = new LocalFilesystem([
            'path' => __DIR__ . '/stub',
        ]);

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\Adapter\Local', $fs->getAdapter());
    }
}
