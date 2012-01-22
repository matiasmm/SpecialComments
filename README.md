Installation
============

    git clone git://github.com/matubaum/SpecialComments.git
    git submodule init
    git submodule update
    
Then test it:

    cd SpecialComments
    php generate.php --emitter=php test/original_templates test/generated_templates
    php generate.php --emitter=twig test/original_templates test/generated_templates

php is the default emitter, so you can do this instead: 

    php generate.php test/original_templates test/generated_templates

And you can create your own emitters to generate other kind of code like twig, python or whatever instead of just php. I will explain it later. 

This is the problem it tries to solve:
======================================

Suppose you are a developer who works in a team with a designer.

Your designer, gives you a set of pure HTML template files like:

  * layout.html: containing just header, footer, menu, and a lorem ipsum content.
  * text_fonts.html: Where you have different text styles to use around.
  * icons.html: A full html with icons, maybe with a description telling you where to use them.
  * menues.html. Diferent menues.

These files have a lot of things you want to use, but some other parts you don't care, like, *Lorem Ipsum* text, test images, test urls,etc.

So, you have to break them, use the parts you need, and convert them into php peaces of code to use them.

#### The idea here is, having these templates prepared in this way, add some html special comments (\<!---  --->), to retrieve just the parts we are going to use and convert them into functions. ####

That is the main problem it's meant to solve: You have a whole template, and you want to use some parts leaving the templates visually untouched.

Is like a template engine, but some differences are:

  1. We don't break original templates, but we add them comments. The template remains visually untouched.
   Is just applicable for this methodology. You have a whole template, and you want to use some parts.
  1. Is not forbidden to use php, or whatever in your templates. Even you can use other template engine with it if you want.
  1. In our code, we don't use html at all: we use, functions, static methods or anything generated with this library.
  1. This library works when you call it with a command. It's not meant for being executed during your website execution.
 

To achieve this, this library provides 2 things: **Nodes** and **Attributes**.
See examples of both above.

Examples
========

layout.html

  - [[For examples, using Php as a template engine]](https://github.com/matubaum/SpecialComments/wiki/Php-Emitter)
  - [[For examples, using Twig as a template engine]](https://github.com/matubaum/SpecialComments/wiki/Twig-Emitter)


The great thing about it, is that you can open it in any browser after applying these special comments and is not going to break. 

So, for designers it's easy to work, because they just have to care about if it's correctly displayed in the browser.

For you (a developer), you have a lot of html you don't care, like Lorem Ipsum text, test images, test urls, etc. but you are going to select only the parts you need.
