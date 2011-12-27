This is under development, don't expect it to work yet.

This is the problem it tries to solve:
======================================

Supouse you are a developer who works in a team with a designer.

Your designer, gives you a set of pure HTML template files like:
  # layout.html: containing just header, footer, menu, and a lorem ipsum content.
  # text_fonts.html: Where you have different text styles to use around.
  # icons.html: A full html with icons, maybe with a description telling you where to use them.
  # menues.html. Diferent menues.

So, you have to break them, use the parts you need, and convert them into php peaces of code.

## The idea here is, having these templates prepared in this way, add some html special comments <!--- special tag --->, to retrieve the just parts we are going to use and convert them into functions. ##

That is the main problem this is meant to solve: You have a whole template, and you want to use some parts leaving the templates visually untouched.

Is like a template engine, but some differences are:
  # We don't break original templates, but we add them comments. The template remains visually untouched.
  # Is just applicable for this methodology. You have a whole template, and you want to use some parts.
  # Is not forbidden to use php, or whatever in your templates. Even you can use other template engine with it if you want.
  # In our code, we don't use html at all: we use, functions, static methods or anything generated with this library.
  # This library works when you call it with a command. It's not meant for being executed during your website execution.
 

To achieve this, this library provides 2 things: Nodes and Attributes.
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

The great thing about the template above, is that you can open it in any browser after applying these special comments and is not going to break. So is easy to handle by designers.
For you (a developer), you have a lot of html you don't care, but you are going to select only the parts you need.


Nodes
=====
Nodes are HTML comments that look something like this: <!---NODE_NAME---> <!---/NODE_NAME--->
or <!---NODE_NAME/--->

  - Block
  - Class
  - Method
  - Themes

Node :: Block
-------------
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


NODE :: Class
-------------
Layout.html

    <body>
      <!---class: Layout ---->

          <!---method: header--->
              <div class= "header">Lorem Ipsum</div>
          <!---/method--->       

               <a>Text we don't use.</a>

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

 

NODE :: Themes
---------------

    <!---themes: winter /--->
    <!---themes: winter, summer, spring, fall /--->

Put this at the begining of a template file to indicate, the generated output belongs to a theme.
It's going to create a different file for each theme.


Attributes
==========
Are special HTML attributes that look like this:

    <div tpl:COMMAND-existingAttribute="VALUE" existingAttribute="lorem ipsum"></div> 

or

    <div tplcontent:COMMAND="VALUE">Lorem Ipsum</div> 



Attribute :: Replace
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
