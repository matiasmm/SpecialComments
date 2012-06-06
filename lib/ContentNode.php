<?php
 
class ContentNode extends TemplateBaseNode{

    protected $content = '';

    public function  __construct($content){
        $this->content = $content->text;
    }

    public function render(){
        return $this->content;
    }

    public function  nestedRender() {
       return $this->content;
    }
}
