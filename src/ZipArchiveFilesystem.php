<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\ZipArchive\ZipArchiveAdapter;
use Yii;
use yii\base\InvalidConfigException;

/**
 * ZipArchiveFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class ZipArchiveFilesystem extends Filesystem
{
    /**
     * @var string
     */
    public $path;
    /**
     * @var string|null
     */
    public $prefix;

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
     * @return ZipArchiveAdapter
     */
    protected function prepareAdapter()
    {
        return new ZipArchiveAdapter(
            $this->path,
            null,
            $this->prefix
        );
    }
}
