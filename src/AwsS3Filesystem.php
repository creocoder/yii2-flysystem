<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use yii\base\InvalidConfigException;

/**
 * AwsS3Filesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class AwsS3Filesystem extends Filesystem
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
    public $version;
    /**
     * @var string
     */
    public $bucket;
    /**
     * @var string|null
     */
    public $prefix;
    /**
     * @var array
     */
    public $options = [];
    /**
     * @var string
     */
    public $endpoint;

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

        parent::init();
    }

    /**
     * @return AwsS3Adapter
     */
    protected function prepareAdapter()
    {
        $config = [
            'credentials' => [
                'key' => $this->key,
                'secret' => $this->secret
            ]
        ];

        if ($this->region !== null) {
            $config['region'] = $this->region;
        }

        if ($this->baseUrl !== null) {
            $config['base_url'] = $this->baseUrl;
        }

        if ($this->endpoint !== null) {
            $config['endpoint'] = $this->endpoint;
        }

        $config['version'] = (($this->version !== null) ? $this->version : 'latest');

        $client = new S3Client($config);

        return new AwsS3Adapter($client, $this->bucket, $this->prefix, $this->options);
    }
}
