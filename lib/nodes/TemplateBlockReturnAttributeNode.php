<?php
	class TemplateBlockReturnAttributeNode  extends TemplateBlockNode{
		protected $mandatory_attributes = array("name", "attribute");
		protected $allowed_attributes = array("name", "parameters", "attribute", "is_method");
		
		protected $is_nested = false;
		
		function render(){
			
			if($this->is_nested = true)
				return ;
			
			$this->called_render_for_theme = TemplateThemeController::getInstance()->getThemeArray();
			
			$name = $this->attributes["name"];
			$attribute = $this->attributes["attribute"];
			$pars = $this->getParametersString();
			
			$content = TemplateAttributeParser::getInstance()->render($this->content);
			preg_match('/'. $attribute .'=\"([^\"]*)\"/', $content, $reg); 
			
			
			$content = array_key_exists(1,$reg)? $reg[1]: "";
			
			return sprintf(<<<EOF
	<?php function t_$name($pars){ ?>%s<?php } ?>
	
EOF
	, $content);			
		}
		
		function renderCall($generated_dir_name, $helper_base_file, array $options= array()){
			return;
		}
		
		function nestedRender(){
			$name = $this->attributes["name"];
			$attribute = $this->attributes["attribute"];
			$is_method = ($this->attributes["is_method"] == strtolower('false'))? false : (bool)$this->attributes["is_method"];
			$pars = $this->getParametersString();
			
			$content = TemplateAttributeParser::getInstance()->render($this->content);
			
			preg_match('/'. $attribute .'=\"([^\"]*)\"/', $content, $reg); 
			
			
			$content = array_key_exists(1,$reg)? $reg[1]: "";
			$content = trim($content);
			
			if($is_method){
				return "TemplateClassNode_ini public static function $name(){\n  ob_start();\n  ?>" . $content . "<?php \n  return ob_get_clean(); \n}\nTemplateClassNode_end";	
			}else{
				return "TemplateClassNode_ini public static \$$name = \"" . $content . "\";\nTemplateClassNode_end";
			}			
		}
	}