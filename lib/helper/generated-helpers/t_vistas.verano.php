	<?php function t_tfondo_contenido(){ ?>
		<div class="caja_fondo_contenido">
	<?php } ?>

	<?php function t_end_tfondo_contenido(){ ?>
		</div>
	<?php } ?>

	<?php function t_tcolor_column(){ ?>
		<div class="columnas_color_contenido">
	<?php } ?>

	<?php function t_end_tcolor_column(){ ?>
		</div>
	<?php } ?>

	<?php function t_title_with_icon($vistable){ ?>
		<div class="caja_cont_icono_titulo">
	<?= icon_box($vistable->getIcon()) ?>
	<div class="caja_titulo">
		<?= h1($vistable->getTitle()) ?>
		<p class="texto_11_gris"><?= $vistable->getCityPlusProvince("%city% (%province%)") ?></p>
	</div>
	<div class="clear"></div>
</div>
	<?php } ?>

	<?php function t_icon_box($icon,$options){ ?>
		<div class="caja_icono2">
	<?= image_tag($icon,$options) ?>
</div>
	<?php } ?>

	<?php function t_description_box($content){ ?>
		<div class="caja_lineas_texto">
	<?= $content ?>
</div>
	<?php } ?>

	<?php function t_taction_toolbar_aloj($vistable){ ?>
		<div class="caja_cont_valoracion_reserva">
            <!--fin columna iconos -->
            <!--fin columna reservar ultimo minuto-->
	    <?= ticons_actions($vistable) ?>
	    <?= tcol_utlimo_minuto($vistable) ?>
            <div class="clear"></div>
          </div>
	<?php } ?>

	<?php function t_ticons_actions($vistable){ ?>
		<div class="columna_iconos">
              <p><a class="texto_11_gris4" href="#"><?= '&nbsp;' ?></a> </p>
            </div>
            <div class="columna_iconos">


        <p>
        <?= image_tag(template_image('imprimir.png'), array('alt' => __('Print'), 'title' => __('Print'))) ?>
        <a class="texto_11_gris4" href="<?= url_for('vista_previa',array('action'=>'Establishment','id'=>$vistable->getObject()->getId()))?>" target="_blank">
                <?= __('Print') ?>
        </a>
        </p>



              <p><?= image_tag(template_image('rss.gif'), array('alt' => __('RSS'), 'title' => __('RSS'))) ?>
                  <a class="texto_11_gris4" href="<?= url_for('establishment_feed', $vistable->getObject()) ?>"><?= __('RSS') ?></a></p>
              <p><?= image_tag(template_image('pdf.gif'), array('alt' => __('Download PDF tab'), 'title' => __('Download PDF tab'))) ?>
                  <a class="texto_11_gris4" href="<?= url_for('generar_pdf',array('type'=>'Establishment','id'=>$vistable->getObject()->getId()))?>"><?= __('Download PDF tab') ?></a> </p>
            </div>
	<?php } ?>

	<?php function t_link_to_asistente_escapada($url){ ?>
		<!--p>
	<a href="#">
		<img border="0" alt="<?= __('Asistente de Escapadas') ?>" title="<?= __('Asistente de Escapadas') ?>" src="<?= template_image('asistente_escapadas.gif') ?>"/>
	</a>
	<a class="texto_11_gris4" href="#">
		<?php echo __('Abrir Asistente para escapadas y agregar') ?>
	</a>
</p-->
	<?php } ?>

	<?php function t_caja_cont_ficha(){ ?>
		
	<?php } ?>

	<?php function t_end_caja_cont_ficha(){ ?>
		
	<?php } ?>

	<?php function t_tcolumn_tab_info(){ ?>
		<div class="columna_datos_ficha">
	<?php } ?>

	<?php function t_end_tcolumn_tab_info(){ ?>
		</div>
	<?php } ?>

	<?php function t_minimal_list_photo_albums($vistable){ ?>
		<div class="caja_textos">
	<span class="texto_11_gris">
		<?= __('Albums') ?>:
	</span>
	<?php if($photos = $vistable->getPhotoAlbums()): $i=0;foreach($photos as $album): ?>
	<a class="texto_11_gris4 album_list" <?php if(!$i): ?> style="font-weight: bold"<?php endif; ?> href="#" onclick="MultimediaAlbum.loadAlbum(this,<?php echo $album->getId()?>, <?php echo $vistable->getId()?>); return false;"><?= $album->getName()?> (<?= $album->getNbPhotos() ?>)</a>
	<?php $i++;endforeach; ?>
	<?php else:?>
		<strong><?= __('No photo albums') ?></strong>
	<?php endif;?>

<div class="clear"></div>
</div>
	<?php } ?>

	<?php function t_minimal_list_video_albums($vistable){ ?>
		<div class="caja_textos">
	<span class="texto_11_gris">
		<?= __('Videos') ?>:
	</span>
	<?php if($videos = $vistable->getVideoAlbums()): foreach($videos as $album): ?>
	<a class="texto_11_gris4" href="#" onclick="MultimediaAlbum.loadAlbum(this, <?php echo $album->getId()?>, <?= $vistable->getId() ?>);return false;"><?= $album->getName()?> (<?= $album->getNbPhotos() ?>)</a>
	<?php endforeach; ?>
	<?php else:?>
		<strong><?= __('No video albums') ?></strong>
	<?php endif;?>

<div class="clear"></div>
</div>
	<?php } ?>

	<?php function t_tcarrousel($vistable){ ?>
		<div class="caja_carrusel">

<div id="album_gallery">
<?php include_component('galeriffic', 'show', array('album' => $vistable->getFirstAlbum()))?>
</div>
</div>
<p>
</p>
<p>&nbsp;</p>
	<?php } ?>

	<?php function t_valoracion_reserva($vistable,$options){ ?>
		<div class="caja_cont_valoracion_reserva">
  <div class="columna_iconos">
              <!--<div class="caja_valoracion">
		      <span class="texto_11_gris" style="float:left"><?php //echo __('Valorations')?>: </span>--->
		      <?php //echo sf_rater($vistable->getObject(), $options) ?>
		      
	      <!--</div>-->
              <!--fin caja valoracion-->
              
	      <?php include_component('bookmark', 'add', array('type'=>get_class($vistable->getObject()), 'id'=> $vistable->getObject()->getPrimaryKey() )) ?>
	      <?= link_to_recommendation($vistable->getObject(),image_tag(template_image('recomendar.png'),array('title' => __("Make a recommendation"), 'alt' => __("Make a recommendation"))), array('class' => 'l_recommend')) ?>
	      <?= link_to_commentable($vistable->getObject(),image_tag(template_image('globo2.png'), array("title" => __("Make a comment"), 'alt' => __('Make a comment'))), array('class' => 'l_make_comment')) ?>
	      <?= link_to(image_tag(template_image('pregunta.png')), 'info/under_construction') ?>
              
	    </div>
            <!--fin columna iconos -->
	      <?= tcol_utlimo_minuto($vistable) ?>
            <!--fin columna reservar ultimo minuto-->
            <div class="clear"></div>
</div>
	<?php } ?>

	<?php function t_tcol_utlimo_minuto($vistable){ ?>
		<div class="columna_reservar_ultimo_minuto">
		<?= button_to(__('Reserve'), url_for('reservas_pre_paso1', $vistable->getObject()), array('class' => 'button')) ?>
              
              <br/>
	      <?php if($vistable->hasLastHourOffer()): ?>
              <span class="texto_11_color2"><?= __('Last hour')?>!</span>
	      <?php endif; ?>
            </div>
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTBaseViews');

class TBaseViews extends BaseTBaseViews{ 

} ?>

	<?php function t_tab_comments_and_friends($vistable){ ?>
		<div>
      <div class="float_left">
        <h1><?= __('Friends Network') ?></h1>
      </div>
      <div class="float_left caja_red_texto_amigos">(<?= format_number_choice('[0]%establishment% doesn\'t have friends yet|[1]One friend of %establishment%|(1,+Inf]%friends% friends of %establishment%',array('%friends%' => $vistable->getNbFriends(),'%establishment%' => $vistable->getTitle()),$vistable->getNbFriends()) ?> )</div>
    <div class="float_right">
        <div class="cont1">
        <?php if(sfContext::getInstance()->getUser()->isAuthenticated() && $vistable->getProfile() !== sfContext::getInstance()->getUser()->getProfile()): ?>
            <?php if(!ProfilePeer::weAreFriends($vistable->getProfile(),sfContext::getInstance()->getUser()->getProfile())): ?>
                <a href="#"><img width="20" height="23" alt=" "src="<?= template_image('red_amigos.png') ?>"></a>
                <a class="texto_11_gris4" href="<?= url_for('send_invitation_inside_aldeatour', $vistable->getProfile()) ?>" onclick="MemberListActions.Invite(this); return false;"><?php echo __('Adherirme a la red de amigos de %establishment%',array('%establishment%' => $vistable->getObject())) ?></a>
            <?php else: ?>
                    <h5><?php echo __('You are already friend of %establishment%',array('%establishment%' => $vistable->getObject())) ?>
            <?php endif; ?>
        <?php endif; ?>

        </div>
    </div>
      <div class="clear"></div>
      <p>&nbsp;</p>
      <?php foreach($vistable->getFriends() as $f): ?>
      <div class="caja_foto2"><a href="<?= url_for('profile_user_show', $f->getSfGuardUser()) ?>"><?= image_tag($f->getLastProfileNode()->getPicturePath(false,true),array('width' => 31,'height' => 33,'alt' => $f,'title' => $f)) ?></a></div>
      <!--fin caja foto2 -->
      <div class="caja_icono_red">
      	<?php if(sfContext::getInstance()->getUser()->getStatusForUser($f->getId())): ?>
	      <img width="10" height="11" alt=" " src="<?= template_image('red_conectado.png') ?>" />
	<?php else: ?>
	      <img width="10" height="11" alt=" " src="<?= template_image('red_desconectado.png') ?>" />
	<?php endif; ?>
      </div>
      <!--fin caja icono red -->
      <?php endforeach; ?>
      <div class="clear"></div>
      <div class="caja_cont_boton_red">
        <div class="caja_boton"><a href="#"><img border="0" alt="Ver todos" src="<?= template_image('btn_mas.gif') ?>"></a></div>
        <!--fin caja boton -->
        <div class="caja_link"><a href="<?php echo url_for('list_friends', $vistable->getProfile()) ?>">Ver todos </a> </div>
        <!--fin caja link -->
        <div class="clear"></div>
      </div>
      <!--fin caja cont boton red -->
    </div>
    <?php if($vistable->getObject()->getNbComments()): ?>
    <div class="caja_cont_comentarios">
        <?php echo TComment::header($vistable->getObject()->getNbComments(), __('Establishment comments')) ?>
        <?php foreach($vistable->getObject()->getComments() as $c): ?>
            <?php echo TComment::listable(sfCommentPeer::getListable($c)); ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
	<?php } ?>

