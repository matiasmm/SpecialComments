<?php
class TemplateSyntaxChecker{
	
	private $str;
	private $last;
	private $actual;
	private $parsed;
	
	function parseTagsInHtml($str){
		$this->init($str);
		$this->CountDoubleTags();
		return $str;	
		
		
		while($a = $this->now()){
			
			if($a == '<'){
					$e = $this->search_next('>');
					//echo substr($this->str, $this->actual+1, $e-1);	
					//die();	
			}
			
			$this->parsed .= $a;
			$this->go(1);
		}
	
		return $this->parsed;
		
	}
	
	
	
	
	
	
	private function setHtml(){
		
	}
	
	
	
	
	
	
	
	private function init($str){
		$this->str = $str;
		$this->parsed = $str;
		$this->last = strlen($str);
		$this->actual = 0;
	}
	
	private function go($par){
		$this->actual = $this->actual + $par;
		return $this->str[$this->actual];
	}
	private function search_next($char){
		$k=0;
		while($char != $this->get(++$k));
		
		if($char ==$this->get($k))
			return $k;
		//error
		
	}
	private function get($par){
		return $this->str[$this->actual + $par];
	}
	private function now(){
		if($this->actual<$this->last)
			return $this->str[$this->actual];
		else
			return false;
	}
	private function getParsedString(){
		return $this->str;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	private function CountDoubleTags(){
		$r=array();
		preg_match_all('/<!---[\s]*([\/]?[\s]*(?:(?!\-\-\-)[^\s\:])+)(?:(?!\-\-\-).)*/i', $this->str, $r);
		
		$ar=array(array(),array());
		$file = TemplateParserContext::get()->getFile();
		
		foreach($r[1] as $k=>$v){
			if($r[0][$k][strlen($r[0][$k])-1] == '/'){
				continue;
			}
			
			if($v[0] == '/'){
				$p=strtolower(trim(substr($v, 1)));
				if(!array_key_exists($p, $ar[1]))
					$ar[1][$p] = 0;
				$ar[1][$p]++; // cuenta los que cierran
			}else{
				$p=strtolower(trim($v));
				if(!array_key_exists($p, $ar[0]))
					$ar[0][$p] = 0;
				$ar[0][$p]++; // cuenta los que abren
			}
		}
			
			foreach($ar[0] as $k=>$count){
				if(!array_key_exists($k,$ar[1])){
					throw new Exception("Hay $count etiquetas '$k' que abren y ninguna que cierran. In file: '$file'");
				}elseif($count != $ar[1][$k]){
					$count2=$ar[1][$k];
					throw new Exception("Hay $count etiquetas '$k' que abren y '$count2' que cierran. In file: '$file'");
				}
			}
			foreach($ar[1] as $k=>$count){
				if(!array_key_exists($k,$ar[0])){
					throw new Exception("Hay $count etiquetas '$k' que cierran y ninguna que abren. In file: '$file'");
				}elseif($count != $ar[0][$k]){
					$count2=$ar[0][$k];
					throw new Exception("Hay $count etiquetas '$k' que cierran y '$count2' que abren. In file: '$file'");
				}
			}
			
		}
		
		
}