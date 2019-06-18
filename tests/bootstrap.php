<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../vendor/yiisoft/yii/framework/yii.php';

Yii::$enableIncludePath = false;
Yii::setPathOfAlias('tests', __DIR__ . '/../vendor/yiisoft/yii/tests');
Yii::import('tests.*');
