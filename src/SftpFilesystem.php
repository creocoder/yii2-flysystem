<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\PhpseclibV3\SftpAdapter;
use League\Flysystem\PhpseclibV3\SftpConnectionProvider;
use League\Flysystem\UnixVisibility\PortableVisibilityConverter;
use League\Flysystem\Visibility;
use Yii;
use yii\base\InvalidConfigException;

/**
 * SftpFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class SftpFilesystem extends Filesystem
{
    /**
     * @var string
     */
    public $host;

    /**
     * @var int
     */
    public $port = 22;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string|null
     */
    public $password;

    /**
     * @var int
     */
    public $timeout = 10;

    /**
     * @var string
     */
    public $root = '/';

    /**
     * @var string|null
     */
    public $privateKey;

    /**
     * @var string|null
     */
    public $passphrase;

    /**
     * @var bool
     */
    public $useAgent = false;

    /**
     * @var int File permission for private files
     */
    public $filePrivate = 0640;

    /**
     * @var int File permission for public files
     */
    public $filePublic = 0644;

    /**
     * @var int Directory permission for private directories
     */
    public $directoryPrivate = 0740;

    /**
     * @var int Directory permission for public directories
     */
    public $directoryPublic = 0755;

    /**
     * @var string Default visibility for files
     */
    public $defaultForFiles = Visibility::PRIVATE;

    /**
     * @var string Default visibility for directories
     */
    public $defaultForDirectories = Visibility::PRIVATE;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->host === null) {
            throw new InvalidConfigException('The "host" property must be set.');
        }

        if ($this->username === null) {
            throw new InvalidConfigException('The "username" property must be set.');
        }

        if ($this->password === null && $this->privateKey === null && $this->useAgent === false) {
            throw new InvalidConfigException('Either "password", "privateKey", or "useAgent" property must be set.');
        }

        if ($this->root !== null) {
            $this->root = Yii::getAlias($this->root);
        }

        parent::init();
    }

    /**
     * @return SftpAdapter
     */
    protected function prepareAdapter()
    {
        $connectionProvider = new SftpConnectionProvider(
            $this->host,
            $this->username,
            $this->password,
            $this->privateKey,
            $this->passphrase,
            $this->port,
            $this->useAgent,
            $this->timeout
        );

        $visibility = PortableVisibilityConverter::fromArray([
            'file' => [
                'public' => $this->filePublic,
                'private' => $this->filePrivate,
            ],
            'dir' => [
                'public' => $this->directoryPublic,
                'private' => $this->directoryPrivate,
            ],
        ], $this->defaultForFiles, $this->defaultForDirectories);

        return new SftpAdapter(
            $connectionProvider,
            $this->root,
            $visibility
        );
    }
}
