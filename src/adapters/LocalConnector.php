<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem\adapters;

use League\Flysystem\Adapter\Local;
use Yii;
use yii\base\Object;

/**
 * LocalConnector
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class LocalConnector extends Object implements ConnectorInterface
{
    /**
     * @var string
     */
    public $path;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->path = Yii::getAlias($this->path);
    }

    /**
     * Establish an adapter connection.
     *
     * @return Local
     */
    public function connect()
    {
        return new Local($this->path);
    }
}
