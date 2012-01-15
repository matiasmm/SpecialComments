<?php
class TwigTemplateCreator extends TemplateCreator{
    public $original_file_subfix = ".twig";
    public $output_file_subfix = ".php";
    
    protected static $twig;
    
    static function twigToPhp($string){
            $loader = new Twig_Loader_String();
            $twig = new Twig_Environment($loader);
            $twig->setCompiler(new TemplateTwigCompiler($twig));
        
        $module = $twig->parse($twig->tokenize($string, null)); 
        return $twig->compile($module);
    }
    
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
            file_put_contents($file_o, $twig->compileSource($file_node->render()));
            echo shell_exec("php -l ". $file_o);
        }

        if(empty($file_node->themes)){
            $file_o = sprintf('%s/generated-helpers/%s%s',$output_dir, $base, $this->output_file_subfix);
            file_put_contents($file_o, $file_node->render());
            echo shell_exec("php -l ". $file_o);

        }
    }
}