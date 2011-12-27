<?php
	abstract class TemplateSingleNode extends TemplateBaseNode{
		
		
		
		final function __construct($attributes){
			foreach($attributes as $k=>$attr){
                            $this->attributes[$k] = trim($attr);
                        }
		}
		
		
	}