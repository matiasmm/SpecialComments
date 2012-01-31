<?php

class TemplateTwigCompiler extends Twig_Compiler{
    function compile(Twig_NodeInterface $node, $indentation = 0) {
        /**
         * @var Twig_Node_Module $node
         */
        $this->subcompile($node->getNode('body'));
        return $this;
    }
}