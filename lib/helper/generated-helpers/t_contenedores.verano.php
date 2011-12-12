	<?php function t_search_(){ ?>
		<div class="form_busqueda">
	<?php } ?>

	<?php function t__search(){ ?>
		</div>
	<?php } ?>

	<?php function t_b_icon_arrow($icon_url){ ?>
		<div class="btn_icono_flecha">
									<div class="btn_icono"> <img src="<?= $icon_url ?>"/> </div>
								</div>
	<?php } ?>

	<?php function t__square(){ ?>
		</div>
						<!-- /rbcontent -->
					

				</div>
				
				<div class="rbbotline">
					<div class="rbbot"><div></div></div>
				</div>
			</div>
	<?php } ?>

	<?php function t__portada(){ ?>
		<div class="clear"></div>
			      </div>
	<?php } ?>

	<?php function t__sep_col_1(){ ?>
		</div>
	<?php } ?>

	<?php function t_sep_col_2_(){ ?>
		<div class="modulo_extranet_home_der">
	<?php } ?>

	<?php function t__sep_col_2(){ ?>
		</div>
					<div class="clear"></div>
	<?php } ?>

	<?php function t__p_portada(){ ?>
		<!--			        <div class="clear"></div>-->
			    </div>
	<?php } ?>

	<?php function t_p_portada_sin_css($title,$legend){ ?>
		<div>
			          <h1><?php echo $title?></h1>
			        <p>&nbsp;</p>
			        	<em><?php echo $legend?></em>
	<?php } ?>

	<?php function t_p_portada($title,$legend){ ?>
		<div class="modulo_agenda_ocio">
			          <h1><?php echo $title?></h1>
			        <p>&nbsp;</p>
			        	<em><?php echo $legend?></em>
	<?php } ?>

	<?php function t_square_($title,$icon_url){ ?>
		<div class="rbroundbox">
			
				 
				<div class="rbtopline">
					<div class="rbtop">
						<div><span><?= $title ?></span></div>
					</div>
				</div>

				<div class="rbright" style="width: 100%;">

					
				  <div class="rbcontent">
				  	<?php if($icon_url): ?>
												<?= t_b_icon_arrow($icon_url); ?>
					<?php endif; ?>
	<?php } ?>

	<?php function t_portada_($title,$legend){ ?>
		<div class="">
			        <div class="float_left">
			          <h1><?php echo $title?></h1>
			        </div>
			        <div class="caja_red_texto_amigos float_left"><?php if($legend && $legend>=0): ?><strong>(<?php echo $legend?>)</strong><?php endif; ?></div>
			        <div class="clear"></div>
	<?php } ?>

	<?php function t_sep_col_1_($small){ ?>
		<?php if($small): ?>
                			<div class="modulo_extranet_izq_border">
                		<?php else: ?>
                			<div class="modulo_extranet_home_izq">
                		<?php endif; ?>
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTContainersCrudTable');

class TContainersCrudTable extends BaseTContainersCrudTable{ 

} ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTContainers');

class TContainers extends BaseTContainers{ 

} ?>

