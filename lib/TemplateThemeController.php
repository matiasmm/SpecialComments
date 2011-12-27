<?php

class TemplateThemeController{
	
	static private $o = null;
	private $default_theme = 'summer';
	
	private $current_theme_set = array();
	private $current_theme;
	
	private function __construct(){
                $this->current_theme = 'none';
		return $this;	
	}	
	
	static function getInstance(){
		if(is_null(self::$o)){
			self::$o = new self;	
		}
		
		return self::$o;
	}
	
	function getThemeArray(){
		if(count($this->current_theme_set)){
			$r = $this->current_theme_set;
		}else{
			$r = (array)'*';
		}
		return $r;
	}
	
	function setThemeArray($ar = array()){
		$this->current_theme_set = $ar;
	}
	
	function getActualTheme(){
		return $this->current_theme;
	}
	
	function loadClass($className){
		$f = realpath(dirname(__FILE__) . "/..") . '/generated-classes/'.$className;
		if(file_exists($d = $f . $this->getActualTheme(). '.php')){
			require $d;
		}else{
			require $f. '.php';
		}
		
	}
	
}