<?php

function __autoload($class_name) {
    $base = dirname(__FILE__). '/lib/*';
    $path[] = $base;
    
    while(count($path) != 0){
        $v = array_shift($path);
        foreach(glob($v) as $item){
            if (is_dir($item))
                $path[] = $item . '/*';
            elseif (is_file($item)){
                 if(basename($item) == $class_name . '.php'){
                     require_once $item;
                     return;
                 }
            }
        }
    }
    require_once "./" . $class_name . ".php"; 
}

$con = new TemplateCreator();
$con->generateHelpersFromDir($argv['1'],$argv['2']);
