<?php
	class TemplateSkipNode extends TemplateDoubleNode{
		
		protected $allowed_attributes = array("content");
		protected $attributes_aliases = array("content" =>array('skip'));
		
		
		function render(){
			return "";		
		}
		
		function nestedRender(){
			return str_replace('- >' , '->',$this->attributes["content"]);
		}
		
		function renderCall($dir_g, $helper_f, array $options= array()){
			return '';
		}
		
	}