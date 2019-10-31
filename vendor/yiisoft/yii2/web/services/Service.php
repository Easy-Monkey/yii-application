<?php

namespace yii\web\services;

use Yii;

use yii\base\BaseObject;
use yii\base\InvalidConfigException;
/**
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Service extends  BaseObject
{
    public $childService;
    public $_childService;

    /**
     * 得到services 里面配置的子服务childService的实例
     */
    public function getChildService($childServiceName){
        if(!$this->_childService[$childServiceName]){
            $childService = $this->childService;
            if(isset($childService[$childServiceName])){
                $service = $childService[$childServiceName];
                $this->_childService[$childServiceName] = Yii::createObject($service);
            }else{
                throw new InvalidConfigException('Child Service ['.$childServiceName.'] is not find in '.get_called_class().', you must config it! ');
            }
        }
        return $this->_childService[$childServiceName];
    }

    /**
     *
     */
    public function __get($attr){
        return $this->getChildService($attr);

    }

}