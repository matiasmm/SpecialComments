<?php

require_once('Parser.php');

class ListParser extends Parser {

    private $tree = array();


    public function ListParser(Lexer $input) {
        parent::__construct($input);
    }

    public function show_tree(){
        echo "\n";
        foreach($this->tree as $b){
            printf("%s, pos_start: %d, pos_end: %d \n", $b->text, $b->pos_start, $b->pos_end);
        }
    }

    public function parse(){

        while($this->lookahead->type != ListLexer::EOF_TYPE && $this->lookahead->type != ListLexer::EOF){
            $this->add_nodes_to_tree($this->tree);
        }

    }

    public function add_nodes_to_tree(&$tree){
        $this->wait_for(ListLexer::TAG_START_OPENING);
        if($this->lookahead->type == ListLexer::TAG_START_OPENING){
            $tree[] = $tag = new stdClass();
            $this->context_attributes($tag);

            if($tag->type == 's'){
               return; // a Single Tag, it does not have content and ending tag
            }
        $tag->tree = array();
        while($this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE){

            if($this->lookahead->type == ListLexer::TAG_START_OPENING){
                $this->add_nodes_to_tree($tag->tree);
            }elseif($this->lookahead->type == ListLexer::TAG_DOUBLE_END_OPENING){
                $this->consume();

                if($this->lookahead->type == ListLexer::NAME){
                    if($this->lookahead->text == $tag->text){
                        $this->consume();
                        if($this->lookahead->type == ListLexer::TAG_DOUBLE_CLOSING){
                            return ; // ending double tag successfully
                        }
                        $this->error_expecting("--->", $this->lookahead);
                    }
                    $this->error_expecting("<!---/".$tag->text. "--->", "<!---/".$this->lookahead->text. "--->");
                }
                $this->error_expecting($tag->text, $this->lookahead);
            }            
            $this->consume();
        }

        $this->error(sprintf("Expecting '%s' for tag '%s' started at Line: %d, col: %d."
            , "<!---/".$tag->text. "--->"
            , $tag->text
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

        $this->consume();

    }

    function error_expecting($expecting, $given, $extra_message = "", $l = null, $c = null){
        $l = ($l)?: $this->input->line;
        $c = ($c)?: $this->input->col;
        echo "Expecting ".  $expecting . ", Given " . $given 
            ." Line: " .   $this->input->line . " Col: ". $this->input->col. $extra_message;
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



    /** list : '[' elements ']' ; // match bracketed list */
    public function rlist() {
        $this->match(ListLexer::LBRACK);
        $this->elements();
        $this->match(ListLexer::RBRACK);
    }
    /** elements : element (',' element)* ; */
    function elements() {
        $this->element();
        while ($this->lookahead->type == ListLexer::COMMA ) {
            $this->match(ListLexer::COMMA);
            $this->element();
        }
    }
    /** element : name | list ; // element is name or nested list */
    function element() {
        if ($this->lookahead->type == ListLexer::NAME ) {
            $this->match(ListLexer::NAME);
        }
        else if ($this->lookahead->type == ListLexer::LBRACK) {
            $this->rlist();
        }
        else {
            throw new Exception("Expecting name or list : Found "  . $this->lookahead);
        }
    }
}

?>
