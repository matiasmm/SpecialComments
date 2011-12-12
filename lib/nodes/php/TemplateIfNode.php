<?php
	class TemplateIfNode extends TemplateDoubleNode{

		
		protected $allowed_attributes = array("if");
		protected $mandatory_attributes = array("if");
		
		function render(){
			return "";		
		}
		
		function nestedRender(){
			return '<?php if(' . $this->attributes['if']  . '): ?>'. $this->content . '<?php endif; ?>';
		}
		
		function renderCall($dir_g, $helper_f, array $options= array()){
			return '';
		}
		
	}