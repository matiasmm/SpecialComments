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
    
    /**
     * converts the tree of parsed nodes into a php file
     * @param FileNode $file_node
     * @param type $output_dir 
     */
    protected function parsedTreeToFile(FileNode $file_node, $output_dir){
        //render_to_files
        $base = str_replace($this->original_file_subfix, '',basename($file_node->getAttribute('file')));
        foreach($file_node->themes as $theme){
            $file_o = sprintf('%s/generated-helpers/%s.%s%s',$output_dir, $base, $theme, $this->output_file_subfix);
            file_put_contents($file_o, $file_node->render());
            echo shell_exec("php -l ". $file_o);
        }

        if(empty($file_node->themes)){
            $file_o = sprintf('%s/generated-helpers/%s%s',$output_dir, $base, $this->output_file_subfix);
            file_put_contents($file_o, $file_node->render());
            echo shell_exec("php -l ". $file_o);

        }
    }
}