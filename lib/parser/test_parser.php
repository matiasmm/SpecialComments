<?php

require_once('ListLexer.php');
require_once('Token.php');
require_once('ListParser.php');


$input = <<<HTML
<!---class: Car--->
    <test tpl:do-attribute="mat">matias</test>
    <test_double tplcontent:do="mat">matias</test_double>
<!---/class--->
HTML;
$lexer = new ListLexer($input);
$parser = new ListParser($lexer);
$parser->parse(); // begin parsing at rule list
$parser->show_tree();