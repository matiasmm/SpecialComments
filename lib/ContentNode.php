<?php
 
class ContentNode extends TemplateBaseNode{

    protected $content = '';

    public function  __construct($content){
        $this->content = $content->text;
    }

    public function render(){
        return $this->content;
    }

    public function  renderCall($generated_dir_name, $helper_base_file, array $options = array()) {
        ;
    }

    public function  nestedRender() {
        ;
    }
}
