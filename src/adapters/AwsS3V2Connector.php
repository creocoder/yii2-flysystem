<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem\adapters;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3V2\AwsS3Adapter;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Object;

/**
 * AwsS3V2Connector
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class AwsS3V2Connector extends Object implements ConnectorInterface
{
    /**
     * @var string
     */
    public $key;
    /**
     * @var string
     */
    public $secret;
    /**
     * @var string
     */
    public $region;
    /**
     * @var string
     */
    public $baseUrl;
    /**
     * @var string
     */
    public $bucket;
    /**
     * @var string
     */
    public $prefix;
    /**
     * @var array
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->key === null) {
            throw new InvalidConfigException('The "key" property must be set.');
        }

        if ($this->secret === null) {
            throw new InvalidConfigException('The "secret" property must be set.');
        }

        if ($this->bucket === null) {
            throw new InvalidConfigException('The "bucket" property must be set.');
        }
    }

    /**
     * Establish an adapter connection.
     *
     * @return AwsS3Adapter
     */
    public function connect()
    {
        $config = ['key' => $this->key, 'secret' => $this->secret];

        if ($this->region !== null) {
            $config['region'] = $this->region;
        }

        if ($this->baseUrl !== null) {
            $config['base_url'] = $this->baseUrl;
        }

        return new AwsS3Adapter(S3Client::factory($config), $this->bucket, $this->prefix, $this->options);
    }
}
