<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\NullFilesystem;

/**
 * NullFilesystemTest
 */
class NullFilesystemTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $fs = new NullFilesystem();

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\Adapter\NullAdapter', $fs->getAdapter());
    }
}
