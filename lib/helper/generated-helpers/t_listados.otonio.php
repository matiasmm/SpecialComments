	<?php function t_list_with_action_bar(){ ?>
		<div class="listado_con_barra_de_acciones">
	<?php } ?>

	<?php function t_end_list_with_action_bar(){ ?>
		</div>
	<?php } ?>

	<?php function t_cont_image_info(){ ?>
		<div class="caja_mis_articulos_texto4">
	<?php } ?>

	<?php function t_end_cont_image_info(){ ?>
		</div>
	<?php } ?>

	<?php function t_division_line(){ ?>
		<div class="caja_linea_divisoria2"></div>
	<?php } ?>

	<?php function t_division_line4(){ ?>
		<div class="caja_linea_divisoria4"></div>
	<?php } ?>

	<?php function t_image_thumb($album_cover,$width,$height,$options){ ?>
		<div class="caja_mis_articulos_foto">
            
            <?php
            echo thumbnail_image_tag ( $album_cover, array(
                'thumbnail_constant' => 'C',
                'auto_include_filename' => false
            ) ); ?>
            </div>
	<?php } ?>

	<?php function t_image_info($title,$content){ ?>
		<p>
            <strong><?= __ ( $title ) ?>: &nbsp;</strong>
            <?= __ ( $content ) ?>
        </p>
	<?php } ?>

	<?php function t_results_header(){ ?>
		<div class="col_resultado_busqueda_top1"><a class="texto_11_gris4" href="#"><?= __ ( "Nº of photos" ) ?></a></div>
                            <div class="col_resultado_busqueda_top2"><a class="texto_11_gris4" href="#"><?= __ ( "Name" ) ?></a></div>
                            <div class="col_resultado_busqueda_top3"><a class="texto_11_gris4" href="#"><?= __ ( "Province" ) ?></a></div>
                            <div class="col_resultado_busqueda_top4"><a class="texto_11_gris4" href="#"><?= __ ( "Price" ) ?></a></div>
                            <div class="col_resultado_busqueda_top5"><a class="texto_11_gris4" href="#"><?= __ ( "Opinion" ) ?></a></div>
                            <div class="col_resultado_busqueda_top6"><a class="texto_11_gris4" href="#"><?= __ ( "Offerings" ) ?></a></div>
	<?php } ?>

	<?php function t_user_results_header(){ ?>
		<div class="col_resultado_busqueda_top1"><a class="texto_11_gris4" href="#"><?= __ ( "With photo" ) ?></a></div>
                            <div class="col_resultado_busqueda_top2"><a class="texto_11_gris4" href="#"><?= __ ( "Name" ) ?></a></div>
                            <div class="col_resultado_busqueda_top3_2"><a class="texto_11_gris4" href="#"><?= __ ( "Gender" ) ?></a></div>
                            <div class="col_resultado_busqueda_top4_2"><a class="texto_11_gris4" href="#"><?= __ ( "Age" ) ?></a></div>
                            <div class="col_resultado_busqueda_top6_3"><a class="texto_11_gris4" href="#"><?= __ ( "Province" ) ?></a></div>
                            <div class="col_resultado_busqueda_top7_2"><a class="texto_11_gris4" href="#"><?= __ ( "Country" ) ?></a></div>
                            <div class="clear"></div>
	<?php } ?>

	<?php function t_list_with_action_bar_h($listablePeer,$actions){ ?>
		<?php for ($j = 0; $j < count ( $listablePeer ); $j++): ?> 
            <div class="<?php echo $j + 1 == count ( $listablePeer ) ? 'caja_cont_fila_servicios' : 'caja_cont_fila' ?>">
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tbody><tr>
                            <td align="left" valign="top" class="col1_servicios"><?= $listablePeer[$j]->getTitle() ?></td>
                             <?php $i = 0;
                foreach ($actions as $key => $a): ?> 
                                <?php if((count($actions) -$i) == 1): ?>
                                <td align="center" valign="top" class="col3_servicios">
                                    <?php else: ?>
                                </td><td align="center" valign="top" class="col2_servicios">
                                    <?php endif; ?>
                                    <?php $i++; ?>
                                    
                                     <?php $link_helper = array_key_exists ( 'link_helper', $a ) ? $a['link_helper'] : 'link_to'; ?>
                            <?php $a['options']['class'] = array_key_exists ( 'class', $a['options'] ) ? $a['options']['class'] . ' texto_11_gris' : 'texto_11_gris'; ?>
                            <?= call_user_func ( $link_helper, __ ( $a['anchor'] ), call_user_func ( array($listablePeer[$j], 'get' . sfInflector::camelize ( $key ) . 'Link') ), $a['options'] ) ?>
	
                        </td>
                          <?php endforeach; ?> 

                    </tr>
                </tbody></table>
        </div>
<?php endfor; ?>
	<?php } ?>

	<?php function t_resultado_row($listable){ ?>
		<div class="<?= ($listable->getObject ()->getRecommended () ? 'recomendado' : '') ?> caja_cont_resultado">
                                <div class="col_cont_resultado1">
                                    <?php if($listable->getObject()->getRecommended()): ?>
                                    <div class="caja_cont_recomendado">
                                        <img alt="<?php echo __ ( 'Recommended' ) ?>" src="<?= template_image ( 'recomendado.gif' ) ?>" />
                                    </div>
                                    <?php endif; ?>
                                    <div class="caja_cont_resultado_foto">
                                        <p>
                                            <a href="<?= $listable->getShowLink () ?>">
                                                <?php if($a = $listable->getAvatar()): ?>
                                                      <?php echo thumbnail_image_tag ( $a,array('thumbnail_constant' => 'D','width' => 60,'height' => 60) ) ?>
                                                <?php else: ?>
                                                <img height="60" width="60" src="<?= template_image ( 'alojamiento_none.gif' ) ?>" />
                                                <?php endif; ?>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="caja_cont_resultado_foto_cant">
                                        <img height="13" width="16" alt=" " src="<?= template_image ( 'foto2.png' ) ?>"/>:
                                        <?= $listable->getNbPhotos() ?>
                                    </div>
                                </div>
                                <div class="col_cont_resultado2">
                                    <div class="col_cont_resultado_dentro1">
                                        <div class="caja_icono3"><img height="16" width="16" alt=" " src="<?= template_image ( 'casa4.png' ) ?>"/></div>
                                        <div class="caja_titulo3"><a class="texto_11_color3" href="<?= $listable->getShowLink () ?>"><?= $listable->getTitle() ?></a></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col_cont_resultado_dentro2">
                                        <p class="texto_11_gris2"><?= $listable->getProvince() ?></p>
                                        <p> <?= $listable->getCity() ?></p>
                                    </div>
                                    <div class="col_cont_resultado_dentro3"><img width="22" alt=" " src="<?= $listable->getImageForPrice () ?>"/></div>
                                    <div class="col_cont_resultado_dentro4">
                                      <p><!--Skip content: /sf_rater($listable/getObject()) --><!--<img height="11" width="60" alt=" " src="images/valoracion.gif"/>---><!--/Skip--></p>
                                        <p> </p>
                                        <p><?= show_nb_comments($listable->getObject()) ?></p>
                                    </div>
                                    <div class="col_cont_resultado_dentro5">
                                        <?php if($listable->hasLastMinuteOffer()): ?>
                                        <p class="texto_11_color2"><img width="12" height="13" alt=" " src="<?= template_image ( 'oferta_especial2.png' ) ?>" /></p>
                                        <p class="texto_11_color2">Ultima hora! </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="caja_resultado_busqueda_texto"> <?= $listable->getContent() ?></div>
                                        <div class="caja_cant_amigos">
                                            <div style="float:right">
                                            <?php include_component('bookmark','add',array('type' => get_class($listable->getObject()),'id' => $listable->getId())) ?>
                                            </div>
                                            <img height="14" width="12" alt=" " src="<?= template_image ( 'desconectado.png' ) ?>"/>&nbsp;<?php echo format_number_choice ( "[0]no friends|[1]one friend|(1,+Inf] %count% friends",array("%count%" => $listable->getNbFriends ()),$listable->getObject ()->getProfile ()->getNbFriends () ) ?>
                                        </div>
                                </div>
                                <div class="clear"></div>
                            </div>
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTComment');

class TComment extends BaseTComment{ 

} ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTShortLists');

class TShortLists extends BaseTShortLists{ 

} ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTBaseLists');

class TBaseLists extends BaseTBaseLists{ 

} ?>

