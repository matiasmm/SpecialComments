<?php
class TemplateClassNode extends TemplateDoubleNode implements TemplateNodeVerifyWithContext{
		
    protected $mandatory_attributes = array("name");
    protected $allowed_attributes = array("name");
    protected $attributes_aliases = array("name" =>array('class'));

    protected $called_render_call = false;

    public $called_render_for_theme = array();


    protected function concatContent(TemplateNode $content_node){

        if($content_node instanceof ContentNode){
            return;
        }

        $this->content .= $content_node->render();
    }

    function render(){

            $this->called_render_for_theme = TemplateThemeController::getInstance()->getThemeArray();
            $name = $this->attributes["name"];


            return sprintf(<<<EOF
<?php 
class Base$name{
%s
}

EOF
, $this->content);


            return sprintf(<<<EOF
<?php 
TemplateThemeController::getInstance()->loadClass('Base$name');

class $name extends Base$name{ 

} ?>


EOF
);			
    }
		
		
		
		
		function nestedRender(){
			return "";
		}
		
		function getAttrName(){
			return $this->attributes["name"];
		}
		
		function check(array $context){
			foreach($context as $n){
				if($n instanceof TemplateClassNode){
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
							throw new Exception("There are 2 classes named '$name' in: \n'$f1' \nand:\n '$f2'");
						}
					}
				}
			}
		}
		
		function renderCall($helper_dir_name,$file_helper, array $options= array()){
			
			if($this->called_render_call == true)
				return '';
			$this->called_render_call = true;
			
			return '';
		}
		
	}
