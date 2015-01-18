<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem\adapters;

/**
 * ConnectorInterface
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
interface ConnectorInterface
{
    /**
     * Establish a connection.
     *
     * @return \League\Flysystem\AdapterInterface
     */
    public function connect();
}
