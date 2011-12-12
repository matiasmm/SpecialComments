	<?php function t_tpf_template_container_(){ ?>
		<div id="contenedor">
	<?php } ?>

	<?php function t_tpf_header_container_(){ ?>
		<div id="cont_2_columnas">
	<?php } ?>

	<?php function t__tpf_header_container(){ ?>
		</div>
  <!--fin cont 2 columnas -->
	<?php } ?>

	<?php function t_tpf_right_column_(){ ?>
		<div id="col_derecha">
	<?php } ?>

	<?php function t__tpf_right_column(){ ?>
		</div>
	  <!--fin col derecha -->
	   <div class="clear"></div>
	<?php } ?>

	<?php function t__tpf_template_container(){ ?>
		</div>
<!--fin contenedor -->
	<?php } ?>

	<?php function t_tpf_header($site_name,$menu){ ?>
		<div id="header">
    
    
      <?= tmenu_top_nav() ?>
      <div class="banner_header">
			<a href="<?= url_for('@homepage')?>" style="cursor: hand; cursor: pointer; padding: 0 0 90px 190px; float: left; display: inline-block" >
				&nbsp;
			</a>
        <div class="header_texto">
          &nbsp; 
        	<!--The reference portal for rural tourism!-->
        	
        </div>
        <!--fin header texto -->
        

	        <div class="botonera_contenedor">
	    
	    		<?= $menu ?>
	        </div>
	        <!--fin botonera contenedor -->
        
        
      </div>
      <!--fin banner header -->
    </div>
    <!--fin header -->
	<?php } ?>

	<?php function t_tpf_terms_and_conditions(){ ?>
		<div class="caja_terminos_informacion">
		    
			    
			    <?= link_go(__("Use conditions"),url_for_wiki("condiciones_de_uso"), 1) ?>
			    <?= link_go(__("Help"),url_for_wiki("ayuda_contractual"), 1) ?>
			      
		    </div>
		    <!--fin caja terminos informacion -->
	<?php } ?>

	<?php function t_tpf_content_(){ ?>
		<div class="caja_contendora_formularios">
	    <div id="col_izquierda2">
	    
	    
	    
	    	<?= ttext_display_messages() ?>
	<?php } ?>

	<?php function t__tpf_content(){ ?>
		</div>
	    
	    <!--fin col izquierda2 -->
	    <div id="col_derecha2">
	    
	    
	      <?= get_help_column() ?> 
	      
	    </div>
	    <!--fin col derecha -->
	    <div class="clear"></div>
	    
	  </div>
	  <!--fin caja contenedora formularios -->
	<?php } ?>

	<?php function t_tpf_footer(){ ?>
		<div id="cont_4_columnas">
	    <div id="col1">
	      <h2><?= __('Recommend') ?></h2>

              <p>&nbsp;</p>
	      

	      <div class="col1_iconos">
	      
	        <p style="margin-bottom:14px">
	        <img src="<?= template_image('favoritos.png') ?>"  alt="<?= __('Favorites') ?>" width="26" height="24" />
	        </p>

	        <p style="margin-bottom:14px">
	        <img src="<?= template_image('recomendar.png') ?>" alt="<?= __('Recommend') ?>" width="32" height="16" />
	        </p>
	        <p>
	        <img src="<?= template_image('amigo.png') ?>" alt="<?= __('Invite') ?>" width="24" height="18" />
	        </p>

	      </div>
	      <!--fin col1 iconos -->

	      <div class="col1_links">
	        <p><a href="http://www.aldeatour.com" class="jqbookmark" title="Aldeatour - Portal Turismo Rural"><?= __('Add Aldeatour to my favorites') ?></a> </p>
	        <?= javascript_for_fancybox(array(array('css_class'=> 'rec_aldeatour','width' => '565','height' => '180'))) ?>
	        <p><a href="<?= url_for('recomendar_aldeatour') ?>" class="rec_aldeatour secure-nofollow"><?= __('Recommend to a friend') ?></a></p>
	        <?= javascript_for_fancybox(array(array('css_class'=> 'invite_a_friend','width' => '580','height' => '250'))) ?>
	        <p> <a href="<?= url_for('invite_friend_outside_aldeatour')  ?>" class="invite_a_friend"><?= __('Invite a friend') ?></a></p>
	      </div>
	      <!--fin col1 links -->
	      <div class="clear"></div>
	    </div>
	    <!--fin col1 -->
	    <div class="col2">
	      <h2><?= __('Comunity information') ?> </h2>
	      <p>&nbsp;</p>
	      <p><?= __('Linea Comunity Information 1') ?></p>
	      <p><?= __('Linea Comunity Information 2') ?></p>
	      <p>&nbsp;</p>
	      <p><a href="#"><!--What is the aldeatour comunity?--> </a></p>
	      <p><a href="<?= url_for('home_community_advantages')?>"><?= __('Aldeatour Comunity advantages') ?> </a></p>
	      <p><a href="#"<!--How to subscribe?--></a></p>
	      <p><a href="#"><!--I want to be an Aldeatour blogger--> </a></p>
	      <p><?= link_to_wiki(__("Guía de uso"),'Guia_De_Uso')?></p>
	      <p><a href="#"><!--Frequently Asked Questions FAQ--></a></p>
	      <p>&nbsp;</p>
	      <p>&nbsp;</p>
	      <p>&nbsp;</p>
	      <p>&nbsp;</p>
	    </div>
	    <!--fin col2 -->
	    <div class="col2">
	      <h2><?= __('What is Aldeatour?') ?></h2>
	      <p>&nbsp;</p>
	      <p><?= __('Linea What is Aldeatour 1') ?></p>
	      <p>&nbsp;</p>
	      <p><?= link_to_wiki(__("How to include my establishment?"),'Cómo incluir mi establecimiento')?></p>
	      <p><?= link_to_wiki(__("How to advertise?"),'Cómo anunciarme')?></p>
	      <p><?= link_to_wiki(__("Privacy policy"),'Política de Privacidad')?></p>
	      <p><?= link_to_wiki(__("Press room"),'Sala de prensa')?></p>
	      <!--p><!- skip content: <? //echo link_to_wiki(__("Terms and conditions"), 'Terminos y condiciones')?> -><a href="#">Terminos y condiciones</a><!-/skip-></p-->
	      <!--p><a href="#"><?= __('Aldeatour Blog') ?></a></p-->
	    </div>
	    <!--fin col2 -->
	    <div id="col3">
	      <p>&nbsp;</p>
	      <p>
	      
	      <img src="<?= template_image('logo.png') ?>" alt="Aldeatour" width="133" height="86" />
	      
	      </p>
	      <p>&nbsp;</p>
	      <p><?= __('Version 2.0 - Beta') ?></p>
              <p><?=__("Contenidos bajo licencia de Creative Commons")?></p>

              <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/es/" target="_blank" ><img src="<?= template_image('cc.png') ?>"  width="88" height="31"/></a>

	      <p>&nbsp;</p>
	    </div>
	    <!--fin col3 -->
	    <div class="clear"></div>
	  </div>
	  <!--fin cont 4 columnas -->
	<?php } ?>

	<?php function t_tpf_login(){ ?>
		<?php include_partial('tpl_bar/login') ?>
		    
		    <!--fin caja formulario acceso -->
	<?php } ?>

