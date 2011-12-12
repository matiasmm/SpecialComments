<?php
class TemplateBlockShowNode extends TemplateBlockNode{
	function nestedRender(){
				$name = $this->attributes["name"];
				$pars = $this->getParametersString();
	
				
				return sprintf(<<<EOF
					<?= t_$name($pars); ?>
EOF
	);	
			}
			
	function renderCall($helper_dir_name,$file_helper, array $options= array()){
			$name = $this->attributes["name"];
			$pars = $this->getParametersString(true);
			$pars2 = $this->getParametersString(false);
			
			$name = $this->attributes["name"];
			if(in_array($name ,self::$blocks_rendered_call)){ 
				return '';
			}else{
				self::$blocks_rendered_call[] = $name;
			}
			
			return sprintf(<<<EOF
			
	function $name($pars){ 
		if(!function_exists("t_$name"))
			require(dirname(__FILE__).'/$helper_dir_name/$file_helper');
		ob_start();
		t_$name($pars2);
		return ob_get_clean();
		
	}
EOF
	, $this->content);	
		}
}