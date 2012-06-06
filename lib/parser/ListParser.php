<?php

require_once('Parser.php');

class ListParser extends Parser {

    public $tree = array();


    public function ListParser(Lexer $input) {
        parent::__construct($input);
    }

    public function show_tree($tree= null, $s = ""){
        $tree = ($s)? $tree : $this->tree;
        
        foreach($tree as $b){
            printf("\n".$s."%s: %s", $b->type, trim($b->text));
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
     * <!---(CONTEXT)
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
     * <!---a_double_node---->(CONTEXT)<!---/a_double_node--->
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

                    // <---/(THIS)
                    list($e_l, $e_c) = $this->input->get_info_context();
                    $this->consume();
                    if($this->lookahead->type == ListLexer::NAME){
                        if($this->lookahead->text == $tag->text){

                            // </---something(--->)
                            list($e_l, $e_c) = $this->input->get_info_context();
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
                    $context = $this->input->getContext();
                    $r = $this->context_html_tag(false);
                    $this->input->setContext($context);
                    if($r){
                        $static_content_e = $this->input->p-1;
                        list($tag_name, $html_attributes, $html_special_attributes, $html_special_attributes_with_content, $type) = $this->context_html_tag(true);

                        //save static content
                        if($static_content_s != $static_content_e){
                            $tag->tree[] =  new Token("content",$this->input->getContent($static_content_s, $static_content_e));
                        }

                        if($type == 's'){
                            $static_content_s = $static_content_e = $this->input->p;
                            $tag->tree[] = new Token("special_html",$tag_name,
                                    array($html_attributes,
                                        'html_attributes'=>$html_attributes,
                                        'html_special_attributes'=>$html_special_attributes,
                                        'html_special_attributes_with_content'=>$html_special_attributes_with_content,
                                        'type'=>$type
                                        )
                                    );
                        }else{
                            
                            $static_content_s = $this->input->p;
                            $static_content_e = $this->context_html_double_content($tag_name);
                            
                            $i_content = $this->input->getContent($static_content_s, $static_content_e);
                            $tag->tree[] = new Token("special_html",$tag_name,
                                    array($html_attributes,
                                        'html_attributes'=>$html_attributes,
                                        'html_special_attributes'=>$html_special_attributes,
                                        'html_special_attributes_with_content'=>$html_special_attributes_with_content,
                                        'type'=>$type,
                                        'content' => $i_content
                                        )
                                    );
                            $static_content_s = $static_content_e = $this->input->p;
                        }
                    }else{
                        $this->consume();
                    }

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
     * <html_double>(CONTEXT)</html_double>
     */
    function context_html_double_content($tag_name){
        $return = $this->input->p;
        while($this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE){
            if($this->lookahead->type == ListLexer::HTML_DOUBLE_END_OPENING){
                list($l, $c) = $this->input->get_info_context();
                $this->consume();
                if($this->lookahead->text === $tag_name){
                    list($l, $c) = $this->input->get_info_context();
                    $this->consume();
                    if($this->lookahead->type === ListLexer::HTML_DOUBLE_CLOSING){
                        return $return;
                    }else $this->error_expecting (sprintf("'%s', to close tag '</%s>'", ">", $tag_name), $this->lookahead, "", $l, $c); //v
                }else{
                    $this->error_expecting (sprintf("'%s', to close tag '</%s>'", $tag_name, $tag_name), $this->lookahead, "", $l, $c); //v
               }
            }elseif($this->lookahead->type == ListLexer::HTML_START_OPENING){
                $this->consume();
                $o_tag_name = ($this->lookahead->type == ListLexer::NAME)? $this->lookahead->text: $this->error_expecting("a tag name", $this->lookahead);
                $context = $this->input->getContext();
                $this->consume();

                while($this->lookahead->type != ListLexer::HTML_SIMPLE_CLOSING 
                        && $this->lookahead->type != ListLexer::HTML_DOUBLE_CLOSING
                        && $this->lookahead->type != ListLexer::EOF
                        && $this->lookahead->type != ListLexer::EOF_TYPE){
                    $this->consume();
                }

                if(ListLexer::HTML_SIMPLE_CLOSING == $this->lookahead->type){
                }elseif(ListLexer::HTML_DOUBLE_CLOSING == $this->lookahead->type){
                        $this->context_html_double_content($o_tag_name);
                }else{ //EOF
                        $this->error_expecting("end of html tag '$o_tag_name'", $this->lookahead);
                }
            }
            $return = $this->input->p;
            $this->consume();
        }
        $this->error_expecting("end of html tag $o_tag_name", $this->lookahead); //eof
    }


    /***
     * < just found
     * <  (CONTEXT)  /> or
     * <CONTEXT>Lorem Ipsum</sometag>
     */
    public function context_html_tag($die_on_error){
        $html_attributes = array();
        $html_special_attributes = array();
        $html_special_attributes_with_content = array();

        $type = 's';
        $content = '';
        $this->consume();

        if($this->lookahead->type == ListLexer::NAME){
            $tag_name = $this->lookahead->text;
            $this->consume();
            
                while($this->lookahead->type != ListLexer::HTML_SIMPLE_CLOSING
                        && $this->lookahead->type != ListLexer::HTML_DOUBLE_CLOSING
                        && $this->lookahead->type != ListLexer::EOF
                        && $this->lookahead->type != ListLexer::EOF_TYPE){
                    
                    //Search for html attributes
                    if($this->lookahead->type === ListLexer::TEMPLATE_ATTRIBUTE){ //finds tpl:
                        if($die_on_error === false){
                            return true;
                        }

                        //tpl:(THIS)
                        list($e_l, $e_c) = $this->input->get_info_context();
                        $this->consume();
                        if($this->lookahead->type !== ListLexer::NAME){
                           $this->error_expecting("content node name for tpl", $this->lookahead, "", $e_l, $e_c);
                        }
                        $attr_node_token = $this->lookahead;
                        $attr_node_token->data['l'] = $this->input->line;
                        $attr_node_token->data['c'] = $this->input->col;

                        //tpl:something(-)
                        list($e_l, $e_c) = $this->input->get_info_context();
                        $this->consume();
                        if($this->lookahead->type !== ListLexer::MINUS){
                            $this->error_expecting("-", $this->lookahead, "", $e_l, $e_c);
                        }

                        //tpl:something-(THIS)
                        list($e_l, $e_c) = $this->input->get_info_context();
                        $this->consume();
                        if($this->lookahead->type !== ListLexer::NAME){
                           $this->error_expecting(sprintf("html attribute name to modify for tpl:%s-", $attr_node_token->text), $this->lookahead, "", $e_l, $e_c);
                        }
                        $attr_modif_token = $this->lookahead;
                        $attr_modif_token->data['l'] = $this->input->line;
                        $attr_modif_token->data['c'] = $this->input->col;


                        //tpl:something-something(=)
                        list($e_l, $e_c) = $this->input->get_info_context();
                        $this->consume();
                        if($this->lookahead->type !== ListLexer::EQUAL){
                            $this->error_expecting("=", $this->lookahead, "", $e_l, $e_c);
                        }

                        //tpl:something-something=(THIS)
                        $attr_value = $this->get_html_attribute_value(true);



                        if(array_key_exists($attr_modif_token->text, $html_special_attributes)){
                            $this->error(sprintf("Duplicated attribute modifier '%s'. Line: %d Col: %d.",
                                    $attr_modif_token->text, $attr_modif_token->data['l'], $attr_modif_token->data['c']));
                        }
                        $html_special_attributes[$attr_node_token->text] = array('modif' =>$attr_modif_token, 'name' =>$attr_node_token, 'value_source' => $attr_value);
                    }elseif($this->lookahead->type === ListLexer::TEMPLATE_CONTENT_ATTRIBUTE){ //finds tplcontent:
                        $type = 'd';
                        if($die_on_error === false){
                            return true;
                        }

                        //tplcontent:(THIS)
                        list($e_l, $e_c) = $this->input->get_info_context();
                        $this->consume();
                        if($this->lookahead->type !== ListLexer::NAME){
                           $this->error_expecting("content node name for tplcontent", $this->lookahead, "", $e_l, $e_c);
                        }
                        $attr_node_token = $this->lookahead;
                        $attr_node_token->data['l'] = $this->input->line;
                        $attr_node_token->data['c'] = $this->input->col;

                        //tplcontent:something(=)
                        list($e_l, $e_c) = $this->input->get_info_context();
                        $this->consume();
                        if($this->lookahead->type !== ListLexer::EQUAL){
                            $this->error_expecting("=", $this->lookahead, "", $e_l, $e_c);
                        }

                        //tplcontent:something=(THIS)
                        $attr_value = $this->get_html_attribute_value(true);
                        

                        if(array_key_exists($attr_node_token->text, $html_special_attributes_with_content)){
                            $this->error(sprintf("Duplicated attribute '%s'. Line: %d Col: %d.",
                                    $attr_node_token->text, $attr_node_token->data['l'], $attr_node_token->data['c']));
                        }
                        $html_special_attributes_with_content[$attr_node_token->text] = $attr_value;


                    }elseif($this->lookahead->type === ListLexer::NAME){// finds normal attribute
                        
                        $attr_token = $this->lookahead;
                        $attr_token->data['l'] = $this->input->line;
                        $attr_token->data['c'] = $this->input->col;
                        $this->consume();
                        list($e_l, $e_c) = $this->input->get_info_context();
                        if($this->lookahead->type !== ListLexer::EQUAL){
                           if($die_on_error)
                               $this->error_expecting("=", $this->lookahead, "", $attr_token->data['l'], $attr_token->data['c']);
                           else continue;
                        }
                        
                        $attr_value = $this->get_html_attribute_value($die_on_error);
                        if($attr_value === null){
                            continue;
                        }
                        if($die_on_error && array_key_exists($attr_token->text, $html_attributes)){
                            $this->error(sprintf("Duplicated attribute '%s'. Line: %d Col: %d.",
                                    $attr_token->text, $attr_token->data['l'], $attr_token->data['c']));
                        }
                        $html_attributes[$attr_token->text] = $attr_value;
                        
                    }
                    $this->consume();
                }

                if(empty($html_special_attributes) && empty($html_special_attributes_with_content))
                    return false;
                
                return array($tag_name, $html_attributes, $html_special_attributes, $html_special_attributes_with_content, $type);
        }
    }

    /*** <tag attribute=(THIS).
     * = just found
     **/
    function get_html_attribute_value($die_on_error){
        $this->consume();
        $start_value = $this->input->p;
        if($this->lookahead->type == ListLexer::PHP_OPENING){
            $this->consume();
            $this->wait_for(ListLexer::PHP_CLOSING);
            if($this->lookahead->type != ListLexer::PHP_CLOSING){
                if($die_on_error)
                    $this->error_expecting('?>', $this->lookahead);
                else return null;
            }
            return $this->input->getContent($start_value-2, $this->input->p);
        }
        elseif($this->lookahead->type == ListLexer::DOUBLE_QUOTE){
            $this->consume();
            $this->wait_for(ListLexer::DOUBLE_QUOTE);
            if($this->lookahead->type != ListLexer::DOUBLE_QUOTE){
                if($die_on_error) 
                    $this->error_expecting('"', $this->lookahead);
                else return null;
            }
            return $this->input->getContent($start_value, $this->input->p -1);
        }
        elseif($this->lookahead->type == ListLexer::SIMPLE_QUOTE){
            $this->consume();
            $this->wait_for(ListLexer::SIMPLE_QUOTE);
            if($this->lookahead->type != ListLexer::SIMPLE_QUOTE){
                if($die_on_error)
                    $this->error_expecting("'", $this->lookahead);
                else return null;
            }
            return $this->input->getContent($start_value, $this->input->p -1);
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
            // <!---name (THIS)
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
                $end_value = $this->input->p;
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
        if($c===0) $c = 1;
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
