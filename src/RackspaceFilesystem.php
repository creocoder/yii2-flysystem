<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\Rackspace\RackspaceAdapter;
use OpenCloud\Rackspace;
use yii\base\InvalidConfigException;

/**
 * RackspaceFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class RackspaceFilesystem extends Filesystem
{
    /**
     * @var string
     */
    public $endpoint;
    /**
     * @var string
     */
    public $username;
    /**
     * @var string
     */
    public $apiKey;
    /**
     * @var string
     */
    public $region;
    /**
     * @var string
     */
    public $container;
    /**
     * @var string|null
     */
    public $prefix;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->endpoint === null) {
            throw new InvalidConfigException('The "endpoint" property must be set.');
        }

        if ($this->username === null) {
            throw new InvalidConfigException('The "username" property must be set.');
        }

        if ($this->apiKey === null) {
            throw new InvalidConfigException('The "apiKey" property must be set.');
        }

        if ($this->region === null) {
            throw new InvalidConfigException('The "region" property must be set.');
        }

        if ($this->container === null) {
            throw new InvalidConfigException('The "container" property must be set.');
        }

        parent::init();
    }

    /**
     * @return RackspaceAdapter
     */
    protected function prepareAdapter()
    {
        return new RackspaceAdapter(
            (new Rackspace($this->endpoint, [
                'username' => $this->username,
                'apiKey' => $this->apiKey]
            ))->objectStoreService('cloudFiles', $this->region)->getContainer($this->container),
            $this->prefix
        );
    }
}
