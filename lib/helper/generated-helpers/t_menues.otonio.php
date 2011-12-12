	<?php function t_tmenu_banner_ItemsParentBegin_level0(){ ?>
		<div class="botonera botonera_home">
	<?php } ?>

	<?php function t_tmenu_banner_separator(){ ?>
		|
	<?php } ?>

	<?php function t_tmenu_banner_ItemsParentEnd_level0(){ ?>
		</div><!--fin botonera home -->
	<?php } ?>

	<?php function t_tmenu_banner_buttons(){ ?>
		<div class="botonera botonera_ficha_alojamientos">
	<?php } ?>

	<?php function t_end_tmenu_banner_buttons(){ ?>
		</div>
	<?php } ?>

	<?php function t__LateralgetItem_level0(){ ?>
		</div><!--fin caja cont despl -->
</div><!--fin caja submenu lateral -->
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTMenuIcons');

class TMenuIcons extends BaseTMenuIcons{ 

} ?>

	<?php function t_tmenu_f_restaurant_content($context){ ?>
		<h1><?= link_to_wiki(__("Restaurant Search"),'Busqueda_de_restaurantes')?></h1>
		         <?= include_partial('contents/construction') ?>
	<?php } ?>

	<?php function t_tmenu_f_activity_content($context){ ?>
		<h1><?= link_to_wiki(__("Activities Search"), 'Busqueda_de_actividades')?></h1>
		         <?= include_partial('contents/construction') ?>
	<?php } ?>

	<?php function t_tmenu_f_atraction_content($context){ ?>
		<h1><?= link_to_wiki(__("Atractions Search"), 'Busqueda_de_atracciones')?><?= __("") ?></h1>
		         <?= include_partial('contents/construction') ?>
	<?php } ?>

	<?php function t_tmenu_f_shop_content($context){ ?>
		<h1><?= link_to_wiki(__("Shop Search"), 'Busqueda_de_comercios')?></h1>
		         <?= include_partial('contents/construction') ?>
	<?php } ?>

	<?php function t_LateralgetItem_level0_no_acordeon($title,$link,$image_file_name){ ?>
		<div class="caja_pestania_despl">
	   <div class="esquina_despl_izq"></div>
	   <!--fin esquina despl izq -->
	   <div class="medio_despl">
	    <div class="caja_icono_despl">
	    
	    <? if($image_file_name): ?>
	    <img src="<?= $image_file_name ?>" alt="<?= $title ?>" /></div>
	    <? endif ?>
	    
	    <!--fin caja icono despl -->
		<div class="caja_titulo_despl">
			<a href="<?= $link ?>" ><?= $title ?></a>
		</div>
		<!--fin caja titulo despl -->
		<div class="clear"></div>
	   </div><!--fin medio despl -->
	   
	   <div class="clear"></div>
	  </div><!--fin caja pestania despl -->
	<?php } ?>

	<?php function t_LateralgetItem_level0_($title,$image_file_name){ ?>
		<div class="caja_submenu_lateral accordeon_menu">
	  <div class="caja_pestania_despl">
	   <div class="esquina_despl_izq"></div>
	   <!--fin esquina despl izq -->
	   <div class="medio_despl">
	    <div class="caja_icono_despl">
	    
	    <? if($image_file_name): ?>
	    <img src="<?= $image_file_name ?>" alt="<?= $title ?>" /></div>
	    <? endif ?>
	    
	    <!--fin caja icono despl -->
		<div class="caja_titulo_despl"><?= $title ?></div>
		<!--fin caja titulo despl -->
		<div class="clear"></div>
	   </div><!--fin medio despl -->
	   <div class="esquina_despl_der"><a class="minimize domaximize" style="display: none;" href="#">
	   	<span></span>
	   </a>
	     <!--fin esquina despl der -->
	   </div>
	   <div class="clear"></div>
	  </div><!--fin caja pestania despl -->

 
	  
	  <div class="accordeon_menu_content caja_cont_despl">
	<?php } ?>

	<?php function t_tmenu_top_nav(){ ?>
		<div class="caja_color_top_izq">
        <div class="botones_top">
        	
        	
        	 
        	<?= link_to(__('Home'), '@homepage') ?>
					|
			<?php echo link_to_wiki(__("Help"),'Ayuda_General',array('class' => ''))?>
					|
			<a href="#"><?= __('Site Map')?></a>
			
        	</div>
        <!--fin botones top -->
        
        <div class="banderas">
	        
	    	 <?php include_component('sfLanguageSwitch', 'get')?>    
        </div>
        <!--fin banderas -->
        <?php if(sfContext::getInstance()->getUser()->isAuthenticated() == false): ?>
	        <div class="boton_top_der">
	        	
	        	<?= link_to(__("New User"), "profileuser/new") ?>  
	        </div>
	        <div class="boton_top_der">
	        	|
	        </div> 
	        <div class="boton_top_der">
	        	
	        	<?= link_to(__("New Establishment"), "profileprovider/registrationinformation") ?>
	        </div>
	        <!--fin boton top der -->
	        <div class="clear"></div>
        <?php endif; ?>
      </div>
      <!--fin caja color top izq -->
	<?php } ?>

	<?php function t_tmenu_banner_item($anchor,$link,$active){ ?>
		<?php if($active): ?>
                <span class="seleccionado2"><?php echo $anchor ?></span>
            <?php else: ?>
			    <a href="<?= $link ?>">
			        <?= $anchor ?>
                </a>
            <?php endif; ?>
	<?php } ?>

	<?php function t_tmenu_search_providers($selected,$context){ ?>
		<div class="modulo_escapate3">
			<table class="menu_search_provider" width="575" border="0" cellspacing="0" cellpadding="0">
	          <tr>
	            <td width="42">&nbsp;</td>
	            <td width="18" class="esq_sup_izq2">&nbsp;</td>
	            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px">
	                <tr>
	                  <td width="59"><img src="<?= template_image('buscador_izquierda2.gif')?>" alt=" " width="59" height="28" /></td>
	                  <td align="left" valign="top" class="fondo_buscador_arriba2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	                      <tr>
	                        <td align="left" valign="top" class="texto_11_color6" style="padding-top:5px"><strong><?= __('Search Establishments') ?></strong></td>
	                      </tr>
	                    </table></td>
	                  <td align="right" valign="top" class="fondo_buscador_arriba2">
				  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	                      <tr>
				<?php if(sfContext::getInstance()->getActionStack()->getLastEntry()->getActionName() == 'search'): ?>
	                        <td align="right" valign="top" style="padding-top:5px">
				<a href="<?= url_for('search/search?search_type=basic')?>" class="texto_11_color6"><?= __('New Search') ?></a> 
				</td>
				<td align="right" valign="top"><a onclick="Search.ToggleForm()" style="cursor: pointer;"><img border="0" title="<?php echo __('Show/Hide search form') ?>" alt="<?php echo __('Show/Hide search form') ?>" src="<?php echo template_image('buscador_boton_abrir_cerrar.gif') ?>" /></a></td>
				<?php endif; ?>
	                      </tr>
	                    </table></td>
	                  <td width="22"><img src="<?= template_image('buscador_derecha2.gif')?>"alt=" " width="22" height="28" /></td>
	                </tr>
	              </table></td>
	            <td width="7" class="esq_sup_der2">&nbsp;</td>
	          </tr>
	          <tr id="content_toggle_seearch">
	            <td width="42" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	                <tr>
	                  <td align="right" valign="top"><a title="<?= __('Housings') ?>"  href="#" class="<?php $sc='selected'; echo ($selected=='f_housing')? $sc: '' ?> f_housing"><img src="<?= template_image('vinieta_casa.gif') ?>" alt=" " width="42" height="44" border="0" /></a></td>
	                </tr>
	                <tr>
	                  <td align="right" valign="top"><a title="<?= __('Restaurants') ?>"  href="#" class="<?=($selected=='f_restaurant')? $sc: '' ?> f_restaurant"><img src="<?= template_image('vinieta_comida.gif') ?>" alt=" " width="42" height="36" border="0" /></a></td>
	                </tr>
	                <tr>
	                  <td align="right" valign="top"><a title="<?= __('Activitys') ?>"  href="#" class="<?=($selected=='f_activity')? $sc: '' ?> f_activity"><img src="<?= template_image('vinieta_persona.gif') ?>" alt=" " width="42" height="36" border="0" /></a></td>
	                </tr>
	                <tr>
	                  <td align="right" valign="top"><a title="<?= __('Atractions') ?>"  href="#" class="<?=($selected=='f_atraction')? $sc: '' ?> f_atraction"><img src="<?= template_image('vinieta_boleto.gif') ?>" alt=" " width="42" height="36" border="0" /></a></td>
	                </tr>
	                <tr>
	                  <td align="right" valign="top"><a title="<?= __('Shops') ?>"  href="#" class="<?=($selected=='f_shop')? $sc: '' ?> f_shop"><img src="<?= template_image('vinieta_bolsa.gif') ?>" alt=" " width="42" height="36" border="0" /></a></td>
	                </tr>
	              </table>
	            </td>
	            <td width="3" align="right" valign="top" class="fondo_extr_linea_izq"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	                <tr>
	                  <td height="36"><img class="f_housing f_img" src="<?= template_image('vinieta_amistades2.gif') ?>" alt=" " width="18" height="44" /></td>
	                </tr>
	                <tr>
	                  <td height="36"><img class="f_restaurant f_img" src="<?= template_image('vinieta_amistades2.gif') ?>" alt=" " width="18" height="44" /></td>
	                </tr>
	                <tr>
	                  <td height="36"><img class="f_activity f_img" src="<?= template_image('vinieta_amistades2.gif') ?>" alt=" " width="18" height="44" /></td>
	                </tr>
	                <tr>
	                  <td height="36"><img class="f_atraction f_img" src="<?= template_image('vinieta_amistades2.gif') ?>" alt=" " width="18" height="44" /></td>
	                </tr>
	                <tr>
	                  <td height="36"><img class="f_shop f_img" src="<?= template_image('vinieta_amistades2.gif') ?>" alt=" " width="18" height="44" /></td>
	                </tr>
	
	              </table></td>
	            <td align="center" valign="top">
	                <table width="100%" border="0" cellspacing="0" cellpadding="0">
	                  <tr>
	                    <td width="173" align="center" valign="top" style="padding-right:10px">
	                    
	                    	<div class="f_housing_content">
								<?= tmenu_f_housing_content($context['f_housing_content']) ?>
							</div>
	                    	<div class="f_restaurant_content">
								<?= tmenu_f_restaurant_content($context['f_restaurant_content']) ?>
							</div>
	                    	<div class="f_activity_content">
								<?= tmenu_f_activity_content($context['f_activity_content']) ?>
							</div>
	                    	<div class="f_atraction_content">
								<?= tmenu_f_atraction_content($context['f_atraction_content']) ?>
							</div>
	                    	<div class="f_shop_content">
								<?= tmenu_f_shop_content($context['f_shop_content']) ?>
							</div>
							
	                    </td>
	                    <td width="254" align="center" valign="top" class="borde_vertical" style="padding-left:10px">
	                    		<?= mapa_busqueda() ?>
	                    </td>
	                  </tr>
	                </table>
	              </td>
	            <td width="7" class="fondo_extr_linea_der">&nbsp;</td>
	          </tr>
	          <tr>
	            <td width="42" height="8"></td>
	            <td width="18" height="8" class="esq_inf_izq"></td>
	            <td height="8" class="fondo_extr_linea_inf"></td>
	            <td width="7" height="8" class="esq_inf_der"></td>
	          </tr>
	        </table>
           </div>
	<?php } ?>

	<?php function t_tmenu_f_housing_content($context){ ?>
		<form method="get" action="<?= url_for('search/search?search_type=basic&search=1') ?>">
<table width="173" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><span class="texto_11_gris6" style="padding-left:10px"><?= __('Housing search') ?></span></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><table width="170" border="0" cellspacing="0" cellpadding="0" style="margin: 10px 0">
                              <tr>
                                <td align="right" valign="top" style="padding-right:5px"><p class="texto_16_color"><?= __('Your reservation') ?></p>
                                  <p class="texto_16_color"><?= __('in') ?></p></td>
                                <td align="left" valign="bottom"><span class="texto_36_color"><?= __('3') ?></span> <span class="texto_16_color"><?= __('steps') ?></span> </td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                    <?= $context['establishment_type']->render() ?>
					<?= placeholder_()?> 
					<?= $context['establishment_name']->renderLabel()?>
					<?= $context['establishment_name']->render(array("class"=>"formulario_caja_extranet3")) ?>
					 <?= _placeholder()?> 
				          
                         </td>
                        </tr>
                        
                        
                 <tr>
                    <td align="left" valign="top">
                    <?= $context['room_type']->render(array("class"=>"formulario_caja_extranet3")) ?>
                          
                 </td>
                    </tr>
                    
                        
                        
                        <tr>
                          <td align="left" valign="top">
                          
                     <?= placeholder_()?> 
                          <?php //echo  $context['destination']->renderLabel(null, array('for'=> 'autocomplete_establishment_search_destination')) ?>
					<?php // echo $context['destination']->render(array("class"=>"formulario_caja_extranet3"))?> 
                     <?= _placeholder()?> 
                            
                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                       <tr>
                                <!--td align="left" valign="middle" class="texto_11_gris3" style="padding-right:10px"-->
                                <div">
                                	<div style="padding: 5px 5px; float: left" class="texto_11_gris3" valign="middle"> <?= __('Capacity') ?><!--/div-->
                                    </div>
                                <!--/td-->
                                <!--td align="left" valign="middle" class="texto_11_gris3" style="padding-right:10px"-->
                                    <div style="float: left" valign="middle">
                                        <!--div  style="float:left; padding: 5px 5px; background-color: #007F00" valign="middle"--> <label>
                                        <?= $context['capacity']->render(array("class"=>"elemento_buscador elemento_corto"))?>
                                        </label>
                                    </div>
					        		<div class="clear"></div>
                                </div>
                                <!--/td-->
                                <!--td align="left" valign="middle" class="texto_11_gris3" style="padding-right:10px"-->
                                <div>
                                <div  style="padding: 5px 5px; float: left" class="texto_11_gris3 "valign="middle"><?= __('Price') ?>
                                </div>
                                <!--/td-->
                                <!--td align="left" valign="middle" class="texto_11_gris3" style="padding-right:10px"-->
                                 <div style="float: left" valign="middle">
                                 <?= $context['starting_price']->render(array("class"=>"elemento_buscador"))?>
                                  	</div>
					        		<div class="clear"></div>
                                 </div>
					        		<!--div class="clear"></div-->
                                <!--/td-->
                                <td>
                                    <?php echo $context['offer']->render(array('class' => 'checkbox_inline'));?> 
                                </td>
								</tr>
                               
                              <tr><td>
                                  
                              </td></tr>
                              <tr>
                                <td height="5" colspan="2"></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px">
                              <tr>
                               
                                <td align="right" valign="middle"></td>
                                <td width="26" align="right" valign="top">
                                
                                			<?= form_foot() ?>
													<?= submit_tag('Send') ?>
											<?= end_form_foot() ?>
                                	
                                </td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                     </form>
	<?php } ?>

