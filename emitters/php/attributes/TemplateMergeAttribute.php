<?php
class TemplateMergeAttribute implements TemplateAttribute{
	public function render($value_tpl, $value_design){
		return $value_tpl . ' '. $value_design;
	}
}