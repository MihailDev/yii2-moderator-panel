<?php
/**
 * Date: 08.10.2014
 * Time: 22:41
 *
 * This file is part of the MihailDev project.
 *
 * (c) MihailDev project <http://github.com/mihaildev/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace mihaildev\moderator\panel;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class LinkWidget
 *
 * @package mihaildev\moderator\panel
 */
class LinkWidget extends Widget{

	public $url;
	public $title;
	public $access;
	public $accessParams = [];

	public function init(){
		if(empty($this->url)){
			throw new InvalidConfigException($this->className().'::url должен быть установлен');
		}

		if(empty($this->title)){
			throw new InvalidConfigException($this->className().'::title должен быть установлен');
		}
	}

	public function run(){
		if(!empty($this->access) && !\Yii::$app->user->can($this->access, $this->accessParams))
			return;

		echo Html::a($this->title, $this->url);
	}
} 