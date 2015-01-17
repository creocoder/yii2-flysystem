<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem\adapters;

use League\Flysystem\Adapter\NullAdapter;
use Yii;
use yii\base\Object;

/**
 * NullConnector
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class NullConnector extends Object implements ConnectorInterface
{
    /**
     * Establish an adapter connection.
     *
     * @return NullAdapter
     */
    public function connect()
    {
        return new NullAdapter();
    }
}
