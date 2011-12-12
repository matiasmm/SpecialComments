<?php

class TemplateThemeController{
	
	static private $o = null;
	private $default_theme = 'verano';
	
	private $actual_theme_set = array();
	private $actual_theme;
	
	private function __construct(){
                $this->actual_theme = sfConfig::get('sf_theme', 'verano');
		return $this;	
	}	
	
	static function getInstance(){
		if(is_null(self::$o)){
			self::$o = new self;	
		}
		
		return self::$o;
	}
	
	function getThemeArray(){
		if(count($this->actual_theme_set)){
			$r = $this->actual_theme_set;
		}else{
			$r = (array)'*';
		}
		return $r;
	}
	
	function setThemeArray($ar = array()){
		$this->actual_theme_set = $ar;
	}
	
	function getActualTheme(){
		return $this->actual_theme;
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