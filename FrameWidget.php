<?php
/**
 * Date: 09.10.2014
 * Time: 23:54
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
use yii\helpers\Json;
use yii\helpers\Url;

/**
 * Class FrameWidget
 *
 * @package mihaildev\moderator\panel
 */
class FrameWidget extends Widget{
	public $url;
	public $title;
	public $access;
	public $accessParams = [];
	public $width = 800;
	public $height = 600;

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

		echo Html::a($this->title, '#', ['onclick'=>'mihaildev.moderatorPanel.openFrame('.Json::encode($this->width).', '.Json::encode($this->height).', '.Json::encode(Url::to($this->url)).', '.Json::encode($this->title).'); return false;']);
	}
} 