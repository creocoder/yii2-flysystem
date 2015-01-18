<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use League\Flysystem\Filesystem;
use Yii;
use yii\base\Component;
use yii\di\ServiceLocator;

/**
 * FlysystemManager
 *
 * @method \League\Flysystem\FilesystemInterface addPlugin(\League\Flysystem\PluginInterface $plugin)
 * @method boolean copy(string $path, string $newpath)
 * @method boolean createDir(string $dirname, array $options = null)
 * @method boolean delete(string $path)
 * @method boolean deleteDir(string $dirname)
 * @method \League\Flysystem\FilesystemInterface flushCache()
 * @method \League\Flysystem\Handler get(string $path, \League\Flysystem\Handler $handler = null)
 * @method array|false getMetadata(string $path)
 * @method string|false getMimetype(string $path)
 * @method int|false getSize(string $path)
 * @method string|false getTimestamp(string $path)
 * @method string|false getVisibility(string $path)
 * @method array getWithMetadata(string $path, array $metadata)
 * @method boolean has(string $path)
 * @method array|false listContents(string $directory = '', boolean $recursive = false)
 * @method array listPaths(string $directory = '', boolean $recursive = false)
 * @method array listWith(array $keys = [], string $directory = '', boolean $recursive = false)
 * @method boolean put(string $path, string $contents, mixed $visibility = null)
 * @method boolean putStream(string $path, resource $resource, mixed $visibility = null)
 * @method string|false read(string $path)
 * @method string readAndDelete(string $path)
 * @method resource|false readStream(string $path)
 * @method boolean rename(string $path, string $newpath)
 * @method boolean setVisibility(string $path, string $visibility)
 * @method array|false update(string $path, string $contents, mixed $config = null)
 * @method array|false updateStream(string $path, resource $resource, mixed $config = null)
 * @method array|false write(string $path, string $contents, mixed $config = null)
 * @method array|false writeStream(string $path, resource $resource, mixed $config = null)
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class FlysystemManager extends Component
{
    /**
     * @var string
     */
    private $_default;
    /**
     * @var ServiceLocator
     */
    private $_connectorsLocator;
    /**
     * @var \League\Flysystem\FilesystemInterface[]
     */
    private $_connections = [];

    /**
     * Set the default adapter name.
     *
     * @param string $name
     * @return static
     */
    public function setDefault($name)
    {
        $this->_default = $name;

        return $this;
    }

    /**
     * Get the default adapter name.
     *
     * @return string
     */
    public function getDefault()
    {
        return $this->_default;
    }

    /**
     * Set the connectors locator components.
     *
     * @param array $connectors
     */
    public function setConnectors($connectors)
    {
        $this->_connectorsLocator = new ServiceLocator();
        $this->_connectorsLocator->setComponents($connectors);
    }

    /**
     * Get the connectors locator.
     *
     * @return ServiceLocator
     */
    public function getConnectorsLocator()
    {
        return $this->_connectorsLocator;
    }

    /**
     * Return all of the created connections.
     *
     * @return \League\Flysystem\FilesystemInterface[]
     */
    public function getConnections()
    {
        return $this->_connections;
    }

    /**
     * Get a connection instance.
     *
     * @param string|null $name
     * @return \League\Flysystem\FilesystemInterface
     */
    public function connection($name = null)
    {
        $name = $name ?: $this->getDefault();

        if (!isset($this->_connections[$name])) {
            /* @var \creocoder\flysystem\adapters\ConnectorInterface $connector */
            $connector = $this->getConnectorsLocator()->get($name);
            $this->_connections[$name] = new Filesystem($connector->connect());
        }

        return $this->_connections[$name];
    }

    /**
     * Disconnect from the given connection.
     *
     * @param string|null $name
     */
    public function disconnect($name = null)
    {
        $name = $name ?: $this->getDefault();

        unset($this->_connections[$name]);
    }

    /**
     * Reconnect to the given connection.
     *
     * @param string|null $name
     * @return \League\Flysystem\FilesystemInterface
     */
    public function reconnect($name = null)
    {
        $name = $name ?: $this->getDefault();

        $this->disconnect($name);

        return $this->connection($name);
    }

    /**
     * Dynamically pass methods to the default connection.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->connection(), $method], $parameters);
    }
}
