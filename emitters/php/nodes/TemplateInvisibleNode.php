<?php
class TemplateInvisibleNode extends TemplateDoubleNode{

		function show(){
			preg_match('/^[\s\n\t\r]*(?:\<\!-[-]+)?([\s\S]*)(?:[-]+-\>[\s\n\t\r]*)+$/',	$this->content, $r);
			
			if(!array_key_exists(1, $r)){
				echo $this->content;
				throw new Exception("Syntax error in Invisible tag. Syntax has to be <!---Invisible---><!--  ............  --><!---/Invisible--->");
			}
			
			return $r[1];		
		}
		
		
		function render(){
			
		}
		
		function nestedRender(){
			return $this->show();
		}
		
	
	
}