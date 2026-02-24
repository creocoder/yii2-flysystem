<?php

/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\AwsS3V3\PortableVisibilityConverter;
use League\Flysystem\Visibility;
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
    public $version;

    /**
     * @var string
     */
    public $bucket;

    /**
     * @var string
     */
    public $prefix = '';

    /**
     * @var bool
     */
    public $pathStyleEndpoint = false;

    /**
     * @var string
     */
    public $endpoint;

    /**
     * @var array|\Aws\CacheInterface|\Aws\Credentials\CredentialsInterface|bool|callable
     */
    public $credentials;

    /**
     * @var string Default visibility for new files
     */
    public $defaultVisibility = Visibility::PRIVATE;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->credentials === null) {
            if ($this->key === null) {
                throw new InvalidConfigException('The "key" property must be set.');
            }

            if ($this->secret === null) {
                throw new InvalidConfigException('The "secret" property must be set.');
            }
        }

        if ($this->bucket === null) {
            throw new InvalidConfigException('The "bucket" property must be set.');
        }

        parent::init();
    }

    /**
     * @return AwsS3V3Adapter
     */
    protected function prepareAdapter()
    {
        $config = [];

        if ($this->credentials === null) {
            $config['credentials'] = ['key' => $this->key, 'secret' => $this->secret];
        } else {
            $config['credentials'] = $this->credentials;
        }

        if ($this->pathStyleEndpoint === true) {
            $config['use_path_style_endpoint'] = true;
        }

        if ($this->region !== null) {
            $config['region'] = $this->region;
        }

        if ($this->endpoint !== null) {
            $config['endpoint'] = $this->endpoint;
        }

        $config['version'] = $this->version ?? 'latest';

        $client = new S3Client($config);

        $visibility = new PortableVisibilityConverter($this->defaultVisibility);

        return new AwsS3V3Adapter(
            $client,
            $this->bucket,
            $this->prefix,
            $visibility
        );
    }
}
