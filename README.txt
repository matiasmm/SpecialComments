											

											Nodos y su uso
											==============

Los 2 Nodos fundamentales son Skip y Block

Block: Define un helper.
======

Skip: Omite una porcion de la plantilla que no se quiere incluir en el helper.
=====

Invisible: Hace lo opuesto al Skip. Se usa para que no se vea un pedazo de codigo en la plantilla y si en el php. Lo unico que hace es quitar el primer y ultimo comentario dentro de el.
=========


 	<!---Skip--->
    	<td colspan="4" class="caja_linea_divisoria8">&nbsp;</td>
    <!---/Skip--->
 	<!---Invisible--->
  		<!-- 
     		<td <?= 'colspan="'.$nr_cols.'"' ?> class="caja_linea_divisoria8">&nbsp;</td>
   		-->
    <!---/Invisible--->
    
											Bugs
											====
											
	1. Si las etiquetas de cierre de Invisible y Block estan pegadas tira error 
		<!---/Invisible---><!---/Block--->
		El error que tira es: 
			
		Fatal error: Maximum function nesting level of '100' reached, aborting! in /home/matias/development/workspace/Aldeatour/src/plugins/spTemplatePlugin/lib/TemplateBaseNode.php on line 35                                                                  
		
		Call Stack:
		    0.0002      62472   1. {main}() /home/matias/development/workspace/Aldeatour/src/symfony:0
		    0.0031     315324   2. include('/home/matias/development/libs/symfony/lib/command/cli.php') /home/matias/development/workspace/Aldeatour/src/symfony:14                                                                                               
		    0.2284    5312804   3. sfSymfonyCommandApplication->run() /home/matias/development/libs/symfony/lib/command/cli.php:20   
		    0.2348    5475648   4. sfTask->runFromCLI() /home/matias/development/libs/symfony/lib/command/sfSymfonyCommandApplication.class.php:74                                                                                                                
		    0.2349    5475648   5. sfBaseTask->doRun() /home/matias/development/libs/symfony/lib/task/sfTask.class.php:77            
		    0.3656    5609536   6. generatehelpersTask->execute() /home/matias/development/libs/symfony/lib/task/sfBaseTask.class.php:63                                                                                                                          
		    0.3670    5715504   7. TemplateController->generateHelpersFromDir() /home/matias/development/workspace/Aldeatour/src/plugins/spTemplatePlugin/lib/task/generatehelpersTask.class.php:33                                                               
		    0.5135    5732344   8. TemplateController->generateNodes() /home/matias/development/workspace/Aldeatour/src/plugins/spTemplatePlugin/lib/TemplateController.php:25                                                                                    
		    0.5756    5885508   9. TemplateParser->parseString() /home/matias/development/workspace/Aldeatour/src/plugins/spTemplatePlugin/lib/TemplateController.php:121                                                                                         
		    0.5801    5909428  10. TemplateParser->parseString() /home/matias/development/workspace/Aldeatour/src/plugins/spTemplatePlugin/lib/TemplateParser.php:76                                                                                              
		    0.5830    5925868  11. TemplateParser->parseString() /home/matias/development/workspace/Aldeatour/src/plugins/spTemplatePlugin/lib/TemplateParser.php:76
	2. Si un Skip tiene su etiqueta de cierre pegada tambien tira error.
	   <!---Skip---><!---Skip--->                                               