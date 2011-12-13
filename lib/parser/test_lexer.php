<?php

require_once('ListLexer.php');
require_once('Token.php');

$input = "
asdffsaf
<!--- matias: --->
    <!--- mat /--->
<!---/matias <? mat ?> --->
";
$lexer = new ListLexer($input);
$token = $lexer->nextToken();

while($token->type != Lexer::EOF_TYPE) {
    echo $token . "\n";
    $token = $lexer->nextToken();
}

?>
