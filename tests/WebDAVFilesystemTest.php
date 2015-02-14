<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\WebDAVFilesystem;

/**
 * WebDAVFilesystemTest
 */
class WebDAVFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new WebDAVFilesystem();
    }

    public function testInstance()
    {
        $fs = new WebDAVFilesystem([
            'baseUri' => 'your-base-uri',
            'userName' => 'your-user-name',
            'password' => 'your-password',
            'proxy' => 'your-proxy',
            'authType' => \Sabre\DAV\Client::AUTH_BASIC,
            'encoding' => \Sabre\DAV\Client::ENCODING_IDENTITY,
            'prefix' => 'your-prefix',
        ]);

        $this->assertInstanceOf('creocoder\flysystem\Filesystem', $fs);
        $this->assertInstanceOf('League\Flysystem\WebDAV\WebDAVAdapter', $fs->getAdapter());
    }
}
