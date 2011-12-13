<?php

class Token {
    public $type;
    public $text;
    public $data;
    
    public function Token($type, $text, $data = array()) {
        $this->type = $type;
        $this->text = $text;
        $this->data = $data;
    }
    
    public function __toString() {
        $tname = ListLexer::$tokenNames[$this->type];
        return "<'" . $this->text . "'," . $tname . "> " .  implode(',', $this->data);
    }
}

?>
