<?php
	class TemplateThemesNode extends TemplateSingleNode{

		
		protected $allowed_attributes = array("themes");
		protected $mandatory_attributes = array("themes");

		function render(){
			$array= (array)split(',',$this->attributes['themes']);

			return "";
		}
		
		function nestedRender(){
			return '';
		}
		
		function renderCall($dir_g, $helper_f, array $options = array()){
			return '
			//Themes: '. $this->attributes['themes'];
		}
		
	}