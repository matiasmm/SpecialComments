											

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
    
											     