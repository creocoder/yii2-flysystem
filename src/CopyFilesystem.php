<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use Barracuda\Copy\API;
use League\Flysystem\Copy\CopyAdapter;
use yii\base\InvalidConfigException;

/**
 * CopyFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class CopyFilesystem extends Filesystem
{
    /**
     * @var string
     */
    public $consumerKey;
    /**
     * @var string
     */
    public $consumerSecret;
    /**
     * @var string
     */
    public $accessToken;
    /**
     * @var string
     */
    public $tokenSecret;
    /**
     * @var string|null
     */
    public $prefix;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->consumerKey === null) {
            throw new InvalidConfigException('The "consumerKey" property must be set.');
        }

        if ($this->consumerSecret === null) {
            throw new InvalidConfigException('The "consumerSecret" property must be set.');
        }

        if ($this->accessToken === null) {
            throw new InvalidConfigException('The "accessToken" property must be set.');
        }

        if ($this->tokenSecret === null) {
            throw new InvalidConfigException('The "tokenSecret" property must be set.');
        }

        parent::init();
    }

    /**
     * @return CopyAdapter
     */
    protected function prepareAdapter()
    {
        return new CopyAdapter(
            new API($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->tokenSecret),
            $this->prefix
        );
    }
}
