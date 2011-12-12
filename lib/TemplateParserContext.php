<?php
class TemplateParserContext{
	
	static private $obj=0;

	private $pars = array(
		'file' =>'',
		'name' =>'',
		'line' =>'',
	);
	
	private $l_file ='';
	private $l_info =array();
	
	private function __construct(){}
	
	public function get(){
		if(!self::$obj){
			self::$obj = new TemplateParserContext();
		}
		
		return self::$obj;
	}
	
	
	public function setFile($file){
		$this->pars['file'] = $file;
	}
	
	public function getFile(){
		return $this->pars['file'];
	}
	
	public function setLine($n){
		$this->pars['line'] = $n;
	}
	
	public function getLine(){
		return $this->pars['line'];
	}
	
	public function setName($name){
		$this->pars['name'] = $name;
	}
	
	public function getName(){
		return $this->pars['name'];
	}
	

		
	public function searchLine($needle){
			$string = file_get_contents($file = TemplateParserContext::get()->getFile());
			
			if($this->l_file != $file){
				$this->l_file = $file;
				$this->l_info = array();
				if(!$this->l_file)
					return '?';
			}

			if($count = substr_count($string, $needle) == 1){
				$pos = strpos($string, $needle);
				return substr_count(substr($string, 0, $pos),"\n")+1;
			}else{
				$md5 = md5($needle);
				
				if(!array_key_exists($md5, $this->l_info)){
					$this->l_info[$md5] = array( 'next_pos' =>0 , 'prev_count' => 1);
				}
						
				$str = substr($string, $this->l_info[$md5]['next_pos']);
				$pos = strpos($str, $needle);
				$this->l_info[$md5]['prev_count'] =  substr_count(substr($str, 0, $pos),"\n")+$this->l_info[$md5]['prev_count'];
				$this->l_info[$md5]['next_pos'] = $pos+1;
				return $this->l_info[$md5]['prev_count'] ; 
				
			}
			
		}
	
}