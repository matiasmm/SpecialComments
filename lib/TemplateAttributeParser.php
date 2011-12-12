<?php
class TemplateAttributeParser{
	

	public $attribute = 'tpl\:';
	public $content;
	
	
	private $html_ini;		
	private $html_end;
	private $capture;
	private $quote;
	private $not_quote;
	
	private $attributes;
	
	static private $object;
	
	public $context;
	
	private function __construct(){
		$this->html_ini =  '\<(?!\?)';
		$this->html_end = '(?<!\?)\>';
		$this->capture = '(?!'. $this->attribute. '|'. $this->html_end . ').+';
		$this->quote='[\"]'; #Solo se usaran comillas dobles. y Solo simples en etiquetas php
		$this->not_quote = '[^\"]';
		$this->context = TemplateParserContext::get();
	}
	
	function getInstance(){
		if(!self::$object){
			self::$object = new self;
		}
		
		return self::$object;
	}
		
	function render($content){
		$this->content = $content;
		
		return $this->searchAttributes();
	}
	
	private function searchAttributes(){
		
		
		
		$reg = $this->html_ini . $this->capture . $this->attribute. $this->capture. $this->html_end; 
		
		return preg_replace_callback('/'.$reg.'/' ,array($this, 'replace'), $this->content);
	}
	
	function replace($arr){
		
		$reg = $this->attribute . '([^\=]+)\='.$this->quote.'('.$this->not_quote.'*)'. $this->quote;
		
		$return = $arr[0];
		preg_match_all('/'. $reg .'/',  $return, $tpls); #Busco datos de tpl
		
		$return = preg_replace('/ *'. $reg .'/', '',$return); #Borro tpls
		
		
		foreach($tpls[1] as $key=> $atr){
			$this->context->setLine($this->context->searchLine($atr));
			$val = $tpls[2][$key];
			
			#Busco atributo afectado
			list($class, $real_attribute) = split('-', $atr);
			if(!$class || !$real_attribute){
				throw new Exception("Wrong syntax,  tpl:$atr. In file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
			}
			
			$reg = $real_attribute . '\='.$this->quote.'('.$this->not_quote.'*)'. $this->quote;
			preg_match_all('/'. $reg .'/',  $return, $ras); #Busco atributo afectado
			
			if(count($ras[1])>1){// nunca me tira esta excepcion. Volver a testear.
				throw new Exception("Can not repeat attribute: $real_attribute in the same tag. In file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
			}elseif(count($ras[1])<1){
				$real_attr_val = '';
			}else{
			$real_attr_val = $ras[1][0];
			}
			$replacement = $real_attribute.'="'.$this->getReplacementValue($class, $val, $real_attr_val).'"';
			$return = preg_replace('/'. $reg .'/', $replacement,$return); #realizo el reemplazo final
			
			
		}
		
		
		
		return $return;
	}
	
	private function getReplacementValue($class, $value_tpl, $value_real){
		$class = 'Template' . ucfirst($c=$class) . "Attribute";
		if(!class_exists($class))
			throw new Exception("Attribute tpl:$c-[attr] does not exist. In file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
		$obj = new $class;
		return $obj->render($value_tpl, $value_real);
		
	}
	
}
