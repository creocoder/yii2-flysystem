<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\UnixVisibility\PortableVisibilityConverter;
use League\Flysystem\Visibility;
use Yii;
use yii\base\InvalidConfigException;

/**
 * LocalFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class LocalFilesystem extends Filesystem
{
    /**
     * @var string
     */
    public $path;

    /**
     * @var int
     */
    public $writeFlags = LOCK_EX;

    /**
     * @var int
     */
    public $linkHandling = LocalFilesystemAdapter::DISALLOW_LINKS;

    /**
     * @var string Default visibility for files
     */
    public $defaultForFiles = Visibility::PRIVATE;

    /**
     * @var string Default visibility for directories
     */
    public $defaultForDirectories = Visibility::PRIVATE;

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
     * @inheritdoc
     */
    public function init()
    {
        if ($this->path === null) {
            throw new InvalidConfigException('The "path" property must be set.');
        }

        $this->path = Yii::getAlias($this->path);

        parent::init();
    }

    /**
     * @return LocalFilesystemAdapter
     */
    protected function prepareAdapter()
    {
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

        return new LocalFilesystemAdapter(
            $this->path,
            $visibility,
            $this->writeFlags,
            $this->linkHandling
        );
    }
}
