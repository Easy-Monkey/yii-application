<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
namespace yii\web\services;
use Yii;
use yii\base\InvalidConfigException;

/**
 * 此对象就是Yii::$service,通过魔术方法__get ， 得到服务对象，服务对象是单例模式。
 * @see http://www.fecshop.com/doc/fecshop-guide/develop/cn-1.0/guide-fecshop-service-abc.html
 *
 * @property \fecshop\services\Admin $admin admin service
 * @property \fecshop\services\AdminUser $adminUser adminUser service
 * @property \fecshop\services\Cache $cache cache service
 * @property \fecshop\services\Cart $cart cart service
 * @property \fecshop\services\Category $category category service
 * @property \fecshop\services\Cms $cms cms service
 * @property \fecshop\services\Coupon $coupon coupon service
 * @property \fecshop\services\Customer $customer customer service
 * @property \fecshop\services\Email $email email service
 * @property \fecshop\services\Event $event event service
 * @property \fecshop\services\Fecshoplang $fecshopLang fecshopLang service
 * @property \fecshop\services\Helper $helper helper service
 * @property \fecshop\services\Image $image image service
 * @property \fecshop\services\Order $order order service
 * @property \fecshop\services\Page $page page service
 * @property \fecshop\services\Payment $payment payment service
 * @property \fecshop\services\Point $point point service
 * @property \fecshop\services\Product $product product service
 * @property \fecshop\services\Request $request request service
 * @property \fecshop\services\Search $search search service
 * @property \fecshop\services\Session $session session service
 * @property \fecshop\services\Shipping $shipping shipping service
 * @property \fecshop\services\Sitemap $sitemap sitemap service
 * @property \fecshop\services\Store $store store service
 * @property \fecshop\services\Url $url url service
 *
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Application
{
    public $childService;
    public $_childService;


    public function __construct($config = [])
    {
        Yii::$service     = $this;
        $this->childService = $config;
    }
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