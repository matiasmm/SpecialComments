	<?php function t_google_map_cont($id){ ?>
		<div class="caja_mapa_google3" id="<?= $id ?>">
	<?php } ?>

	<?php function t_end_google_map_cont(){ ?>
		</div>
	<?php } ?>

	<?php function t_origin_icons_box(){ ?>
		<div class="columna_origen_iconos">
	<?php } ?>

	<?php function t_end_origin_icons_box(){ ?>
		</div>
	<?php } ?>

	<?php function t_how_to_arrive_map_icons($url,$vistable,$gps_coords){ ?>
		<?= origin_icons_box() ?>
          <form action="<?= $url ?>" method="get" id="frm_get_directions">
		  <?=input_hidden_tag('establishment_id',$vistable->getId()) ?>
		  <?= input_hidden_tag('map_coords', implode('|',$gps_coords)) ?>
	    <?= how_to_arrive_box() ?>
          </form>
            <!--fin columna origen iconos -->
<?= end_origin_icons_box() ?>
<?= origin_icons_box() ?>
	<p><?= __("Check to see establishments from this area") ?>:</p>
	<?= image_tag(template_image("casa3.png"), array("alt" => __("Show Establishments"), "title" => __("Show Establishments"))) ?>
	<?= checkbox_tag("show_e") ?>
	<?= image_tag(template_image("comida.png"), array("alt" => __("Show Restaurants"), "title" => __("Show Restaurants"))) ?>
	<?= checkbox_tag("show_r") ?>
	<?= image_tag(template_image("persona.png"), array("alt" => __("Show Activities"), "title" => __("Show Activities"))) ?>
	<?= checkbox_tag("show_a") ?>
	<?= image_tag(template_image("entradas.png"), array("alt" => __("Show Shops"), "title" => __("Show Shops"))) ?>
	<?= checkbox_tag("show_s") ?>
	<?= image_tag(template_image("bolsa.png"), array("alt" => __("Show Attractions"), "title" => __("Show Attractions"))) ?>
	<?= checkbox_tag("show_at") ?>
              
              <div style="text-align: right;">
                <p></p>
                <p><span class="texto_11_gris"><?= __("GPS Coordinates") ?>:</span> <?= implode(", ",$gps_coords) ?> </p>
              </div>
            <!--fin columna origen iconos -->
<?= end_origin_icons_box() ?>
<div class="clear"></div>
	<?php } ?>

	<?php function t_how_to_arrive_box(){ ?>
		<div class="caja_borde_como_llego">
		<h3><?= __("How to arrive from my origin") ?></h3>
		<input type="text" class="formulario_como_llego" name="origin_field" id="origin_field"/>
		<div style="float: left;">
			<?= select_tag('travel_mode', array(__("Driving"), __("Walking")), array('class' => "formulario_desde_hasta_solo")) ?>
			

		</div>
		<?= float_left_button(__("See route on the map"), array('id' => 'btn_get_directions')) ?>
	<div class="clear"></div>
	</div>
	<?php } ?>

