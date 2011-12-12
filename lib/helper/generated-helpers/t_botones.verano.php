	<?php function t_form_foot(){ ?>
		<div class="caja_submit">
	<?php } ?>

	<?php function t_end_form_foot(){ ?>
		</div><!--fin caja submit -->
	<?php } ?>

	<?php function t_caja_botones(){ ?>
		<div class="caja_botones">
	<?php } ?>

	<?php function t_end_caja_botones(){ ?>
		</div>
	<?php } ?>

	<?php function t_form_listable_actions(){ ?>
		<div class="caja_botones2">
	<?php } ?>

	<?php function t_end_form_listable_actions(){ ?>
		</div>
	<?php } ?>

	<?php function t_link_to_action($anchor,$url,$options,$link_helper){ ?>
		<?php $options['class'] = array_key_exists('class', $options)?$options['class'].' texto_11_gris':"texto_11_gris"; ?>
	<?= call_user_func($link_helper,$anchor,$url, $options) ?>
	<?php } ?>

	<?php function t_button_right($button){ ?>
		<div class="caja_botones3">
		<?= $button ?>
	</div>
	<?php } ?>

	<?php function t_link_plus($anchor,$url,$onclick){ ?>
		<div class="caja_boton"><a onclick="<?= $onclick ?>" href="<?= ($onclick)? '#' :  url_for($url) ?>"><img src="<?= template_image('btn_mas.gif') ?>" alt="" border="0" /></a></div><!--fin caja boton -->
	<div class="caja_link"><a onclick="<?= $onclick ?>" href="<?= ($onclick)? '#' :  url_for($url) ?>"> <?= $anchor ?></a> </div><!--fin caja link -->
	<div class="clear"></div>
	<?php } ?>

	<?php function t_link_go($anchor,$url,$ventana_destino){ ?>
		<div class="caja_boton2">
			<a href="<?= url_for($url) ?>" <? if($ventana_destino==1){echo " target=\"_blank\"";}?>>
				
				
					<?= image_tag(template_image("btn_flecha.gif"))  ?>
				 
			</a></div><!--fin caja boton2 -->
		<div class="caja_link2"><a href="<?= url_for($url) ?>" <? if($ventana_destino==1){echo " target=\"_blank\"";}?>>
			
			  <?= $anchor ?>
		</a> </div><!--fin caja link2 -->
		<div class="clear"></div>
	<?php } ?>

	<?php function t_btn_submit($value,$type,$options){ ?>
		<?= input_tag($options['name'],__($value), array_merge($options, array('type'=>$type, 'class' => 'button'))) ?>
	<?php } ?>

	<?php function t_float_left_button($value,$options){ ?>
		<div class="caja_boton_eliminar">
		<?= submit_tag($value, $options) ?>
	</div>
	<div class="clear"></div>
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTButtons');

class TButtons extends BaseTButtons{ 

} ?>

