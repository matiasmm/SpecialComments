<?php

require_once('ListLexer.php');
require_once('Token.php');
require_once('ListParser.php');


$input = '<!---test_double--->
    <!---/test_double-->    
    
    
    ';
$lexer = new ListLexer($input);
$parser = new ListParser($lexer);
$parser->parse(); // begin parsing at rule list
$parser->show_tree();
?>
