	<?php function t_tpp_template_container_(){ ?>
		<div id="contenedor">
	<?php } ?>

	<?php function t_tpp_center_column_(){ ?>
		<div id="cont_2_columnas">
	<?php } ?>

	<?php function t_tpp_left_(){ ?>
		<div id="col_izquierda">
	<?php } ?>

	<?php function t__tpp_left(){ ?>
		</div>
	    <!--fin col izquierda -->
	<?php } ?>

	<?php function t__tpp_content(){ ?>
		</div>
	    <!--fin col centro -->
	    <div class="clear"></div>
	<?php } ?>

	<?php function t__tpp_center_column(){ ?>
		</div>
  <!--fin cont 2 columnas -->
	<?php } ?>

	<?php function t_placeholder_(){ ?>
		<div class="placeholder">
	<?php } ?>

	<?php function t__placeholder(){ ?>
		</div>
	<?php } ?>

	<?php function t__tpp_template_container(){ ?>
		</div>
<!--fin contenedor -->
	<?php } ?>

	<?php function t_tpp_content_(){ ?>
		<div id="col_centro">
                
	    	<?= ttext_display_messages() ?>
	<?php } ?>

	<?php function t_tpf_search(){ ?>
		<div class="caja_buscador" style="height:27px;padding:0">
	      <form id="form1" name="form1" method="post" action="">
	
								<?= t_placeholder_(); ?>
		    					<?= t__placeholder(); ?>
	      </form>
	    </div>
	    <!--fin caja buscador -->
	<?php } ?>

