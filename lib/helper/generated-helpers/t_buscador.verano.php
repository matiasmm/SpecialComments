	<?php function t_end_buscador_column1(){ ?>
		</div>
	<?php } ?>

	<?php function t_end_buscador_column2(){ ?>
		</div>
	<?php } ?>

	<?php function t_end_buscador_elementos(){ ?>
		</div>
</div>
	<?php } ?>

	<?php function t_end_col_elementos_buscador1(){ ?>
		</div>
	<?php } ?>

	<?php function t_col_elementos_buscador2(){ ?>
		<div class="col_elementos_buscador2">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p><?= __("Select which type of establishment you want to look for") ?>:</p>
	<p>&nbsp;</p>
	<?php } ?>

	<?php function t_end_col_elementos_buscador2(){ ?>
		</div>
	<?php } ?>

	<?php function t_caja_cont_resultado_busqueda(){ ?>
		<div class="caja_cont_resultado_busqueda">
	<?php } ?>

	<?php function t_end_caja_cont_resultado_busqueda(){ ?>
		</div>
	<?php } ?>

	<?php function t_buscador_column1($image){ ?>
		<div class="caja_cont_buscador_establecimientos2">

			<div class="caja_pestania_despl">
	          <div class="esquina_despl_izq"></div>
	          <!--fin esquina despl izq -->
	          <div class="medio_despl">
				<?= __('Advanced Search') ?>
	          </div>
	          <div>
	          </div>
	          <div class="clear"></div>
	        </div>
	<?php } ?>

	<?php function t_buscador_column2(){ ?>
		<div class="caja_cont_buscador_establecimientos3">
	<?php } ?>

	<?php function t_buscador_elementos(){ ?>
		<div class="caja_cont_elementos_buscador">

	<div style="width: 560px">
	<?php } ?>

	<?php function t_caja_minimizar(){ ?>
		<div class="caja_minimizar">
	<div class="float_right">
		<a href="#" id="l_minimize_search">
			<?= image_tag(template_image("minimizar.png"),array("onclick" => "$('.caja_cont_elementos_buscador').slideToggle()","alt" => _("Minimize"),"title" => __("Minimize")))?>
		</a>	</div>
	<div class="float_right">
		<a class="texto_11_color3 l_minimize_search">
			<?=__("Minimize") ?>
		</a>
	</div>
</div>
	<?php } ?>

	<?php function t_col_elementos_buscador1(){ ?>
		<div class="col_elementos_buscador1">
	<p><?= __("Advanced search of")?></p>
	<p>&nbsp;</p>
	<?= image_tag(template_image("casa3.png"),array("title" => __("Housing"),"alt" => __("Housing"))) ?>
	<?= checkbox_tag('e_type[]',"housing",true) ?>
	<?php //echo image_tag(template_image("comida.png",array("title" => __("Restaurant"),"alt" => __("Restaurant"))),array("title" => __("Housing"),"alt" => __("Housing"))) ?>
	<?php //echo checkbox_tag('e_type[]',"restaurant") ?>
	<?php //echo image_tag(template_image("persona.png",array("title" => __("Activity"),"alt" => __("Activity"))),array("title" => __("Housing"),"alt" => __("Housing"))) ?>
	<?php //echo checkbox_tag('e_type[]',"activity") ?>
	<?php //echo image_tag(template_image("entradas.png",array("title" => __("Attraction"),"alt" => __("Attraction"))),array("title" => __("Housing"),"alt" => __("Housing"))) ?>
	<?php //echo checkbox_tag('e_type[]',"attraction") ?>
	<?php //echo image_tag(template_image("bolsa.png",array("title" => __("Commerce"),"alt" => __("Commerce"))),array("title" => __("Housing"),"alt" => __("Housing"))) ?>
	<?php //echo checkbox_tag('e_type[]',"commerce") ?>
	<p>&nbsp;</p>
	<?php } ?>

	<?php function t_results_order_leyend($handler,$autocompleter_widget){ ?>
		<div class="caja_resultado_busqueda_orden">
        <div style="margin-right: 5px;" class="float_left">
          <h1><?= __("Search Results")?></h1>
        </div>
        <!--fin float left -->
        <div style="margin-top: 4px;" class="float_left">
          <p class="texto_11_gris2"> = <?= format_number_choice("[0]no housing found|[1] one housing found|(1,+Inf] %total% housings found",array("%total%" => $handler->getNbResults()),$handler->getNbResults())?></p>
        </div>
        <!--fin float left -->
        <div class="clear"></div>
        <div class="col_resultado_busqueda1 yform">
            <p class="texto_11_gris2"><?= render_field($autocompleter_widget)?>:</p>
	    <?php //$autocompleter_widget->render() ?>
	    <?= float_left_button(__("Order")) ?>
        </div>
        <!--fin col resultado busqueda1 -->
        <div class="col_resultado_busqueda2">
          <p class="texto_11_gris2"><?= __("Price legend for housings")?> </p>
          <div class="caja_iconos_busqueda">
		  <p><img height="17" width="22" alt="<?='- '.__('than 30€')?>" src="<?= template_image('leyenda_monedas1.png')?>"/></p>
            <p><?= __("- than %value%",array("%value%" => "30"))."&euro;"?></p>
          </div>
          <!--fin caja iconos busqueda -->
          <div class="caja_iconos_busqueda">
            <p><img height="17" width="22" alt="30 - 40€" src="<?= template_image('leyenda_monedas2.png')?>"/></p>
            <p>30 - 40&euro; </p>
          </div>
          <!--fin caja iconos busqueda -->
          <div class="caja_iconos_busqueda">
		  <p><img height="17" width="22" alt="40 - 50&euro;" src="<?= template_image('leyenda_monedas3.png')?>"/></p>
		  <p>40 - 50&euro;</p>
          </div>
          <!--fin caja iconos busqueda -->
          <div class="caja_iconos_busqueda">
            <p><img height="17" width="22" alt="" src="<?= template_image('leyenda_monedas4.png')?>"/></p>
            <p><?= __('+ than %value%',array("%value%" => "50"))?>&euro; </p>
          </div>
          <!--fin caja iconos busqueda -->
          <div class="caja_iconos_busqueda">
            <p><img height="17" width="22" alt=" " src="<?= template_image('oferta_especial.png')?>"/></p>
            <p><?= __("Special offer")?></p>
          </div>
          <!--fin caja iconos busqueda -->
          <div class="clear"></div>
        </div>
        <!--fin col resultado busqueda2 -->
        <div class="clear"></div>
        <p class="texto_11_gris2"><?= __("Order by different criterias clicking on header's result list")?></p>
      </div>
	<?php } ?>

	<?php function t_notice_search_box($form,$url){ ?>
		<table cellspacing="0" cellpadding="0" border="0" width="175" style="margin-bottom: 10px;">
          <tbody><tr>
            <td width="18" class="esq_sup_izq2">&nbsp;</td>
            <td width="150" class="fondo_extr_linea_sup"><table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom: 10px;">
                <tbody><tr>
                  <td width="15"><img width="15" height="28" alt=" " src="<?= template_image('buscador_izquierda4.gif') ?>"></td>
                  <td align="left" valign="top" class="fondo_buscador_arriba2"><table cellspacing="0" cellpadding="0" border="0" width="100%">
                      <tbody><tr>
                        <td align="left" valign="top" style="padding-top: 5px;" class="texto_11_color6"><strong>Buscar mensajes </strong></td>
                      </tr>
                    </tbody></table></td>
                  <td align="right" width="2" valign="top" class="fondo_buscador_arriba2"><table cellspacing="0" cellpadding="0" border="0" width="20">
                      <tbody><tr>
                        <td align="right" valign="top"></td>
                      </tr>
                    </tbody></table></td>
                  <td width="22"><img width="22" height="28" alt=" " src="<?= template_image('buscador_derecha2.gif')?>" /></td>
                </tr>
              </tbody></table></td>
            <td width="7" class="esq_sup_der2">&nbsp;</td>
          </tr>
          <tr>
            <td align="right" width="18" valign="top" class="fondo_extr_linea_izq">&nbsp;</td>
            <td align="left" width="150" valign="top"><form action="<?= $url?>" method="get">
                <div class="formulario_mail_izq">
                  <p>
		<?= placeholder_()?> 
                    <?= $form['from_to']->renderLabel() ?>
			  <?= $form['from_to']->render() ?>
		<?= _placeholder() ?>
                  </p>
                  <p>
		<?= placeholder_()?> 
                    <?= $form['has']->renderLabel() ?>
			  <?= $form['has']->render() ?>
		<?= _placeholder() ?>


                  </p>
                </div>
                <!--fin formulario_mail_izq -->
                <div class="formulario_mail_izq2">
                  <div style="margin-top: 3px;" class="float_left">En</div>
                  <div class="float_right">
		<?= $form['folder']->render() ?>
                  </div>
                  <div class="clear"></div>
                  <div style="margin-top: 3px;" class="float_left">Tipo</div>
                  <div class="float_right">
		<?= $form['type']->render() ?>
                  </div>
                  <div class="clear"></div>
                  <div style="margin-top: 3px;" class="float_left">De</div>
                  <div class="float_right">
		<?= $form['date']->render() ?>
		  </div>
                  <div class="clear"></div>
		<div class="float_right">
			<input type="submit" class="button" value="<?= __('Search') ?>" />
                  </div>
                  <div class="clear"></div>
                </div>
                <!--fin formulario mail izq -->
              </form></td>
            <td width="7" class="fondo_extr_linea_der">&nbsp;</td>
          </tr>
          <tr>
            <td width="18" height="8" class="esq_inf_izq"></td>
            <td height="8" class="fondo_extr_linea_inf"></td>
            <td width="7" height="8" class="esq_inf_der"></td>
          </tr>
        </tbody></table>
	<?php } ?>

	<?php function t_mapa_busqueda(){ ?>
		<p>B&uacute;squeda por mapa: Selecciona un destino</p>
<div class="buscador_mapa">
	<img src="<?= template_image('mapa_provincias.gif') ?>" usemap="#Map" />
	
	<table>
		<tr>
			<td>
			
			</td>
	</tr>
	</table>
</div>
	<?php } ?>

