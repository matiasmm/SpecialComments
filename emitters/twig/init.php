<?php
function twig_emitter_autoload($class_name) {
    $path = array();
    $dir = realpath(dirname(__FILE__));
    
    
    $path[] = $dir . '/../twig/';
    $path[] = $dir . '/../php/';
    
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
}

spl_autoload_register("twig_emitter_autoload");

$dir = realpath(dirname(__FILE__));
require_once $dir . '/vendors/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

require realpath(dirname(__FILE__)) . '/TwigTemplateCreator.php';