<?php
class TemplateImageAttribute implements TemplateAttribute{
	public function render($value_tpl, $value_design){
		if(!function_exists('template_image'))
			require dirname(__FILE__) . '/../../../spTemplateHandlerPlugin/lib/helper/spTemplateHelper.php';
		
		return strtr($value_tpl, array(
			'{file}'=> template_image(basename($value_design)),
		));
	}
	
}