<?php

function __autoload($class_name) {
    $base = dirname(__FILE__). '/lib/*';

    
    $path[] = $base;

    while(count($path) != 0)
    {
        $v = array_shift($path);
        foreach(glob($v) as $item)
        {
            if (is_dir($item))
                $path[] = $item . '/*';
            elseif (is_file($item))
            {
                 if(basename($item) == $class_name . '.php'){
                     require_once $item;
                     return;
                 }
            }
        }
    }
    
}


$con =new TemplateController();
$con->generateHelpersFromDir(dirname(__FILE__)."/templates",dirname(__FILE__)."/helper" );
