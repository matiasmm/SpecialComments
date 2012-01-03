<?php
	class TemplateUseAttribute implements TemplateAttribute{
		public function render($value_tpl, $value_design){
			return strtr($value_tpl, array(
			'{value}'=> $value_design,
			'{string}'=> $value_design,
			'{file}'=> basename($value_design)
			
			));
		}
}