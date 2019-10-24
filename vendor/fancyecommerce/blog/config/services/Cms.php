<?php
return [
    'cms' => [
        'class' => 'yii\web\services\Cms',

        # 子服务
        'childService' => [
            'article' => [
                'class'             => 'blog\services\cms\Article',
                'storage' => 'mysqldb', # mysqldb or mongodb.
            ],
        ],
    ],
];