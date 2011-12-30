<?php

    class TemplatePhpNode extends TemplateSingleNode{


            protected $allowed_attributes = array("script", "php");
            protected $mandatory_attributes = array("php");

            function render(){
                    return "";
            }

            function nestedRender(){
                    return ($this->attributes['script'])? $this->attributes['script'] : $this->attributes['php'];
            }

           
    }