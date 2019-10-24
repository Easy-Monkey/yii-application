<?php


namespace appfront\controllers;


use yii\web\Controller;
use Yii;
use blog\services\Cms;

class IndexController extends Controller
{
    function actionIndex()
    {

        $red = Yii::$service->cms;
        var_dump($red);die;
    }
}