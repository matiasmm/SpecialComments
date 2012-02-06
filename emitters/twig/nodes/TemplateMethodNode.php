<?php
class TemplateMethodNode extends TemplateBlockNode{
	
			
	protected $mandatory_attributes = array("name");
	protected $allowed_attributes = array("name", "parameters");
	protected $attributes_aliases = array("name" =>array('block', 'method'));
	
        protected $parameters = array();
        
	function nestedRender(){
			$name = $this->attributes["name"];
			$pars = $this->getParametersString(true);
			
			return sprintf(<<<EOF
	public function $name($pars){\n  \n %s\n return \$this->twig->render("%s", \$context); \n }\n

EOF
	, $this->createContext() 
        , strtr(trim($this->content), array('"' => '\"')));
	}
	
	function renderCall($helper_dir_name,$file_helper, array $options= array()){
		return ;
	}
	
	function check(array $context){
		return ;
	}
	
	function render()
	{
		return $this->nestedRender();
	}
}
