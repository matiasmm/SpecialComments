	<?php function t_ItemsParentBegin_level0(){ ?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
	<?php } ?>

	<?php function t_ItemsParentEnd_level0(){ ?>
		</tr>
</table>
	<?php } ?>

	<?php function t_ItemsParentBegin_level1(){ ?>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<?php } ?>

	<?php function t_Item_level1($link,$color,$description,$width){ ?>
		<td width="<?= $width ?>"><div class="caja_contenedora_sub_pasos">
        <div class="caja_color_paso_<?= $color ?>2"></div>
        <!--fin caja color paso <?= $color ?>2 -->
        <div class="caja_descrip_paso_<?= $color ?>2"><a href="<?= $link ?>"><?= $description ?></a></div>
        <!--fin caja descrip paso <?= $color ?>2 -->
      </div>
      <!--fin caja contendora sub pasos --></td>
	<?php } ?>

	<?php function t_ItemsParentEnd_level1(){ ?>
		</tr>
</table>
	<?php } ?>

	<?php function t_Item_level0($link,$step,$color,$description,$width,$selected){ ?>
		<td width="<?= $width ?>" valign="top">
    	<div class="<?= ($selected)? 'caja_contenedora_pasos_especial' : 'caja_contenedora_pasos2' ?>">
        <div class="caja_texto_paso_<?= $color ?>">
        <a href="<?= $link ?>"><?= __("Step") . " ". $step ?></a></div>
        <!--fin caja texto paso azul -->
        <div class="caja_color_paso_<?= $color ?>"></div>
        <!--fin caja color paso azul -->
        <div class="caja_descrip_paso_<?= $color ?>"><a href="<?= $link ?>"><?= $description ?></a></div>
        <!--fin caja descrip paso azul -->
        <?php if($selected): ?>
	        <div class="caja_linea_vertical_servicios"></div>
	        <!--fin caja linea vertical servicios -->
         <?php endif; ?>
      </div>
      <!--fin caja contendora pasos especial -->
    </td>
	<?php } ?>

	<?php function t_wizard_level_separator($nr_cols){ ?>
		<tr>
 	
 	 
     		<td class="caja_linea_divisoria8" colspan="<?= $nr_cols ?>">&nbsp;</td>
   		
  </tr>
	<?php } ?>

