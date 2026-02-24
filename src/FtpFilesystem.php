<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\Ftp\FtpAdapter;
use League\Flysystem\Ftp\FtpConnectionOptions;
use League\Flysystem\UnixVisibility\PortableVisibilityConverter;
use League\Flysystem\Visibility;
use Yii;
use yii\base\InvalidConfigException;

/**
 * FtpFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class FtpFilesystem extends Filesystem
{
    /**
     * @var string
     */
    public $host;

    /**
     * @var int
     */
    public $port = 21;

    /**
     * @var string
     */
    public $username = 'anonymous';

    /**
     * @var string
     */
    public $password = '';

    /**
     * @var bool
     */
    public $ssl = false;

    /**
     * @var int
     */
    public $timeout = 90;

    /**
     * @var string
     */
    public $root = '';

    /**
     * @var bool
     */
    public $passive = true;

    /**
     * @var int
     */
    public $transferMode = FTP_BINARY;

    /**
     * @var string|null
     */
    public $systemType;

    /**
     * @var bool
     */
    public $utf8 = false;

    /**
     * @var bool
     */
    public $ignorePassiveAddress = true;

    /**
     * @var bool
     */
    public $timestampsOnUnixListingsEnabled = false;

    /**
     * @var bool
     */
    public $recurseManually = true;

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

        if ($this->root !== null && $this->root !== '') {
            $this->root = Yii::getAlias($this->root);
        }

        parent::init();
    }

    /**
     * @return FtpAdapter
     */
    protected function prepareAdapter()
    {
        $options = FtpConnectionOptions::fromArray([
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->username,
            'password' => $this->password,
            'ssl' => $this->ssl,
            'timeout' => $this->timeout,
            'root' => $this->root,
            'passive' => $this->passive,
            'transferMode' => $this->transferMode,
            'systemType' => $this->systemType,
            'utf8' => $this->utf8,
            'ignorePassiveAddress' => $this->ignorePassiveAddress,
            'timestampsOnUnixListingsEnabled' => $this->timestampsOnUnixListingsEnabled,
            'recurseManually' => $this->recurseManually,
        ]);

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

        return new FtpAdapter($options, null, $visibility);
    }
}
