Installation
============

    git clone git://github.com/matubaum/generateFunctionsFromTemplates.git
    
Then test it:

    cd generateFunctionsFromTemplates 
    php generate.php test/original_templates test/generated_templates

This is the problem it tries to solve:
======================================

Supouse you are a developer who works in a team with a designer.

Your designer, gives you a set of pure HTML template files like:

  * layout.html: containing just header, footer, menu, and a lorem ipsum content.
  * text_fonts.html: Where you have different text styles to use around.
  * icons.html: A full html with icons, maybe with a description telling you where to use them.
  * menues.html. Diferent menues.

These files have a lot of things you want to use, but some other parts you don't care, like, *Lorem Ipsum* text, test images, test urls,etc.

So, you have to break them, use the parts you need, and convert them into php peaces of code to use them.

#### The idea here is, having these templates prepared in this way, add some html special comments \<!--- special tag --->, to retrieve the just parts we are going to use and convert them into functions. ####

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

	<!---method: content --->
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
    </body>

The great thing about the template above, is that you can open it in any browser after applying these special comments and is not going to break. 

So, for desingers it's easy to work, becouse they just have to care if it is correctly desplayed in the browser.

For you (a developer), you have a lot of html you don't care, like Lorem Ipsum text, test images, test urls, etc. but you are going to select only the parts you need.


Nodes
=====
Nodes are HTML comments that look something like this: <!---NODE_NAME---> <!---/NODE_NAME--->
or <!---NODE_NAME/--->

  - block
  - class
  - invisible
  - method
  - php
  - skip
  - themes

Node :: block
-------------
Creates a function using the the containing text.


Layout.html

    <body>
      Lorem Ipsum

      <!---block: hello parameters: $name--->
          <div>
              <span> Hello <strong tplcontent:replace="<?php echo $name?>">Mr Simpson</b> </strong>
          </div>    
      <!---/block--->

    </body>

Output:
  With the ouput you can do this:

    echo hello("Homer"); 
    //returns <span> Hello <strong>Homer</strong></span>


Node :: class
-------------

Creates a methods using the **method node** containing text.
Ignores whatever is not in a method node.

Layout.html

    <body>
      <!---class: Layout ---->

          <!---method: header--->
              <div class= "header">Lorem Ipsum</div>
          <!---/method--->       

               <a>This is completely ignored since it's not </a>

          <!---method: body--->
              <div class= "content">A lot of html</div>
          <!---/method--->
      <!---/class--->

  </body>

Output:
With the output you can do this:

    $o = new Layout();
    echo $o->body(); 
    //will print <div class= "content">A lot of html</div>

Node :: invisible
----------
It removes the first html comment \<!-- --> it finds inside it.
You can add some code you don't want to be rendered in the original template, but you need it in your final template.


layout.html
    <!---block: test--->
        <!---invisible---><!-- <?php echo "hello" ?> --><!---/invisible--->
    <!---/block--->

Output:
With the output you can do this:


    echo test();  //it will print hello



Node :: skip
----------
Text inside is going to be ignored, but it's useful for being desplayed in the browser. It also can desplay a content parameter
 
menues.html

    <!---block: menu_left parameters: $content--->
    <div id="nav">
        <ul>
            <!---skip content: <?php echo $content ?> --->
            <li>Demo item</li>
            <li>That</li>
            <li>Is not</li>
            <li>going to be</li>
            <li>parsed</li>
            <!---/skip--->
        </ul>
    </div>
    <!---/block--->

You can do this: 

    echo menu_left("<li>home</li>");
returns: 

    <div id="nav">
        <ul>
            <li>home</li>
        </ul>
    </div>

Node :: themes
---------------

    <!---themes: winter /--->
    <!---themes: winter, summer, spring, fall /--->

Put this at the begining of a template file to indicate, the generated output belongs to a theme.
It's going to create a different file for each theme.

Node :: php
---------------
Not recommended to use but it's available if you need it

layout.html

   <!---block: function1 --->
      <!---php: <?php echo "something" ?> /--->
   <!---/block--->

output:
With the output you can do this:

    echo function1(); // will print "something"




Attributes
==========
Are special HTML attributes that look like this:

\<div **tpl:COMMAND-existingAttribute**="VALUE" **existingAttribute**="lorem ipsum">\</div> 

or

\<div **tplcontent:COMMAND**="VALUE">**Lorem Ipsum**\</div> 


Attribute :: replace
-------------------
test.html

    <!---block: test parameters: $url --->
       <a tpl:replace-href="<?php echo $url ?>" href="http://google.com">Go to some url</a>
    <!---/block--->

output:

    <a href="<?php echo $url ?>">Go to some url</a>

test.html

    <!---block: test parameters: $name --->
      <div tplcontent:replace="<?php echo $name ?>">Mr. Simpson</div>
    <!---/block--->

output:

     <div><?php echo $name ?></div>


Attribute :: use
-------------------
You can add 2 special values inside: {value} and {file}. Look at the examples below.



buttons.html

    <!---block: boton1--->
        <a href="#" tpl:use-href="{value}"><img alt="buy" src="images/buy.gif" tpl:use-src="another/directory/{value}"/></a>
    <!---/block--->

output:

    <a href="#"><img src="another/directory/images/buy.gif" alt="buy"></a>

buttons.html

    <!---block: boton2--->
        <a href="#" tpl:use-href="{value}"><img alt="buy" src="images/buy.gif" tpl:use-src="another/directory/{file}"/></a>
    <!---/block--->

output:

    <a href="#"><img src="another/directory/buy.gif" alt="buy"></a>
This last one, does not contain the "/image/" directory in its src attribute.
