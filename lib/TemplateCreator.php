<?php
abstract class TemplateCreator{
	protected $t_files = array();
	protected $nodes = array();
	protected $parser;
	
	static public $skip = array(".", "..", ".svn");
	
	protected $output = array();
	
	protected $generated_files = array();
	private $file_names_o = array();
	
	function generateHelpersFromDir($dir, $output_dir){

        $this->emptyOutputDir($output_dir);
		$this->getTemplateFiles($dir);
                foreach($this->t_files as $file){
                    printf("Generating Functions for \n\t%s\n", $file);
                    $file_node = $this->createTree($file);
                    $this->parsedTreeToFile($file_node, $output_dir);
                }
		return true;
	}

        /**
         * Deletes all content in dir $dir_p
         * @param type $dir_p
         */
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
	
	protected function getOutputNameFile($output_dir, $file, $prefix='', $level =0){
		$base  = basename($file, $this->original_file_subfix);
		
		$sub = ($level)? '-'. $level : '';
		$prefix_a = ($prefix == '*')? '' : '.'. $prefix;
		$candidate_name = $output_dir.'/'. $base .$sub . $prefix_a. $this->output_file_subfix;
		if(file_exists($candidate_name  )){
			$name = $this->getOutputNameFile($output_dir, $file, $prefix, $level +1);
		}else{
			$name = $candidate_name;
		}
				 
		$this->file_names_o[] = $name;
		return $name;
	}
	
        /**
         * Converts the content of a template file into a tree of all nodes parsed
         * using Parser and Lexer
         * @param string $file
         */
	protected function createTree($file){
            $lexer = new ListLexer(file_get_contents($file));
            $parser = new ListParser($lexer);
            $parser->parse(); // begin parsing at rule list
            $fn = new FileNode(array('file' => $file), $parser->tree);
            $fn->file = $file;
            
            $fn->buildContent();

            return $fn;
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
				if(substr($base, strlen($base) - strlen($this->original_file_subfix)) == $this->original_file_subfix){
					$this->t_files[] = $dir . "/". $base;	
				}
			}
		}
		
	}
	
}
