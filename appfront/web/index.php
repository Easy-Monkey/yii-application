<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

$http = ($_SERVER['SERVER_PORT'] == 443) ? 'https' : 'http';
$homeUrl = $http . '://'.$_SERVER['SERVER_PORT'].rtrim(dirname($_SERVER['SCRIPT_NAME']),'\\/');


require __DIR__ . '/../../vendor/autoload.php';
//require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';

require(__DIR__ . '/../../vendor/fancyecommerce/blog/yii/Yii.php');

require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../config/bootstrap.php';
$fecmall_common_main_local_config = require(__DIR__ . '/../../common/config/main-local.php');

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    $fecmall_common_main_local_config,
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php',

    require (__DIR__ . '/../../vendor/fancyecommerce/blog/config/fecshop.php'),
    require (__DIR__ . '/../../vendor/fancyecommerce/blog/app/appfront/config/appfront.php'),


//    require __DIR__ .'/../../vendor/fancyecommerce/fecshop/app/appfront/config/appfront.php',

    // 公共配置
    require __DIR__ . '/../../common/config/fecshop_local.php',

    // 本地入口配置
    require __DIR__ . '/../config/fecshop_local.php'

);

$config['homeUrl'] = $homeUrl;

/**
 * 添加fecshop的服务 ，Yii::$service  ,  将services的配置添加到这个对象。
 * 使用方法：Yii::$service->cms->article;
 * 上面的例子就是获取cms服务的子服务article。
 */
//new blog\services\Application($config['services']);

new yii\web\services\Application($config['services']);
unset($config['services']);

$application = new yii\web\Application($config);
$application->run();
