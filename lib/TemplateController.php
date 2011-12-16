<?php
class TemplateController{
	private $t_files = array();
	private $nodes = array();
	private $parser;
	
	static public $file_prefix = "t_";
	static public $file_subfix = ".phtml";
	static public $skip = array(".", "..", ".svn");
	
	static public $name_helper_file = "TemplateHelper.php";
	
	protected $output = array();
	protected $single_output = "<?php\n";
	
	protected $generated_files = array();
	
	function __construct(){
		$this->parser = new TemplateParser();
		
	}
	
	function generateHelpersFromDir($dir, $output_dir){
		echo "\n 1/6 Searching template files\n";
		$this->getTemplateFiles($dir);
		echo " 2/6 Parsing files\n";
		$this->generateNodes();
		echo " 3/6 Preparing output\n";
		$this->generateOutput();
		echo " 4/6 Checking\n";
		$this->verify();
		echo " 5/6 Creating files\n";
		$this->exportToFiles(realpath($output_dir));
		echo " 6/6 Checking syntax of TemplateHelper.php with php -l\n";
		$out = $this->checkPhpSyntax($output_dir);
		echo $out;
		
		return true;
	}
	
	
	protected function exportToFiles($output_dir){
		if(!file_exists($output_dir)){
			throw new Exception("The output directory doesn't exists.");
		}
		
		$this->emptyOutputdir($output_dir);
		$g = $output_dir . '/generated-helpers';
		
		foreach($this->output as $file => $arr){
			foreach($arr['themes'] as $t){
				$this->generated_files[] = $name = $this->getOutputNameFile($g, $file, $t);
				TemplateThemeController::getInstance()->setThemeArray();
				
				$out_f = '';
				foreach($arr as $ik=>$i){
					if(is_numeric($ik)){
						$this->single_output .= $i["n"]->renderCall('generated-helpers',basename($name), array('theme'=> $t));
						$out_f .= $i["string"];
					}
				}
				
				file_put_contents($name, $out_f);
			}
		}
		file_put_contents($output_dir . '/' . self::$name_helper_file , $this->single_output);
	}
	
	
	
	protected function emptyOutputdir($output_dir){
		$g = $output_dir . '/generated-helpers';
		if(!file_exists($g)){
			mkdir($g);	
		}
		$arr  = scandir($g);
		
		foreach($arr as $f){
			if(is_file($g.'/'.$f)){
				unlink($g.'/'.$f);
			}
		}
		
	}
	
	private $file_names_o = array();
	protected function getOutputNameFile($output_dir, $file, $prefix='', $level =0){
		$base  = basename($file, self::$file_subfix);
		
		$sub = ($level)? '-'. $level : '';
		$prefix_a = ($prefix == '*')? '' : '.'. $prefix;
		$candidate_name = $output_dir.'/'. $base .$sub . $prefix_a. ".php";
		if(file_exists($candidate_name  )){
			$name = $this->getOutputNameFile($output_dir, $file, $prefix, $level +1);
		}else{
			$name = $candidate_name;
		}
				 
		$this->file_names_o[] = $name;
		return $name;
	}
	
	protected function generateOutput(){
		foreach($this->nodes as $n){
			$hash = $n->getInfo();
			TemplateParserContext::get()->setFile($hash);
			if(!array_key_exists($hash, $this->output)){
				$k = 0;
				$this->output[$hash] = array();	
			}
			$this->output[$hash][$k] = array();
			
			if($k === 0){
				TemplateThemeController::getInstance()->setThemeArray();
			}
			$this->output[$hash][$k]['string'] = $n->render();
			$this->output[$hash][$k]['n'] = $n;
			
			if($n instanceof TemplateNodeVerifyWithContext){
				$n->called_render_for_theme = TemplateThemeController::getInstance()->getThemeArray();
			}
			
			if($k === 0){
				$this->output[$hash]['themes'] = TemplateThemeController::getInstance()->getThemeArray();
			}
			$k++;
		}
	}
	
	
	
	protected function verify(){
		foreach($this->nodes as $n){
			TemplateParserContext::get()->setFile($n->getInfo());
			if($n instanceof TemplateNodeVerifyWithContext){
				$n->check($this->nodes);
			}
		}
	}
	
	protected function generateNodes(){
		
		$syntax = new TemplateSyntaxChecker();
		TemplateClassNode::emptyOutputDir();
		foreach($this->t_files as $file){
			TemplateParserContext::get()->setFile($file);
			$this->parser->reset($file);
			$this->parser->parseString($syntax->parseTagsInHtml(file_get_contents($file)), $file);
			$this->nodes = array_merge($this->nodes,$this->parser->getNodes());
		}
	
		
		
	}
	

	
	/**
	 * fills $t_files
	 * 
	 * @param $dir
	 * @return 
	 */
	private function getTemplateFiles($dir_p){
		$dir = realpath($dir_p);
		if($dir === false){
			throw new Exception("Wrong template directory given: $dir_p");
		}
		
		$scan = scandir($dir);
		
		foreach($scan as $fd){
			$base = basename($dir."/".$fd);
			
			if(is_dir($dir."/".$fd)){
				if(!in_array($base,self::$skip)){
					$this->getTemplateFiles($dir . "/". $base);					
				}
			}else{
				if(strpos($base, self::$file_prefix)===0){
					$this->t_files[] = $dir . "/". $base;	
				}
			}
		}
		
	}
	
	private function checkPhpSyntax($output_dir)
	{
		$out = shell_exec("php -l ".$output_dir.'/'.self::$name_helper_file);
		/*
		foreach($this->generated_files as $file){
			@chmod($file, 0777); 
			$out .= shell_exec($file);	
		}*/
		
		return $out;	
	}
	
	
}
