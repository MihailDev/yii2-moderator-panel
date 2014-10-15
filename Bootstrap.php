<?php
/**
 * Date: 08.10.2014
 * Time: 23:18
 *
 * This file is part of the MihailDev project.
 *
 * (c) MihailDev project <http://github.com/mihaildev/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace mihaildev\moderator\panel;
use yii\base\BootstrapInterface;

/**
 * Class Bootstrap
 *
 * @package mihaildev\moderator\panel
 */
class Bootstrap implements BootstrapInterface{
	/**
	 * @inheritdoc
	 */
	public function bootstrap($app)
	{
		if (!$app->has('moderatorPanel')) {
			$app->set('moderatorPanel',['class'=>'mihaildev\moderatorpanel\Component']);
		}
	}
} 