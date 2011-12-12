	<?php function t_draggable_canvas_($profile_name){ ?>
		<div class="modulo_extranet_bienvenida">
			<h1 class="texto_11_color"><?= __("Welcome, %name%", array('%name%' => $profile_name))?></h1>
			<p><strong>Novedades en mi red </strong> </p>
			
			
			
			<div class="draggable_canvas subcolumns">
	<?php } ?>

	<?php function t_draggable_col_1_(){ ?>
		<div class="col_1">
	<?php } ?>

	<?php function t__draggable_col_1(){ ?>
		</div>
	<?php } ?>

	<?php function t_draggable_col_2_(){ ?>
		<div class="col_2">
	<?php } ?>

	<?php function t__draggable_col_2(){ ?>
		</div>
	<?php } ?>

	<?php function t_draggable_col_3_(){ ?>
		<div class="col_3">
	<?php } ?>

	<?php function t__draggable_col_3(){ ?>
		</div>
	<?php } ?>

	<?php function t__draggable_canvas(){ ?>
		</div>
			<div class="clear"></div>
			
			<div class="caja_icono3"><img src="<?php echo template_image('icono_mano.png')?>" alt=" " width="19" height="20" /></div>
			<!--fin caja icono3 -->
			<div class="caja_texto_der2"><span class="texto_11_gris5">Arrastra y coloca por el orden que desees los diferentes m&oacute;dulos de contenidos de esta p&aacute;gina</span></div>
			<!--fin caja texto der2 -->
			<div class="clear"></div>
		  </div>
		  <!--fin modulo extranet bienvenida -->
	<?php } ?>

	<?php function t__draggable_canvas_no_leyend(){ ?>
		</div>
          <div class="clear"></div>
          </div>
	<?php } ?>

	<?php function t_extranet_menu_lateral_subcolumn_(){ ?>
		<div class="subcolumns">
	<?php } ?>

	<?php function t__extranet_menu_lateral_subcolumn(){ ?>
		</div>
	<?php } ?>

	<?php function t_modules_subcolumns_(){ ?>
		<div class="modules_subcolumns">
	<?php } ?>

	<?php function t_modules_col1_(){ ?>
		<!--div class="modules_col1"-->
       <div class="modulo_extranet_home_izq4">
	<?php } ?>

	<?php function t__modules_col1(){ ?>
		</div>
	<?php } ?>

	<?php function t_modules_col2_(){ ?>
		<!--div class="modules_col2"-->
        <div class="modulo_extranet_home_der4">
	<?php } ?>

	<?php function t__modules_col2(){ ?>
		</div>
	<?php } ?>

	<?php function t__modules_subcolumns(){ ?>
		</div>
    <div class="clear"></div>
	<?php } ?>

	<?php function t_friend_list_($requests_nro){ ?>
		<p><a href="<?= url_for("@extranet_user_friend_requests") ?>" class="texto_11_color5"><?= __('Friendship Requests') ?> <?= $requests_nro ?></a></p>

          <p>&nbsp;</p>
	<?php } ?>

	<?php function t_extranet_default_content($text){ ?>
		<div style="font-size: large; font-weight: bold; color:#B2BBD0; height: 250px; border: 1px double #003399; background-color: #f2f2f2;">
            <span style="padding: 5px;"><?= __($text) ?></span>
        </div>
	<?php } ?>

	<?php function t_nuevas_amistades($form){ ?>
		<table width="275" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="42">&nbsp;</td>
            <td width="18" class="esq_sup_izq">&nbsp;</td>
            <td width="7" class="fondo_extr_linea_sup">&nbsp;</td>
            <td width="194" align="center"><h1>&iexcl;Haz nuevas amistades!</h1></td>
            <td width="7" class="fondo_extr_linea_sup">&nbsp;</td>
            <td width="7" class="esq_sup_der">&nbsp;</td>
          </tr>
          <tr>
            <td width="42" align="right" valign="top"><img src="<?= template_image('vinieta_amistades.gif') ?>" alt=" " width="42" height="44" /></td>
            <td width="18" rowspan="2" align="right" valign="top" class="fondo_extr_linea_izq"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="<?= template_image('vinieta_amistades2.gif') ?>" alt=" " width="18" height="44" /></td>
                </tr>
              </table></td>
            <td colspan="3" rowspan="2" align="center" valign="top"><form id="form2" name="form2" method="get" action="<?= url_for('extranet_user_friends_finder') ?>">
                    <?= $form->renderHiddenFields() ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="5" rowspan="6" align="left" valign="top">&nbsp;</td>
                    <td height="5"></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><label>
                      <?= placeholder_() ?>
                      <?= $form['name_alias']->renderLabel() ?>
                      <?= $form['name_alias']->render(array('class' => 'formulario_caja_extranet')) ?>
                      <?= _placeholder() ?>
                      </label></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><label>
                            <?= $form['province']->render(array('class' => 'formulario_caja_extranet')) ?>
                      </label></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                      
                        <?php echo placeholder_() ?>
                      
                      <?= $form['population']->renderLabel() ?>
                        <?= $form['population']->render(array('class' => 'formulario_caja_extranet')) ?>
                      
                        <?php echo _placeholder() ?>
                      
                      </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><p class="texto_11_gris3">Que coincidan con:</p>
                      <p>&nbsp;</p>
                      <?php echo $form['destinations'] ?>
                      <?php echo $form['preferences'] ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top"><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px">
                        <tr>
                          <!--<td align="right" valign="middle"><a href="#" class="texto_11_arial">Encontrar nuevos amigos</a> </td>-->
                            <td>&nbsp;</td>
                          <td width="26" align="right" valign="top"><input type="submit" class="button" name="buscar" value="<?= __('Find new friendships') ?>" /></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
              </form></td>
            <td width="7" rowspan="2" class="fondo_extr_linea_der">&nbsp;</td>
          </tr>
          <tr>
            <td width="42">&nbsp;</td>
          </tr>
          <tr>
            <td width="42" height="8"></td>
            <td width="18" height="8" class="esq_inf_izq"></td>
            <td height="8" colspan="3" class="fondo_extr_linea_inf"></td>
            <td width="7" height="8" class="esq_inf_der"></td>
          </tr>
        </table>
	<?php } ?>

	<?php function t_mis_albumes($listable){ ?>
		<div class="foto">
            <?php if($media = $listable->getUrlAvatar()): ?>
                <img src="<?= $media['url'] ?>" alt="<?= $media['description'] ?>" title="<?= $media['description'] ?>" width="31" hegiht="33" />
            <?php endif; ?>
        
        </div>
        <!--fin caja foto -->
        <div class="caja_texto_descr2"> <a href="<?= url_for('cms_show', $listable->getObject()) ?>" class="texto_11_color"><?= $listable->getTitle() ?></a>
          <p><strong><?= $listable->getLocation() ?></strong></p>
          <p><?= __('Fotos') ?>:<?= $listable->getObject()->getNbPhotos() ?> - <?= __('Comments') ?>: <?= $listable->getObject()->getNbComments() ?></p>
        </div>
        <!--fin caja texto descr2 -->
        <div class="clear"></div>
	<?php } ?>

	<?php function t_contenidos_mas_leidos($listable){ ?>
		<p>&nbsp;</p>
        <div class="foto">
            <?php if($media = $listable->getUrlAvatar()): ?>
                <img src="<?= $media['url'] ?>" alt="<?= $media['description'] ?>" title="<?= $media['description'] ?>" width="31" hegiht="33" />
            <?php endif; ?>
        </div>
        <!--fin caja foto -->
        <div class="caja_texto_descr2">
          <div class="caja_icono"><img src="<?= template_image('pluma.png') ?>" alt=" " width="16" height="20" /></div>
          <!--fin caja icono -->
          <div class="caja_titulo2"><a href="<?= $listable->getShowLink() ?>" class="texto_11_color"><?= $listable->getTitle() ?></a></div>
          <!--fin caja titulo2 -->
          <div class="clear"></div>
          <div class="caja_valoracion_extranet2">
            <p><!--<img src="images/valoracion.gif" alt=" " />--></p>
          </div>
          <div class="caja_extranet_visitas"><?= $listable->getObject()->getNbVisits() ?> visitas </div>
          <div class="clear"></div>
        </div>
        <!--fin caja texto descr2 -->
        <div class="clear"></div>
	<?php } ?>

	<?php function t_buscador_conoce_simple($form){ ?>
		<table width="275" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="42">&nbsp;</td>
            <td width="18" class="esq_sup_izq">&nbsp;</td>
            <td width="15" class="fondo_extr_linea_sup">&nbsp;</td>
            <td width="88" align="center"><h1>&iexcl;Conoce!</h1></td>
            <td width="105" class="fondo_extr_linea_sup">&nbsp;</td>
            <td width="7" class="esq_sup_der">&nbsp;</td>
          </tr>
          <tr>
            <td width="42" align="right" valign="top"><img src="<?= template_image('vinieta_conoce.gif') ?>" alt=" " width="42" height="44" /></td>
            <td width="18" rowspan="2" align="right" valign="top" class="fondo_extr_linea_izq"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="<?= template_image('vinieta_amistades2.gif') ?>" alt=" " width="18" height="44" /></td>
                </tr>
              </table></td>
            <td colspan="3" rowspan="2" align="center" valign="top"><form id="form5" action="<?= url_for('cms_search') ?>" name="form5" method="get">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="5" rowspan="7" align="left" valign="top">&nbsp;</td>
                    <td height="5"></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                        <?= placeholder_() ?>
                        <?= $form['title']->renderLabel() ?>
                            <?= $form['title']->render() ?>

                       <?= _placeholder() ?>
                      </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                        <?= placeholder_() ?>
                        <?= $form['has']->renderLabel() ?>
                            <?= $form['has']->render() ?>
                       <?= _placeholder() ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">
                        <?= placeholder_() ?>
                        <?= $form['author']->renderLabel() ?>
                            <?= $form['author']->render() ?>
                        <?= _placeholder() ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="left" valign="middle" class="texto_11_gris3"><?= $form['when']->renderLabel() ?></td>
                          <td align="left" valign="middle">
                                  <?= $form['when']->render() ?>
                          </td>
                        </tr>
                        <tr>
                          <td height="5" colspan="2"></td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                      
                    <td align="left" valign="top"><p class="texto_11_gris3">Tipo de contenido:</p>
                      <p>&nbsp;</p>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="<?= template_image('pluma.png') ?>" alt="Art&iacute;culos" width="16" height="20" /></td>
                          <td>
                            <label>
                                <input type="radio" name="conoce[which]" value="Story" />
                            <?= __('Stories') ?>
                            </label>
                          </td>
                          <td rowspan="3">&nbsp;</td>
                          <td><img src="<?= template_image('sendero.png') ?>" alt="Rutas" width="16" height="15" /></td>
                          <td>
                            <label>
                                <input type="radio" name="conoce[which]" value="Road" />
                                <?= __('Roads') ?>
                            </label>
                          </td>
                        </tr>
                        <tr>
                          <td><img src="<?= template_image('destinos.png') ?>" alt="Destinos" width="16" height="13" /></td>
                          <td>
                              <label>
                              <input type="radio" name="conoce[which]" value="Destination" />
                                <?= __('Destinations') ?>
                              </label>
                          </td>
                          <td><img src="<?= template_image('corneta2.png') ?>" alt="Noticias" width="21" height="18" /></td>
                          <td><label>
                            <input type="radio" name="conoce[which]" value="News" />
                            <?= __('News') ?> </label></td>
                        </tr>
                        <tr>
                          <td><img src="<?= template_image('contenidos.png') ?>" alt="Reportajes" width="17" height="17" /></td>
                          <td><label>
                            <input type="radio" name="conoce[which]" value="Reportaje" />
                            <?= __('Reportajes') ?></label></td>
                          <td>&nbsp;</td>
                          <td><label>
                            <input type="radio" name="conoce[which]" value="" />
                             <?= __('All') ?>
                            </label>
                          </td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                      <td align="right" valign="middle"><table width="190" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px">
                        <tr>
                            <input type="submit" class="button" name="buscar" value="<?= __('Find publications') ?>" />
                        </tr>
                      </table></td>
                  </tr>
                </table>
              </form></td>
            <td width="7" rowspan="2" class="fondo_extr_linea_der">&nbsp;</td>
          </tr>
          <tr>
            <td width="42">&nbsp;</td>
          </tr>
          <tr>
            <td width="42" height="8"></td>
            <td width="18" height="8" class="esq_inf_izq"></td>
            <td height="8" colspan="3" class="fondo_extr_linea_inf"></td>
            <td width="7" height="8" class="esq_inf_der"></td>
          </tr>
        </table>
	<?php } ?>

	<?php function t_cuadernos_de_viaje($listable){ ?>
		<div class="foto">
            <?php if($media = $listable->getUrlAvatar()): ?>
                <img src="<?= $media['url'] ?>" alt="<?= $media['description'] ?>" title="<?= $media['description'] ?>" width="31" height="33" />
            <?php endif; ?>
        </div>
        <div class="caja_texto_descr2"> <a href="<?= url_for('cms_show', $listable->getObject()) ?>" class="texto_11_color"><?= truncate_text($listable->getTitle(),40) ?> </a>
          <p><strong><?= __('Author') ?>: <?= $listable->getAuthor() ?> </strong></p>
          <p><?= __('Published at:') ?><?= $listable->getDate() ?></p>
          <p><?= __('Comments') ?>: <?= $listable->getObject()->getNbComments() ?></p>
        </div>
        <!--fin caja texto descr2 -->
        <div class="clear"></div>
	<?php } ?>

	<?php function t_mis_viajes($listable){ ?>
		<p>&nbsp;</p>
        <div class="foto">
            <?php if($media = $listable->getUrlAvatar()): ?>
                <img src="<?= $media['url'] ?>" alt="<?= $media['description'] ?>" title="<?= $media['description'] ?>" width="31" height="33" />
            <?php endif; ?>
        </div>
        <!--fin caja foto -->
        <div class="caja_texto_descr2"> <a href="<?php echo url_for('cms_show', $listable->getObject()) ?>" class="texto_11_color"><?= $listable->getTitle() ?> </a>
          <p><strong><?= $listable->getLocation() ?> </strong></p>
          
          <p><?= __('Comments') ?>: <?= $listable->getObject()->getNbComments() ?></p>
        </div>
        <div class="clear"></div>
	<?php } ?>

	<?php function t_extranet_menu_lateral_friend($profile,$my_user){ ?>
		<div class="caja_foto2">

                <?php if($profile->getLastProfileNode()->getPicture()): ?>
                    <a href="<?php echo url_for('profile_user_show', $profile->getSfGuardUser()) ?>"><img src="<?php echo $profile->getLastProfileNode()->getPicturePath(false, true)?>" title="<?= $profile->getLastProfileNode()->getFullname() ?>" alt="<?= $profile->getLastProfileNode()->getFullname() ?>" width="31" height="33" /></a>
                <?php else: ?>
                    <a href="<?php echo url_for('profile_user_show', $profile->getSfGuardUser()) ?>"><img src="<?php echo template_image('img_foto2.gif') ?>" title="<?= $profile->getLastProfileNode()->getFullname() ?>" alt="<?= $profile->getLastProfileNode()->getFullname() ?>" width="31" height="33" /></a>
                <?php endif; ?>

           </div>

          <div class="caja_icono_red2">
              <?php if($my_user->getStatusForUser($profile->getId()) == 'online'): ?>
                  <img src="/templates/verano/images/red_conectado.png" alt=" " title="<?php echo __('Online')?>"  width="10" height="11" />
              <?php else: ?>
                  <img src="/templates/verano/images/red_desconectado.png" alt=" " width="10" height="11" title="<?php echo __('Offline') ?>"/>
              <?php endif; ?>
          </div>
					
					
<!--</div>-->
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTBookmarkMenu');

class TBookmarkMenu extends BaseTBookmarkMenu{ 

} ?>

