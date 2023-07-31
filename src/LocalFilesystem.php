<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\Adapter\Local;
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
    public $linkHandling = Local::DISALLOW_LINKS;

    /**
     * @var array
     */
    public $permissions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->path === null) {
            throw new InvalidConfigException('The "path" property must be set.');
        }

        if (!in_array($this->writeFlags, [0, LOCK_SH, LOCK_EX, LOCK_UN, LOCK_NB], true)) {
            throw new InvalidConfigException('The "writeFlags" property value is invalid.');
        }

        if ($this->linkHandling !== Local::DISALLOW_LINKS && $this->linkHandling !== Local::SKIP_LINKS) {
            throw new InvalidConfigException('The "linkHandling" property value is invalid.');
        }

        $this->path = Yii::getAlias($this->path);

        parent::init();
    }

    /**
     * @return Local
     */
    protected function prepareAdapter()
    {
        return new Local($this->path, $this->writeFlags, $this->linkHandling, $this->permissions);
    }
}

