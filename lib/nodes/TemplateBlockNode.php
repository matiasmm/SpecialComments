<?php
	class TemplateBlockNode extends TemplateDoubleNode implements TemplateNodeVerifyWithContext{
		
		protected $mandatory_attributes = array("name");
		protected $allowed_attributes = array("name", "parameters");
		protected $attributes_aliases = array("name" =>array('block'));
		
		
		public $called_render_for_theme = array();
		
		static protected $blocks_rendered_call = array();
		
		
		
		protected function getParametersString($with_default=false){
			if(!$with_default)
			{
				$rtr='';
				$pars = explode(',',$this->attributes['parameters']);
				$i=0;
				foreach($pars as $p)
				{
					$rtr.= current(explode('=',$p));
					if(isset($pars[$i+1]))
						$rtr.=',';
					$i++;
				}
				return $rtr;
			}
			return $this->attributes['parameters'];
		}
		
		function render(){	
			
			$this->called_render_for_theme = TemplateThemeController::getInstance()->getThemeArray();
			
			$name = $this->attributes["name"];
			
			$pars = $this->getParametersString();
			
			return sprintf(<<<EOF
	<?php function t_$name($pars){ ?>
		%s
	<?php } ?>


EOF
	, trim(TemplateAttributeParser::getInstance()->render($this->content)));			
		}
		
		
		
		function nestedRender(){
			$name = $this->attributes["name"];
			$pars = $this->getParametersString();
			
			return sprintf(<<<EOF
	TemplateClassNode_ini public static function $name($pars){\n  ob_start();\n  ?>%s<?php \n  return ob_get_clean(); \n}\nTemplateClassNode_end

EOF
	, trim(TemplateAttributeParser::getInstance()->render($this->content)));		
		}
		
		function getAttrName(){
			return $this->attributes["name"];
		}
		
		function check(array $context){
			foreach($context as $n){
				if(get_class($n) == 'TemplateBlockNode'){
					if($n !== $this && $n->getAttrName() == $this->getAttrName()){
						$not_ok = true;
						$mg_theme ='';
						
						$comparten_theme = false;
						foreach($this->called_render_for_theme as $themes_where_applied){
							if(in_array($themes_where_applied, $n->called_render_for_theme)){
								$mg_theme = " for theme '$themes_where_applied'";
								$comparten_theme = true; 
							}
						}
						
						if(count($this->called_render_for_theme)){ //si tiene varios themes
							if($comparten_theme == false){
								$not_ok=false;
							}else{
								$not_ok=true;
							}
						} 
						
						if($not_ok){
							$name = $this->getAttrName();
							$f1= $this->info;
							$f2= $n->info;	
							throw new Exception("There are 2 helpers named '$name'$mg_theme in: \n'$f1' \nand:\n '$f2'");
						}
					}
				}
			}
		}
	
		
		function renderCall($helper_dir_name, $file_helper, array $opts = array()){
			
			$name = $this->attributes["name"];
			if(in_array($name ,self::$blocks_rendered_call)){ //Esto debe hacerse solo para los que devuelven un renderCall
				return '';
			}else{
				self::$blocks_rendered_call[] = $name;
			}
			
			
			$pars = $this->getParametersString(true);
			$pars2 = $this->getParametersString(false);
			
			$file_helper = (array_key_exists('theme', $opts))?  strtr($file_helper, array('.' .$opts['theme']. '.'=> ".'.TemplateThemeController::getInstance()->getActualTheme().'." )) : $file_helper;
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