<?php

require_once('Parser.php');

class ListParser extends Parser {

    private $expecting_stack = array();
    private $tree = array();


    public function ListParser(Lexer $input) {
        parent::__construct($input);
    }

    public function show_tree(){
        echo "\n";
        foreach($this->tree as $b){
            echo $b->text;
            echo "\n";
        }
    }

    public function parse(){
        $this->wait_for(ListLexer::TAG_START_OPENING);
        if($this->lookahead->type == ListLexer::TAG_START_OPENING){
            $this->tree[] = $tag = new stdClass();
            $this->context_attributes($tag);
        }
    }
    /** <!--- is just opened  **/
    public function context_attributes($tag){
        $this->expecting_stack[] = "TAG_START_OPENING";
        $tag->attributes = array();
        $tag->token = $this->lookahead;
        $this->consume();

        if($this->lookahead->type !== ListLexer::NAME){
            $this->error_expecting(ListLexer::NAME, $this->lookahead);
        }
        $tag->text = $this->lookahead->text;
    }

    function error_expecting($expecting, $given){
        echo "Expecting ".  ListLexer::$tokenNames[$expecting] . ", Given " . $this->lookahead 
            ." Line: " .   $this->input->line . " Col: ". $this->input->col;
            ; 
        die;
    }
    
    function wait_for($x){
        while($this->lookahead->type != $x && $this->lookahead->type != ListLexer::EOF && $this->lookahead->type != ListLexer::EOF_TYPE ){
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
