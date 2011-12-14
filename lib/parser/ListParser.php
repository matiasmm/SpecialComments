<?php

require_once('Parser.php');

class ListParser extends Parser {

    private $tree = array();


    public function ListParser(Lexer $input) {
        parent::__construct($input);
    }

    public function show_tree($tree= null, $s = ""){
        $tree = ($s)? $tree : $this->tree;
        
        foreach($tree as $b){
            printf("\n".$s."%s", trim($b->text));
            if(isset($b->attributes) && is_array($b->attributes) && count($b->attributes)){
                    echo ".... Attributes: ";
                    foreach($b->attributes as $name => $value){
                        printf("%s: %s. ", $name, $value);
                    }
            }
            if(isset($b->tree)){
                $this->show_tree($b->tree,$s."      ");
            }
        }
    }

    public function parse(){
        while($this->lookahead->type != ListLexer::EOF_TYPE && $this->lookahead->type != ListLexer::EOF){
            $this->wait_for(ListLexer::TAG_START_OPENING);
            $this->context_start_tag($this->tree);
        }
    }

    /***
     * <!--- just opened
     */
    public function context_start_tag(&$tree){
        if($this->lookahead->type == ListLexer::TAG_START_OPENING){
            $tree[] = $tag = new stdClass();
            $this->context_attributes($tag);

            if($tag->type == 's'){
               return; // a Single Tag, it does not have content and ending tag
            }
            $this->context_double_node_content($tag);
        }
    }

    /***
     * <!---a_double_node---->CONTEXT DOUBLE NODE CONTENT<!---/a_double_node--->
     */
    public function context_double_node_content($tag){
        $tag->tree = array();
        $static_content_s = $this->input->p;
        $static_content_e = $this->input->p;
        while($this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE){
                if($this->lookahead->type == ListLexer::TAG_START_OPENING){ // finds a nested node

                    if($static_content_s != $static_content_e){ //save static content
                        $token_static_content = new Token("content",$this->input->getContent($static_content_s, $static_content_e));
                        $static_content_s = $static_content_e;
                        $tag->tree[] = $token_static_content;
                    }

                    $this->context_start_tag($tag->tree);
                    $static_content_s = $this->input->p;

                    $static_content_e = $this->input->p;
                    $this->consume();
                }elseif($this->lookahead->type == ListLexer::TAG_DOUBLE_END_OPENING){ //finds and ending tag
                    list($e_l, $e_c) = $this->input->get_context();
                    $this->consume();

                    if($this->lookahead->type == ListLexer::NAME){
                        if($this->lookahead->text == $tag->text){
                            list($e_l, $e_c) = $this->input->get_context();
                            $this->consume();
                            if($this->lookahead->type == ListLexer::TAG_DOUBLE_CLOSING){
                                if($static_content_s != $static_content_e){ //save static content
                                    $token_static_content = new Token("content",$this->input->getContent($static_content_s, $static_content_e));
                                    $static_content_s = $static_content_e;
                                    $tag->tree[] = $token_static_content;
                                }
                                return ; // ending double tag successfully
                            }
                            $this->error_expecting("--->", $this->lookahead, "", $e_l, $e_c);
                        }
                        $this->error_expecting("<!---/".$tag->text. "--->", "<!---/".$this->lookahead->text. "--->", "", $e_l, $e_c);
                    }
                    $this->error_expecting($tag->text, $this->lookahead, "", $e_l, $e_c);

                    $static_content_e = $this->input->p;
                    $this->consume();
                }elseif($this->lookahead->type == ListLexer::HTML_START_OPENING){
                    $this->context_html_tag();

                    $static_content_e = $this->input->p;
                }else{
                    $static_content_e = $this->input->p;
                    $this->consume();
                }
                
            }

            $this->error(sprintf("Could not find a '%s' for tag '%s' Opened at Line: %d, col: %d."
                , "<!---/".$tag->text. "--->"
                , "<!---".$tag->text. "--->"
                , $tag->token->data['line']
                , $tag->token->data['col']
                ));
    }

