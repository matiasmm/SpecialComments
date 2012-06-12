<?php
class TwigTemplateCreator extends TemplateCreator{
    public $original_file_subfix = ".html";
    public $output_file_subfix = ".html.twig";
    
    
    /**
     * converts the tree of parsed nodes into a php file
     * @param FileNode $file_node
     * @param type $output_dir 
     */
    protected function parsedTreeToFile(FileNode $file_node, $output_dir){
        
        //render_to_files
        $base = str_replace($this->original_file_subfix, '',basename($file_node->getAttribute('file')));
        foreach($file_node->themes as $theme){
            $file_o = sprintf('%s/%s.%s%s',$output_dir, $base, $theme, $this->output_file_subfix);
            file_put_contents($file_o, $file_node->render());
	    printf("\n  Generated %s\n", $file_o);
        }

        if(empty($file_node->themes)){
            $file_o = sprintf('%s/%s%s',$output_dir, $base, $this->output_file_subfix);
            file_put_contents($file_o, $file_node->render());
	    printf("\n  Generated %s\n", $file_o);
        }
    }
}
