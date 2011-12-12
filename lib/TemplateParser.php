<?php

    class TemplateParser{
        //http://www.pcre.org/pcre.txt
        
        private $tag1 = '\<\!---(?!\/)'; //double node open 
        private $tag1_end = '(?<!\/)---\>'; //double node open 
        private $tag2 = '\<\!---\/'; //double node close
        private $tag2_end = '(?<!\/)---\>'; //double node close
        private $type2_end = '\/---\>'; //single node open 
        
        private $attr_sep =":";
        private $arr_sep =",";
        
        private $info;
        
        
        private $nodes = array();
        
        private function getRegexToReplaceMark(){
            $tag1 = $this->tag1;
              $tag1_end = $this->tag1_end;
              $tag2 = $this->tag2;
              $tag2_end = $this->tag2_end;
              $any = '[\s\S]';
              
              $type2_end = $this->type2_end;
              
              //$tag2_end|$tag2|$tag1|$tag1_end|$type2_end
              $regex2 = "$tag1((?:(?!$type2_end|$tag2_end|$tag1_end)$any)+)$type2_end";
              
              $in = "$tag1(?:(?!$tag2_end|$tag2|$tag1|$tag1_end)$any)+$tag1_end";
              $end = "$tag2(?:(?!$tag2_end|$tag2|$tag1|$tag1_end)$any)+$tag2_end";
              
              $mark = $this->mark;
              
              return $regex = "/$in".$mark."$end/";
              
        }
        
        private function getRegex(){
            $tag1 = $this->tag1;
              $tag1_end = $this->tag1_end;
              $tag2 = $this->tag2;
              $tag2_end = $this->tag2_end;
              $any = '[\s\S]';
              
              $type2_end = $this->type2_end;
              
              $regex2 = "$tag1((?:(?!$type2_end|$tag2_end|$tag1_end)$any)+)$type2_end";
              
              $in = "$tag1(?:(?!$tag2_end|$tag2|$tag1|$tag1_end|$type2_end)$any)+$tag1_end";
              $end = "$tag2(?:(?!$tag2_end|$tag2|$tag1|$tag1_end|$type2_end)$any)+$tag2_end";
              
              $capture = "(?:(?!$tag2|$tag1)$any)*";
              
              $regex1="$in(?:($capture)|(?R))$end";
              
              return "/(?:$regex1|$regex2)/";
        }
        
        
        function reset($info){
            $this->info = $info;
            $this->nodes = array();
        }
        
        function parseString($string){
            $pattern = $this->getRegex();
        
            $string  = preg_replace_callback(
                   $pattern,
                array($this, "parse"),
                  $string );
                  
                  
                  if(preg_match($pattern, $string)){
                      $string = $this->parseString($string);    
                }
        
              return $string;     
        }
        
        private $mark = "dsa909092sa£";
        
        private function parse($matches){
            $context = TemplateParserContext::get();
            $search  = substr($matches[0], 0, strpos($matches[0], '--->'));
            $context->setLine($context->searchLine($search));
            
            if(array_key_exists(2, $matches)){
                list($name, $attributes) = $this->getNameAndAttributes($matches[0]);
                  $node = $this->createSingleNode($name, $attributes);
                  $matches[0] = $node->nestedRender();
              }else{
                  list($name, $attributes) = $this->getNameAndAttributes($matches[0]);
                  $node = $this->createDoubleNode($name, $attributes, $matches[1]);
                  $matches[0] = str_replace($matches[1], $this->mark, $matches[0]);
                   
                  
                  $matches[0] = preg_replace(
                      $this->getRegexToReplaceMark()
                      ,$node->nestedRender(),$matches[0]     
                  );
                  
                  if(strpos($matches[0], $this->mark)){
                      echo $matches[0]. "\n";
                      echo $this->info;
                      throw new Exception("Internal error,Unable to replace mark for nested blocks, Probably caused couse a syntax error on template file. In file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
                  }
              }
              
            
              return $matches[0];
              
        }
        
        
        
        
        private function createSingleNode($name, $attributes){
            $class = $this->getClassNode($name, 'single');
            $this->nodes[] = $n = new $class($attributes);
            $n->setup($this->info);
            return $n;
        }
        
        function getNodes(){
            return $this->nodes;
        }
        
        private function createDoubleNode($name, $attributes, $content){
            $class = $this->getClassNode($name, 'double');
            $this->nodes[] = $n = new $class($attributes, $content);
            $n->setup($this->info);
            return $n;
        }
        
        private function getClassNode($name, $tag_type){
            $class = "Template" .$name. "Node";
            
            if(!class_exists($class)){
                throw new Exception("There is not a tag called '$name'. in file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
            }
        
            $cl_parents = class_parents($class);
            
            if($tag_type == 'single'){
                if((in_array('TemplateDoubleNode', $cl_parents))){
                    throw new Exception("$name has a sintax like <!---$name---><!---/$name--->    And can not be like <!---$name/---> in file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
                }
            }else{
                if((in_array('TemplateSingleNode', $cl_parents))){
                    throw new Exception("$name has a sintax like  <!---$name/--->    And can not be like <!---$name---><!---/$name---> in file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
                }            
            }
            
            return $class;
        }
        
        private function getNameAndAttributes($allTag){
            
            
            $tag1 = $this->tag1;
              $tag1_end = $this->tag1_end;
              $tag2 = $this->tag2;
              $tag2_end = $this->tag2_end;
              $any = '[\s\S]';
              
              
              
              $type2_end = $this->type2_end;
              $capture = "((?:(?!$tag1_end|$type2_end)$any)+)";
              $in = "$tag1".$capture."(?:$tag1_end|$type2_end)";
            
            preg_match("/$in/", $allTag, $matches);
          
            
            $name = "";
            $attributes = array();
            
            
            if( array_key_exists(1, $matches)  ){
                
                
                $s = $this->attr_sep;
                $a_s = $this->arr_sep;
                
                /* Format */
                $string = trim(preg_replace("/[\s]{2,}/"," ", $matches[1]));
               // $string = trim(preg_replace("/[\s]*" .$s. "[\s]*/",$s, $string));
                $string = trim(preg_replace("/[\s]*" .$a_s. "[\s]*/",$a_s, $string));
                            

                
                
                $arr = preg_split("/[\s]+/", $string);
                
                
                if(!array_key_exists(0, $arr)){
                    throw new Exception("Tag without name. In file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'");
                }
                $name = ucfirst($arr[0]);
                
                if(strpos($name,':') === false){
                    $string = substr($string, strlen($name)+1);
                }else{
                    $name = substr($name, 0, strpos($name,':'));
                }
                
                TemplateParserContext::get()->setName($name);
                
                $string = strtr($string,array(
                    "::"=> "-££££-",
                    "):"=> "-££££8-",
                ));
                preg_match_all('/([^\s]+)[\s]*\:/', $string, $r);
                $attributes = array();
                
                if(array_key_exists(1, $r) && $r[1]){
                    foreach($r[1] as $atr){
                        $atr= strtolower($atr);
                        $attributes[$atr]='';
                    }
                    $c = count($r[1]);
                }
                $string = preg_replace('/[^\s]+[\s]*(?=\:)/', '', $string);
                
                preg_match_all('/(?<=\:)([^\:]+)[\s]*/', $string, $r);
                
                
                if(array_key_exists(1, $r) && $r[1]){
                    if(count($r[1])!=$c){
                        throw new Exception("All attributes must have a value. in file: '".TemplateParserContext::get()->getFile().":" .TemplateParserContext::get()->getLine(). "'"."' When parsing a tag with name: '" . TemplateParserContext::get()->getName() . "'");
                    }
                    $k=0;
                    foreach($attributes as $atr=> $null){
                        $attributes[$atr] = trim($r[1][$k]);
                        $attributes[$atr] = $this->parseAttrSyntax(strtr($attributes[$atr], array(
                        "-££££-"=>"::",
                        "-££££8-"=>"):",
                        )));
                        $k++;
                    }
                    $c = count($r[1]);
                }        
        
                
                return array($name, $attributes);
                
            }
            
            
        }
        
        
        
        function parseAttrSyntax($s){
            if($s[0] == "/"){
                return '<?= ' . strtr( substr($s, 1), array(
                    '/' => '->' , 
                )) . ' ?>';
            }
            
            return $s;
            
            
        }
    } 