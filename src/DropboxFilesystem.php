<?php
/**
 * @link https://github.com/creocoder/yii2-flysystem
 * @copyright Copyright (c) 2015 Alexander Kochetov
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace creocoder\flysystem;

use Spatie\Dropbox\Client;
use Spatie\Dropbox\TokenProvider;
use Spatie\FlysystemDropbox\DropboxAdapter;
use yii\base\InvalidConfigException;

/**
 * DropboxFilesystem
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class DropboxFilesystem extends Filesystem
{
    /**
     * @var string|array|TokenProvider
     */
    public $token;

    /**
     * @var string|null
     */
    public $prefix = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->token === null) {
            throw new InvalidConfigException('The "token" property must be set.');
        }

        parent::init();
    }

    /**
     * @return DropboxAdapter
     */
    protected function prepareAdapter()
    {
        return new DropboxAdapter(
            new Client($this->token),
            $this->prefix
        );
    }
}
