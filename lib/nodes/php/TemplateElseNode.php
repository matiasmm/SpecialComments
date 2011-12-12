<?php
	class TemplateElseNode extends TemplateSingleNode{

		
		protected $allowed_attributes = array();
		protected $mandatory_attributes = array();
		
		function render(){
			return "";		
		}
		
		function nestedRender(){
			return '<?php else: ?>';
		}
		
		function renderCall($dir_g, $helper_f, array $options= array()){
			return '';
		}
		
	}