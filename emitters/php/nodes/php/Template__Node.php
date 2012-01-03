<?php
	class Template__Node extends TemplateDoubleNode{

		
		protected $allowed_attributes = array('__');
		protected $mandatory_attributes = array();
		
		function render(){
			return "";		
		}
		
		function nestedRender(){
			$pars = trim($this->attributes['__']);
			
			if($pars){
				$pars = ', '. $pars;
			}
			
			return "<?= __('"  . trim($this->content) . "'" . $pars .") ?>";
		}
		
		function renderCall($dir_g, $helper_f, array $options= array()){
			return '';
		}
		
	}
