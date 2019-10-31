<?php


namespace appfront\controllers;


use yii\web\Controller;
use Yii;

class IndexController extends Controller
{
    function actionIndex()
    {

        $red = Yii::$service->cms->storage;
        var_dump($red);die;
    }
}