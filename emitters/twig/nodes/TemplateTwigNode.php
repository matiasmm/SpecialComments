<?php

    class TemplateTwigNode extends TemplateSingleNode{


            protected $allowed_attributes = array("script", "twig");
            protected $mandatory_attributes = array("twig");

            function render(){
                    return "";
            }

            function nestedRender(){
                    return ($this->attributes['script'])? $this->attributes['script'] : $this->attributes['twig'];
            }

           
    }