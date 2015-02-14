<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace tests;
use creocoder\flysystem\RackspaceFilesystem;

/**
 * RackspaceFilesystemTest
 */
class RackspaceFilesystemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \yii\base\InvalidConfigException
     */
    public function testExceptionIsRaisedWhenRequiredPropertiesNotSet()
    {
        new RackspaceFilesystem();
    }

    /**
     * @expectedException \Guzzle\Http\Exception\ClientErrorResponseException
     */
    public function testInstance()
    {
        new RackspaceFilesystem([
            'endpoint' => \OpenCloud\Rackspace::US_IDENTITY_ENDPOINT,
            'region' => 'your-region',
            'username' => 'your-username',
            'apiKey' => 'your-api-key',
            'container' => 'your-container',
            'prefix' => 'your-prefix',
        ]);
    }
}
