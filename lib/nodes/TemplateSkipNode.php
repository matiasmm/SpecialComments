<?php
	class TemplateSkipNode extends TemplateDoubleNode{
		
		protected $allowed_attributes = array("content");
		protected $attributes_aliases = array("content" =>array('skip'));
		
		
		function render(){
			return "";		
		}
		
		function nestedRender(){
			return $this->attributes["content"];
		}
		
		
		
	}