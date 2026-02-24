<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\GridFS\GridFSAdapter;
use MongoDB\Client;
use yii\base\InvalidConfigException;

/**
 * GridFSFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class GridFSFilesystem extends Filesystem
{
    /**
     * @var string MongoDB connection URI
     */
    public $uri = 'mongodb://localhost:27017';

    /**
     * @var string
     */
    public $database;

    /**
     * @var string GridFS bucket name
     */
    public $bucketName = 'fs';

    /**
     * @var array MongoDB connection options
     */
    public $uriOptions = [];

    /**
     * @var array MongoDB driver options
     */
    public $driverOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->database === null) {
            throw new InvalidConfigException('The "database" property must be set.');
        }

        parent::init();
    }

    /**
     * @return GridFSAdapter
     */
    protected function prepareAdapter()
    {
        $client = new Client($this->uri, $this->uriOptions, $this->driverOptions);
        $bucket = $client->selectDatabase($this->database)->selectGridFSBucket([
            'bucketName' => $this->bucketName,
        ]);

        return new GridFSAdapter($bucket);
    }
}
