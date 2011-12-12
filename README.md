This is under development, don't expect it to work yet.

This is the problem it tries to solve:
======================================

Supouse you are a developer who works in a team with a designer.

Your designer, gives you a set of pure HTML template files like:
  * layout.html: containing just header, footer, menu, and a lorem ipsum content.
  * text_fonts.html: Where you have different text styles to use around.
  * icons.html: A full html with icons, maybe with a description telling you where to use them.
  * menues.html. Diferent menues.

So, you have to break them, use the parts you need, and convert them into php peaces of code.

> The idea here is, having these templates prepared in this way, add some html special comments <!--- special tag --->, to retrieve the just parts we are going to use and convert them into functions. 

That is the main problem this is meant to solve: You have a whole template, and you want to use some parts leaving the templates visually untouched.

Is like a template engine, but some differences are:
  * We don't break original templates, but we add them comments. The template remains visually untouched.
  * Is just applicable for this methodology. You have a whole template, and you want to use some parts.
  * Is not forbidden to use php, or whatever in your templates. Even you can use other template engine with it if you want.
  * In our code, we don't use html at all: we use, functions, static methods or anything generated with this library.
  * This library works when you call it with a command. It's not meant for being executed during your website execution.
 

Examples
========

    layout.html
    <head>....</head>
    <body>
    <!---class: Layout --->

	    <!---method: logo   parameters: $base_path --->
		    <img src="images/logo.gif" tpl:use-src="<?php echo $base_path . '{file}'  ?>" alt="Logo" />
        <!---/method --->

	    <!---method: menu --->
          <div>Main Menu</div>
          <ul>
            <li>Item a</li>
          </ul>
        <!---/method --->


       <!---method: content   parameters: $content --->
           <!---skip: <?php echo $content ?>--->
              Lorem Ipsum
           <!---/skip--->
       <!---/method--->

    <!---/class--->
    <body>
    

