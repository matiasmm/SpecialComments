<?php
function php_emitter_autoload($class_name) {
    $path[] = realpath(dirname(__FILE__));
    
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

spl_autoload_register("php_emitter_autoload");

class PhpTemplateCreator extends TemplateCreator{
    public $original_file_subfix = ".html";
    public $output_file_subfix = ".php";
}