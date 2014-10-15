<?php
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;

BootstrapAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
	</head>
	<body>
	<?php $this->beginBody() ?>
	<div class="container" style="padding-top: 10px;">
		<?= $content ?>
	</div>
	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>