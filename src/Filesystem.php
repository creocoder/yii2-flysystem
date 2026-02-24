<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\Filesystem as NativeFilesystem;
use League\Flysystem\FilesystemOperator;
use yii\base\Component;

/**
 * Filesystem
 *
 * @method void write(string $path, string $contents, array $config = [])
 * @method void writeStream(string $path, $contents, array $config = [])
 * @method string read(string $path)
 * @method resource readStream(string $path)
 * @method void delete(string $path)
 * @method void deleteDirectory(string $path)
 * @method void createDirectory(string $path, array $config = [])
 * @method void move(string $source, string $destination, array $config = [])
 * @method void copy(string $source, string $destination, array $config = [])
 * @method bool fileExists(string $path)
 * @method bool directoryExists(string $path)
 * @method bool has(string $path)
 * @method int lastModified(string $path)
 * @method string mimeType(string $path)
 * @method int fileSize(string $path)
 * @method string visibility(string $path)
 * @method void setVisibility(string $path, string $visibility)
 * @method \League\Flysystem\DirectoryListing listContents(string $path = '', bool $deep = false)
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
abstract class Filesystem extends Component
{
    /**
     * @var array
     */
    public $config = [];

    /**
     * @var FilesystemOperator
     */
    protected $filesystem;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $adapter = $this->prepareAdapter();
        $this->filesystem = new NativeFilesystem($adapter, $this->config);
    }

    /**
     * @return FilesystemAdapter
     */
    abstract protected function prepareAdapter();

    /**
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->filesystem, $method], $parameters);
    }

    /**
     * @return FilesystemOperator
     */
    public function getFilesystem()
    {
        return $this->filesystem;
    }
}
