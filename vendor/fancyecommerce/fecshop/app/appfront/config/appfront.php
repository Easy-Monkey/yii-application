<?php

$modules = [];
foreach (glob(__DIR__.'/modules/*.php') as $filename){
    $modules = array_merge($modules,require($filename));
}

$params = require __DIR__.'/params.php';

return [
    'modules'=>$modules,
    'bootstrap' => ['store'],

];