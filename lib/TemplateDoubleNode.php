<?php
	abstract class TemplateDoubleNode extends TemplateBaseNode{
		
		protected $content;		
		
		final function __construct($attributes, $content){
			$this->attributes = $attributes;
			$this->content = $content;
		}
		
		
	}