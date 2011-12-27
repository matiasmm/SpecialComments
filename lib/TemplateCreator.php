<?php
class TemplateCreator{
	private $t_files = array();
	private $nodes = array();
	private $parser;
	
	static public $file_subfix = ".html";
	static public $skip = array(".", "..", ".svn");
	
	static public $name_helper_file = "TemplateHelper.php";
	
	protected $output = array();
	protected $single_output = "<?php\n";
	
	protected $generated_files = array();
	
	
	function generateHelpersFromDir($dir, $output_dir){

                $this->emptyOutputDir($output_dir);
		echo "\n Searching template files\n";
		$this->getTemplateFiles($dir);
                foreach($this->t_files as $file){
                    $this->createTree($file, $output_dir);
                    echo " 4/6 Checking\n";
                    $this->verify();
                    echo " 5/6 Creating files\n";
                    $this->exportToFiles($output_dir);
                    echo " 6/6 Checking syntax of TemplateHelper.php with php -l\n";
                    $out = $this->checkPhpSyntax($output_dir);
                    echo $out;
                }
		return true;
	}

	
	protected function exportToFiles($output_dir){
		if(!file_exists($output_dir)){
			throw new Exception("The output directory doesn't exist.");
		}
		
		
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
	
	
	
	protected function emptyOutputdir($dir_p){
                $output_dir = realpath($dir_p);
                if($output_dir === false){
                        throw new Exception("Wrong output directory given: $dir_p");
                }


		$g = $output_dir . '/generated-helpers';
		if(!file_exists($g)){
			mkdir($g);
                        return;
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
	

	
	
	
	protected function verify(){
		foreach($this->nodes as $n){
			TemplateParserContext::get()->setFile($n->getInfo());
			if($n instanceof TemplateNodeVerifyWithContext){
				$n->check($this->nodes);
			}
		}
	}
	
	protected function createTree($file, $output_dir){
            $lexer = new ListLexer(file_get_contents($file));
            $parser = new ListParser($lexer);
            $parser->parse(); // begin parsing at rule list
            $fn = new FileNode(array('file' => $file), $parser->tree);
            
            $fn->buildContent();

            //render_to_files
            $base = str_replace(self::$file_subfix, '',basename($file));
            foreach($fn->themes as $theme){
                $file_o = sprintf('%s/generated-helpers/%s.%s.php',$output_dir, $base, $theme);
                file_put_contents($file_o, $fn->render());
            }
            
            if(empty($fn->themes)){
                $file_o = sprintf('%s/generated-helpers/%s.php',$output_dir, $base);
                file_put_contents($file_o, $fn->render());
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
				if(substr($base, strlen($base) - strlen(self::$file_subfix)) == self::$file_subfix){
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