    /***
     * < just found
     */
    public function context_html_tag(){
        $html_attributes = array();
        $html_special_attributes = array();
        $html_special_attributes_with_content = array();

        $errors = array();
        $throw_errors = false;

        $this->consume();
        if($this->lookahead->type == ListLexer::NAME){
            $this->consume();
            
                while($this->lookahead->type != ListLexer::HTML_SIMPLE_CLOSING
                        && $this->lookahead->type != ListLexer::HTML_DOUBLE_CLOSING
                        && $this->lookahead->type != ListLexer::EOF
                        && $this->lookahead->type != ListLexer::EOF_TYPE){
                    
                    //Search for html attributes
                    if($this->lookahead->type === ListLexer::TEMPLATE_ATTRIBUTE){
                        $throw_errors = true;
                    }elseif($this->lookahead->type === ListLexer::TEMPLATE_CONTENT_ATTRIBUTE){
                        $throw_errors = true;
                    }elseif($this->lookahead->type === ListLexer::NAME){
                        
                    }else{
                        $this->consume();
                    }
                }
    }

    /** <!---TAG is just opened,
     * sets:
     *   name
     *   attributes: array
     *   type: s or d  //simple or double
     *   token 
     *   pos_start 
     *   pos_end
     * search for attributes 
     *
     * **/
    function context_attributes($tag){
        $tag->attributes = array();
        $tag->token = $this->lookahead;
        $tag->token->attributes = array();
        $tag->pos_start = $this->lookahead->data['char'];
        $this->consume();

        if($this->lookahead->type !== ListLexer::NAME){
            $this->error_expecting(ListLexer::$tokenNames[ListLexer::NAME], $this->lookahead);
        }
        $tag->text = $this->lookahead->text;
        $token_maybe_attribute = $tag;

        $this->consume();
        while($this->lookahead->type != ListLexer::TAG_SIMPLE_CLOSING && $this->lookahead->type != ListLexer::TAG_DOUBLE_CLOSING && $this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE){
            //Search for attributes
            if($this->lookahead->type === ListLexer::COLON){
                $attribute_name = $token_maybe_attribute->text;
                $start_attribute_value = $this->input->p;
                list($end_value, $token_maybe_attribute) = $this->context_attribute_value();
                $tag->attributes[$attribute_name] = $this->input->getContent($start_attribute_value, $end_value);
            }elseif($this->lookahead->type === ListLexer::NAME){
                $token_maybe_attribute = $this->lookahead;
                $this->consume();
            }else{
                $this->consume();
            }


        }

        if($this->lookahead->type == ListLexer::TAG_SIMPLE_CLOSING){
            $tag->type = 's';
        }elseif($this->lookahead->type == ListLexer::TAG_DOUBLE_CLOSING){
            $tag->type = 'd';
        }else{
            $this->error_expecting("---> or /--->", $this->lookahead, sprintf("\nFirst time opened at, Line: %d, Col: %d." , $tag->token->data['line'], $tag->token->data['col']));
        }
        $tag->pos_end = $this->input->p - 1;


    }

    /** just found : **/
    private function context_attribute_value(){
        $this->consume();
        $f_end_value = $end_value = $this->input->p;
        $token_maybe_attribute = null;
        while($this->lookahead->type != ListLexer::TAG_SIMPLE_CLOSING && 
                $this->lookahead->type != ListLexer::TAG_DOUBLE_CLOSING &&
                $this->lookahead->type != ListLexer::COLON &&
                $this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE){

            $end_value = $this->input->p;

            if($this->lookahead->type == ListLexer::PHP_OPENING){
                $token_maybe_attribute = null;
                $this->wait_for(ListLexer::PHP_CLOSING);
                if($this->lookahead->type != ListLexer::PHP_CLOSING)
                    $this->error_expecting('?>', $this->lookahead);
            }
            elseif($this->lookahead->type == ListLexer::DOUBLE_QUOTE){
                $token_maybe_attribute = null;
                $this->wait_for(ListLexer::DOUBLE_QUOTE);
                if($this->lookahead->type != ListLexer::DOUBLE_QUOTE)
                    $this->error_expecting('"', $this->lookahead);
            }
            elseif($this->lookahead->type == ListLexer::SIMPLE_QUOTE){
                $token_maybe_attribute = null;
                $this->wait_for(ListLexer::SIMPLE_QUOTE);
                if($this->lookahead->type != ListLexer::SIMPLE_QUOTE)
                    $this->error_expecting("'", $this->lookahead);
            }elseif($this->lookahead->type == ListLexer::NAME){
                $token_maybe_attribute = $this->lookahead;
                $token_maybe_attribute->data['char'] = $f_end_value;
            }else{
                $token_maybe_attribute = null;
            
            }
            $f_end_value = $end_value;
            $this->consume();
        }

        $new_attribute = null;
        if($this->lookahead->type == ListLexer::COLON){
            if($token_maybe_attribute !== null){
                $new_attribute = $token_maybe_attribute;
                $end_value = $token_maybe_attribute->data['char'];
            }else{
                $this->error(sprintf("Unexpected : in Line %d, Col: %d", $this->input->line,$this->input->col));
            }
        }

        return array($end_value, $new_attribute);
    }

    function error_expecting($expecting, $given, $extra_message = "", $l = null, $c = null){
        $l = ($l)?: $this->input->line;
        $c = ($c)?: $this->input->col;
        echo "Expecting ".  $expecting . ", Given " . $given 
            ." Line: " .   $l . " Col: ". $c. $extra_message;
            ; 
        die;
    }

    function error($message){
        echo "\n".$message; 
        die;
    }

    

    function wait_for($x){
        while($this->lookahead->type != $x && $this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE){
            $this->consume();
        }
    }

}