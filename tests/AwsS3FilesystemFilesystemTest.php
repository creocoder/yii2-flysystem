<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\AwsS3Filesystem;

/**
 * AwsS3FilesystemTest
 */
class AwsS3FilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new AwsS3Filesystem();
    }

    public function testInstance()
    {
        $fs = new AwsS3Filesystem([
            'key' => 'your-key',
            'secret' => 'your-secret',
            'bucket' => 'your-bucket',
            'region' => 'your-region',
            'baseUrl' => 'your-base-url',
            'prefix' => 'your-prefix',
            'options' => [],
        ]);

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\AwsS3v2\AwsS3Adapter', $fs->getAdapter());
    }
}
