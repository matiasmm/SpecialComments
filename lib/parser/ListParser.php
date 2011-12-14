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
            if(isset($b->tree)){
                $this->show_tree($b->tree,$s."      ");
            }
        }
    }

    public function parse(){

        while($this->lookahead->type != ListLexer::EOF_TYPE && $this->lookahead->type != ListLexer::EOF){
            $this->wait_for(ListLexer::TAG_START_OPENING);
            $this->add_nodes_to_tree($this->tree);
        }

    }

    public function add_nodes_to_tree(&$tree){
        
        if($this->lookahead->type == ListLexer::TAG_START_OPENING){
            $tree[] = $tag = new stdClass();
            $this->context_attributes($tag);

            if($tag->type == 's'){
               return; // a Single Tag, it does not have content and ending tag
            }
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
                    
                    $this->add_nodes_to_tree($tag->tree);
                    $static_content_s = $this->input->p;
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
                }
                $static_content_e = $this->input->p;
                $this->consume();
            }

            $this->error(sprintf("Could not find a '%s' for tag '%s' Opened at Line: %d, col: %d."
                , "<!---/".$tag->text. "--->"
                , "<!---".$tag->text. "--->"
                , $tag->token->data['line']
                , $tag->token->data['col']
                ));
        }
    }

    /** <!--- is just opened, 
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
        $tag->pos_start = $this->lookahead->data['char'];
        $this->consume();

        if($this->lookahead->type !== ListLexer::NAME){
            $this->error_expecting(ListLexer::$tokenNames[ListLexer::NAME], $this->lookahead);
        }
        $tag->text = $this->lookahead->text;

        $this->consume();
        while($this->lookahead->type != ListLexer::TAG_SIMPLE_CLOSING && $this->lookahead->type != ListLexer::TAG_DOUBLE_CLOSING && $this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE){
            //Search for attributes
            $this->consume();
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

?>
