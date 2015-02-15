<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\Adapter\NullAdapter;

/**
 * NullFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class NullFilesystem extends Filesystem
{
    /**
     * @return NullAdapter
     */
    protected function prepareAdapter()
    {
        return new NullAdapter();
    }
}
