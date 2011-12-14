<?php

require_once('ListLexer.php');
require_once('Token.php');
require_once('ListParser.php');


$input = '<!---test_double66  : bb---><!---otro_a_la_altura_de_matias--->un contenido<!---/otro_a_la_altura_de_matias---><!---matias
           >> otro: mamama    php: <?php ?> "entre comillas tambien"  
    
    --->BB<!---montenegro---><!---/montenegro--->CC<!---/matias--->A1
    A1<!---/test_double66--->    
    
    
    ';
$lexer = new ListLexer($input);
$parser = new ListParser($lexer);
$parser->parse(); // begin parsing at rule list
$parser->show_tree();
?>
