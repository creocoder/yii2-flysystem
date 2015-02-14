<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\CopyFilesystem;

/**
 * CopyFilesystemTest
 */
class CopyFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new CopyFilesystem();
    }

    public function testInstance()
    {
        $fs = new CopyFilesystem([
            'consumerKey' => 'your-consumer-key',
            'consumerSecret' => 'your-consumer-secret',
            'accessToken' => 'your-access-token',
            'tokenSecret' => 'your-token-secret',
            'prefix' => 'your-prefix',
        ]);

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\Copy\CopyAdapter', $fs->getAdapter());
    }
}
