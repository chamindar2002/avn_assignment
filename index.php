<?php
// change the following paths if necessary
//$yii='D:\yiiframework\framework\yii.php';
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

//define('ENFORCE_AUTHENTICATION',true);
define('ENFORCE_AUTHENTICATION',false);
define('CURRENCY','LKR');

require_once($yii);
Yii::createWebApplication($config)->run();
