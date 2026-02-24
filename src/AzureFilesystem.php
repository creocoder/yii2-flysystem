<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use yii\base\InvalidConfigException;

/**
 * AzureFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class AzureFilesystem extends Filesystem
{
    /**
     * @var string
     */
    public $accountName;

    /**
     * @var string
     */
    public $accountKey;

    /**
     * @var string
     */
    public $container;

    /**
     * @var string
     */
    public $prefix = '';

    /**
     * @var string|null Custom endpoint (e.g., for Azurite or sovereign clouds)
     */
    public $endpoint;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->accountName === null) {
            throw new InvalidConfigException('The "accountName" property must be set.');
        }

        if ($this->accountKey === null) {
            throw new InvalidConfigException('The "accountKey" property must be set.');
        }

        if ($this->container === null) {
            throw new InvalidConfigException('The "container" property must be set.');
        }

        parent::init();
    }

    /**
     * @return AzureBlobStorageAdapter
     */
    protected function prepareAdapter()
    {
        $connectionString = sprintf(
            'DefaultEndpointsProtocol=https;AccountName=%s;AccountKey=%s',
            $this->accountName,
            $this->accountKey
        );

        if ($this->endpoint !== null) {
            $connectionString .= sprintf(';BlobEndpoint=%s', $this->endpoint);
        }

        $client = BlobRestProxy::createBlobService($connectionString);

        return new AzureBlobStorageAdapter(
            $client,
            $this->container,
            $this->prefix
        );
    }
}
