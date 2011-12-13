<?php

require_once('lexer.php');

class ListLexer extends Lexer {

    protected $line = 1;
    protected $col = 1;
    

    const NAME      = 2;
    const COMMA     = 3;
    const COLON    = 4;
    const RBRACK    = 5;
    const TAG_START_OPENING = 6; // <!---
    const TAG_DOUBLE_CLOSING= 7; // --->
    const TAG_DOUBLE_END_CLOSING= 8; // <!---/
    const TAG_SIMPLE_CLOSING= 9; // /--->
    const TPL_ATTRIBUTE= 10;
    const PHP_OPENING= 11;
    const PHP_CLOSING= 12;
    static $tokenNames = array("n/a", "<EOF>",
                               "NAME", "COMMA",
                               "COLON", "RBRACK",
                               "TAG_START_OPENING",
                               "TAG_DOUBLE_CLOSING",
                               "TAG_DOUBLE_END_CLOSING",
                               "TAG_SIMPLE_CLOSING",
                               "TPL_ATTRIBUTE",
                               "PHP_OPENING",
                               "PHP_CLOSING",
                                );
    
    public function getTokenName($x) {
        return ListLexer::$tokenNames[$x];
    }

    public function ListLexer($input) {
        parent::__construct($input);
    }
    
    public function isLETTER() {
        return $this->c >= 'a' &&
               $this->c <= 'z' ||
               $this->c >= 'A' &&
               $this->c <= 'Z';
    }

    public function consume(){

        $r = parent::consume();
        if($this->c === "\n"){
            $this->line++;
            $this->col = 0;
        }else{
            $this->col++;
        }
        return $r;
    }

    private $frozen = array();

    function freeze(){
        $this->frozen['c'] = $this->c;
        $this->frozen['p'] = $this->p;
        $this->frozen['line'] = $this->line;
        $this->frozen['col'] = $this->col;
    }

    function rollback(){
        $this->c = $this->frozen['c'];
        $this->p = $this->frozen['p'];
        $this->line = $this->frozen['line'];
        $this->col = $this->frozen['col'];

    }

    public function nextToken() {
        while ( $this->c != self::EOF ) {
            switch ( $this->c ) {
                case ' ' :  case "\t": case "\n": case "\r": $this->WS();
                    
                break;
                case '<':
                    if($token = $this->TAG_DOUBLE_END_CLOSING()){
                       return $token;
                    }
                    elseif($token = $this->TAG_START_OPENING()){
                       return $token;
                    }
                    elseif($token = $this->PHP_OPENING()){
                       return $token;
                    }
                    $this->consume();
                break;
                case '-':
                    if($token = $this->TAG_DOUBLE_CLOSING()){
                       return $token;
                    }
                    $this->consume();
                break;
                case '/':
                    if($token = $this->TAG_SIMPLE_CLOSING()){
                       return $token;
                    }
                    $this->consume();
                break;
                case ':':
                    $this->consume();
                    return new Token(self::COLON, '');
                break;
                case '?':
                    if($token = $this->PHP_CLOSING()){
                       return $token;
                    }
                    $this->consume();
                break;
                case $this->isLETTER():
                    if($token = $this->NAME()){
                       return $token;
                    }
                    $this->consume();
                break;
                default:
                    $this->consume();
            }
        }
        return new Token(self::EOF_TYPE,"<EOF>");
    }


    /** ---> **/
    public function TAG_DOUBLE_CLOSING(){
        $ar = array('-', '-', '-', '>');
        $this->freeze();

        foreach($ar as $actual_s){
            if($actual_s !== $this->c){
                $this->rollback();
                return;
            }
            $this->consume();
        }

        return new Token(self::TAG_DOUBLE_CLOSING, '', array(
            'line' => $this->frozen['line'],
            'col' => $this->frozen['col'],
            'char' => $this->frozen['p'],
        ));
    }


    /** <!---/ **/
    public function TAG_DOUBLE_END_CLOSING(){
        $ar = array('<', '!', '-', '-', '-', '/');
        $this->freeze();

        foreach($ar as $actual_s){
            if($actual_s !== $this->c){
                $this->rollback();
                return;
            }
            $this->consume();
        }

        return new Token(self::TAG_DOUBLE_END_CLOSING, '', array(
            'line' => $this->frozen['line'],
            'col' => $this->frozen['col'],
            'char' => $this->frozen['p'],
        ));
    }

    /** <!---/ **/
    public function TAG_SIMPLE_CLOSING(){
        $ar = array('/', '-', '-', '-', '>');
        $this->freeze();

        foreach($ar as $actual_s){
            if($actual_s !== $this->c){
                $this->rollback();
                return;
            }
            $this->consume();
        }

        return new Token(self::TAG_SIMPLE_CLOSING, '', array(
            'line' => $this->frozen['line'],
            'col' => $this->frozen['col'],
            'char' => $this->frozen['p'],
        ));
    }

    /** <!--- **/
    public function TAG_START_OPENING(){
        $ar = array('<', '!', '-', '-', '-');
        $this->freeze();

        foreach($ar as $actual_s){
            if($actual_s !== $this->c){
                $this->rollback();
                return;
            }
            $this->consume();
        }
        return new Token(self::TAG_START_OPENING, '', array(
            'line' => $this->frozen['line'],
            'col' => $this->frozen['col'],
            'char' => $this->frozen['p'],
        ));
    }


    /** <? **/
    public function PHP_OPENING(){
        $ar = array('<', '?');
        $this->freeze();

        foreach($ar as $actual_s){
            if($actual_s !== $this->c){
                $this->rollback();
                return;
            }
            $this->consume();
        }
        return new Token(self::PHP_OPENING, '', array(
            'line' => $this->frozen['line'],
            'col' => $this->frozen['col'],
            'char' => $this->frozen['p'],
        ));
    }


    /** ?> **/
    public function PHP_CLOSING(){
        $ar = array('?', '>');
        $this->freeze();

        foreach($ar as $actual_s){
            if($actual_s !== $this->c){
                $this->rollback();
                return;
            }
            $this->consume();
        }
        return new Token(self::PHP_CLOSING, '', array(
            'line' => $this->frozen['line'],
            'col' => $this->frozen['col'],
            'char' => $this->frozen['p'],
        ));
    }



    /** NAME : ('a'..'z'|'A'..'Z')+; // NAME is sequence of >=1 letter */
    public function NAME() {
        $buf = '';
        do {
            $buf .= $this->c;
            $this->consume();
        } while ($this->isLETTER());
        
        return new Token(self::NAME, $buf);
    }


    /*** TPL- *******/
    public function TPL_ATTRIBUTE() {
        $buf = '';
        do {
            $buf .= $this->c;
            $this->consume();
        } while ($this->isLETTER());

        return new Token(self::NAME, $buf);
    }

    /** WS : (' '|'\t'|'\n'|'\r')* ; // ignore any whitespace */
    public function WS() {
        while(ctype_space($this->c)) {
            $this->consume();
        }
    }
}

?>
