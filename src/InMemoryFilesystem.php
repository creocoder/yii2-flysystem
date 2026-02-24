<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use League\Flysystem\Visibility;

/**
 * InMemoryFilesystem
 *
 * An in-memory filesystem adapter useful for testing and temporary storage.
 * This replaces the NullFilesystem from Flysystem v1.
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class InMemoryFilesystem extends Filesystem
{
    /**
     * @var string Default visibility for files
     */
    public $defaultVisibility = Visibility::PUBLIC;

    /**
     * @return InMemoryFilesystemAdapter
     */
    protected function prepareAdapter()
    {
        return new InMemoryFilesystemAdapter($this->defaultVisibility);
    }
}

