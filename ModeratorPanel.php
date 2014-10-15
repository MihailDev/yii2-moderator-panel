<?php
/**
 * Date: 08.10.2014
 * Time: 22:38
 *
 * This file is part of the MihailDev project.
 *
 * (c) MihailDev project <http://github.com/mihaildev/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace mihaildev\moderator\panel;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class ModeratorPanel
 *
 * @package mihaildev\moderator\panel
 */
class ModeratorPanel extends Widget{
	public function init(){

	}

	public function run(){
		$component = \Yii::$app->get('moderatorPanel');
		/** @var Component $component */
		$items = [];
		foreach($component->getWidgets() as $widget){
			$content = call_user_func([$widget['class'], 'widget'], $widget['options']);
			if(!empty($content))
				$items[] = $content;
		}

		if(!empty($items)){
			echo Html::tag('div', 'MP', ['id'=>'moderator-panel-open-button','onclick'=>'mihaildev.moderatorPanel.buttonClick()']);

			echo Html::beginTag('div', ['id'=>'moderator-panel-frame']);
				echo Html::beginTag('div',['id'=>'moderator-panel-frame-header']);
					echo Html::tag('div', '&times;', ['id'=>'moderator-panel-frame-close','onclick'=>'mihaildev.moderatorPanel.closeFrame()']);
					echo Html::tag('div', 'Title', ['id'=>'moderator-panel-frame-title']);
				echo Html::endTag('div');
				echo Html::beginTag('div',['id'=>'moderator-panel-frame-body']);
				echo Html::endTag('div');
			echo Html::endTag('div');

			echo Html::beginTag('div', ['id'=>'moderator-panel']);
				echo Html::beginTag('div',['id'=>'moderator-panel-header']);
					echo Html::tag('div', '&times;', ['id'=>'moderator-panel-close','onclick'=>'mihaildev.moderatorPanel.buttonClick()']);
					echo Html::tag('div', 'MP', ['id'=>'moderator-panel-title']);
				echo Html::endTag('div');
			echo Html::beginTag('ul', ['id'=>'moderator-panel-menu']);
			echo '<li>'.implode('</li><li>', $items)."</li>";
			echo Html::endTag('ul');
			echo Html::endTag('div');


			echo '<style>' . $this->getView()->renderPhpFile(__DIR__ . '/assets/css.css') . '</style>';
			echo '<script>' . $this->getView()->renderPhpFile(__DIR__ . '/assets/js.js') . '</script>';
		}
	}

	public static function registerWidget($id, $class, $options=[]){
		$component = \Yii::$app->get('moderatorPanel');
		/** @var Component $component */
		$component->registerWidget($id, $class, $options);
	}

	public static function registerLink($id, $url, $title, $access="", $accessParams=[]){
		self::registerWidget($id, LinkWidget::className(), ['url'=>$url, 'title'=>$title, 'access'=>$access, "accessParams" => $accessParams]);
	}

	public static function registerFrame($id, $url, $title, $access="", $accessParams=[], $width=800, $height=600){
		self::registerWidget($id, FrameWidget::className(), ['url'=>$url, 'title'=>$title, 'access'=>$access, "accessParams" => $accessParams, 'width'=>$width, 'height'=>$height]);
	}

	public static function getFrameLayout(){
		$component = \Yii::$app->get('moderatorPanel');
		/** @var Component $component */
		return $component->frameLayout;
	}
} 