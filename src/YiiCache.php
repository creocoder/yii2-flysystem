<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\Cached\Storage\AbstractCache;
use yii\caching\Cache;

/**
 * YiiCache
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class YiiCache extends AbstractCache
{
    /**
     * @var Cache
     */
    protected $yiiCache;
    /**
     * @var string
     */
    protected $key;
    /**
     * @var integer
     */
    protected $duration;

    /**
     * @param Cache $yiiCache
     * @param string $key
     * @param integer $duration
     */
    public function __construct(Cache $yiiCache, $key = 'flysystem', $duration = 0)
    {
        $this->yiiCache = $yiiCache;
        $this->key = $key;
        $this->duration = $duration;
    }

    /**
     * @inheritdoc
     */
    public function load()
    {
        $contents = $this->yiiCache->get($this->key);

        if ($contents !== false) {
            $this->setFromStorage($contents);
        }
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        $this->yiiCache->set($this->key, $this->getForStorage(), $this->duration);
    }
}
