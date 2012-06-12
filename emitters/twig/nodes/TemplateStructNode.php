<?php

class TemplateStructNode extends TemplateDoubleNode implements TemplateNodeVerifyWithContext {

    protected $mandatory_attributes = array();
    protected $allowed_attributes = array();
    protected $attributes_aliases = array();
    public $called_render_for_theme = array();
    static protected $blocks_rendered_call = array();
    
    protected $parameters = array();


    function render() {

        $this->called_render_for_theme = TemplateThemeController::getInstance()->getThemeArray();

        return sprintf(<<<EOF
%s
EOF
        ,trim($this->content));
    }

    function nestedRender() {
        return sprintf(<<<EOF
%s
EOF
        ,trim($this->content));
    }

    function getAttrName() {
        return $this->attributes["name"];
    }
    
    function check(array $context){}


}
