<?php

require_once('ListLexer.php');
require_once('Token.php');
require_once('ListParser.php');


$input = '    
   <!---class: Car ---> 
     <!---method /--->
     <input matias="montenegro" tpl:use-matias="" >
   <!---/class---> 
    ';
$lexer = new ListLexer($input);
$parser = new ListParser($lexer);
$parser->parse(); // begin parsing at rule list
$parser->show_tree();
?>
