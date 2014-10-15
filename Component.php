<?php
/**
 * Date: 08.10.2014
 * Time: 21:21
 *
 * This file is part of the MihailDev project.
 *
 * (c) MihailDev project <http://github.com/mihaildev/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace mihaildev\moderator\panel;
use Yii;
use yii\web\View;

/**
 * Class Component
 *
 * @package mihaildev\moderator\panel
 */
class Component extends \yii\base\Component{
	public $enabled = true;
	public $access;
	public $frameLayout = '@mihaildev/moderator/panel/frameLayout';
	protected $_widgets = [];
	public function init(){
		Yii::$app->getView()->on(View::EVENT_END_BODY, [$this, 'renderPanel']);
	}

	public function renderPanel(){
		if (!$this->checkAccess() || Yii::$app->getRequest()->getIsAjax()) {
			return;
		}

		echo ModeratorPanel::widget([]);
	}

	public function checkAccess()
	{
		if(!$this->enabled)
			return false;

		if(empty($this->access))
			return true;

		return Yii::$app->user->can($this->access);
	}

	public function registerWidget($id, $class, $options=[]){
		$this->_widgets[$id] = ['class'=>$class, 'options' => $options];
	}

	public function getWidgets(){
		return $this->_widgets;
	}
} 