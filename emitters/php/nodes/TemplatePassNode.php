<?php

    class TemplatePassNode extends TemplateSingleNode{


            protected $allowed_attributes = array("script", "pass");
            protected $mandatory_attributes = array("pass");

            function render(){
                    return "";
            }

            function nestedRender(){
                    return ($this->attributes['script'])? $this->attributes['script'] : $this->attributes['pass'];
            }

           
    }