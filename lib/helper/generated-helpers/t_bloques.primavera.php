	<?php function t_tblock_not_authenticated($sf_user){ ?>
		<div class="caja_color_top_der">

			
							<?= __('Access to Community') ?>
			
					</div>

                                        
                                        <?php
                                        //MATUFIA DISEÑO PORQUE SE VE MAL SINO EN MOZILLA vs IE vs CHROME
                                            $navegador = getenv("HTTP_USER_AGENT");

                                            if (preg_match("/Mozilla/i", "$navegador") && !preg_match("/Chrome/i", "$navegador") && !preg_match("/MSIE/i", "$navegador"))
                                                {
                                                    echo "<div class='caja_formulario_acceso'>";
                                                }
                                                elseif (preg_match("/Chrome/i", "$navegador") && !preg_match("/MSIE/i", "$navegador"))
                                                {
                                                    echo "<div class='caja_formulario_acceso'>";
                                               }else
                                               {
                                                   echo "<div class='caja_formulario_acceso'>";

                                               }
                                        ?>

							<form id="form4" name="form4"
							      action="<?php echo url_for ( '@sf_guard_signin' ) ?>" method="post">
								<input name="signin[username]" type="text" class="form_registro" id="signin_username" />
								<input name="signin[password]" type="password" class="form_registro" id="signin_password" />

								<div class="caja_submit">
									 <input type="submit" value="<?= __ ( 'Sign in' ) ?>" class="button" name="Submit" />
									
								</div>
								<div class="float_left">
									<a href="<?= url_for ( 'password_recovery' ) ?>">
										<?= __('Forgot your password?') ?>
									</a>			</div>
								<div class="clear"></div>
							</form>

						<!--fin modulo registro -->
					</div>
	<?php } ?>

	<?php function t_tblock_travel_meet_share(){ ?>
		<div class="caja_contenedora_globos">
						<div class="col_globos1">
							<p>

								<img src="<?= template_image ( 'globo_viaja.png' ) ?>" alt="<?= __ ( 'Travel' ) ?>" width="85" height="104" />
							</p>
							<h4><a class="travel" href="javascript:void(0)">Viaja </a></h4>
							<p><?= __('Search through thousands options and build your own trip') ?></p>
							
							
						</div>
						<!--fin col globos1 -->
						<div class="col_globos1">
							<div class="caja_globo2">

								<img src="<?= template_image ( 'globo_comparte.png' ) ?>" alt="<?= __ ( 'Share' ) ?>" width="85" height="104" />
							</div>
							<!--fin caja globo2 -->
							<h4><a class="share" href="javascript:void(0)"><?= __('Share') ?></a></h4>
							<p><?= __('Share your new destinations with everyone you want') ?></p>
							
						
						</div>
						<!--fin col globos1 -->
						<div class="col_globos2">
							<div class="caja_globo3">

								<img src="<?= template_image ( 'globo_conoce.png' ) ?>" alt="<?= __ ( 'Know' ) ?>" width="85" height="104" />
							</div>
							<!--fin caja globo3 -->
							<h4><a class="meet" href="javascript:void(0)"><?= __('Meet') ?></a></h4>
							<p><?= __('Meet plenty of options to enjoy the best rural tourism') ?></p>
							
							
						</div>
						<!--fin col globos2 -->
						<div class="clear"></div>
					</div>
					<!--fin caja contenedora globos -->
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseBlockTravelMeetShare');

class BlockTravelMeetShare extends BaseBlockTravelMeetShare{ 

} ?>

	<?php function t_tblock_authenticated_user($sf_user){ ?>
		<div class="caja_color_top_der">
                        <div class="float_left">
						    <a href="<?= url_for ( '@sf_guard_signout' )?>"><?= __('Signout') ?></a>
                        </div>
                        <div class="float_right" style="padding-right: 10px;">
						    <a href="<?= url_for ( 'profile_user_show', $sf_user->getProfile ()->getSfGuardUser () )?>"><?= __('My profile') ?></a>
                        </div>
                        <div class="clear"></div>
						<?php if($sf_user->hasCredential('admin')): ?>
						<?php use_helper('crossAppLink') ?>
						<a href="<?= url_for ( cross_app_url_for('backend', '@homepage'))?>"><?= __('Admin') ?></a>
						<?php endif; ?>
					</div>
					
                                        
                                        <?php
                                        //MATUFIA DISEÑO PORQUE SE VE MAL SINO EN MOZILLA vs IE vs CHROME
                                            $navegador = getenv("HTTP_USER_AGENT");

                                            if (preg_match("/Mozilla/i", "$navegador") && !preg_match("/Chrome/i", "$navegador") && !preg_match("/MSIE/i", "$navegador"))
                                                {
                                                    echo "<div class='caja_formulario_acceso'>";
                                                }
                                                elseif (preg_match("/Chrome/i", "$navegador") && !preg_match("/MSIE/i", "$navegador"))
                                                {
                                                    echo "<div class='caja_formulario_acceso'>";
                                               }else
                                               {
                                                   echo "<div class='caja_formulario_acceso'>";

                                               }
                                        ?>


						
								      <div><span class="texto_11_color"><?= $profile = $sf_user->getProfile ()?></span></div>
							<?php if($profile->getLastProfileNode()->getPicture()): ?>
							<div class="caja_foto_registrado">
									 <div id="upload_btn"><?= thumbnail_tag ( $profile->getUploadPictureDir () . '/' . $profile->getLastProfileNode ()->getPicture (),55,55,'normal',array() )?></div>
							<?php else: ?>
							<div class="caja_foto_registrado_vacio">
								<div id="upload_btn"><?= __('Click here to upload your avatar!') ?></div>
									<?php endif; ?>
									<?= javascript_include_tag ( '/js/json2.js' ) ?>
									<?= javascript_include_tag ( '/sfMultimediaPlugin/js/jquery.ajax.upload.js' ) ?>
									<?= javascript_include_tag ( '/sfMultimediaPlugin/js/on_load.js' ) ?>
									<?= javascript_include_tag ( '/js/jquery/base64.jquery.js' ) ?>
							<?= jq_javascript_tag ( "

							$(document).ready(function() {
								new AjaxUpload('upload_btn', {
									action: '" . url_for ( 'profile_upload_picture', $profile ) . "',
									name: 'file',
									data: {
										pid: " . $profile->getId () . "
									},
									autoSubmit: true,
									onSubmit: function(){
										$('#upload_btn').html(Utils.img);
									},
									onComplete: function(file, response) {
									    resp = JSON.parse(response);
										if(resp.success == 'OK')
											$('#upload_btn').html($.base64Decode(resp.data));
										else
											$('#files_uploaded').html(resp.data);
									}
								});
							})" )
?> 
									<div id="files_uploaded"></div>
								</div>
								<!--fin caja foto registrado -->
								<div class="caja_texto_registrado">
									<div class="caja_iconos_registrado">
										<p><img src="<?= template_image ( 'homepage.gif' )?>" alt="<?= __ ( 'Homepage' )?>" width="9" height="7" /></p></div>
									<!--fin caja iconos registrado -->
									<div class="caja_links_registrado">
										<p><a href="<? echo url_for ( '@extranet_user_homepage' ) ?>" class="texto_10_gris"><?= __('Homepage') ?></a></p>
									</div>
									<div class="caja_iconos_registrado">
										<p><img src="<?= template_image ( 'icono_mensajes.png' ) ?>" alt="<?= __ ( 'Messages' ) ?>" width="9" height="7" /></p>
									</div>
									<div class="caja_links_registrado">
										<p><a href="<?= url_for ( 'extranet_user_notices' ) ?>" class="texto_10_gris"><?= __('Messages (%count%)', array('%count%' => $sf_user->getProfile()->getNbNewMessages())) ?></a></p>
									</div>
									<div class="clear"></div>
									<!--fin caja links registrado -->
									<div class="caja_iconos_registrado">
										<p><img src="<?= template_image ( 'config_avisos.png' ) ?>" alt="<?= __ ( 'Comments' ) ?>" width="8" height="6" /></p>
									</div>
									<!--fin caja iconos registrado -->
									<div class="caja_links_registrado">
										<p><a href="<?php echo url_for ( 'extranet_panel_configuration' ) ?>" class="texto_10_gris"><?= __('Add Config') ?></a></p>
									</div>
									<div class="clear"></div>
									<!--fin caja links registrado -->
									<!--<div class="caja_iconos_registrado">
									  <p><img src="<?= template_image ( 'desconectado2.png' ) ?>" alt="Comentarios" width="8" height="9" /></p>
			        </div>-->
									<!--fin caja iconos registrado -->
									<div class="caja_links_registrado">
										<p><a href="<?= url_for ( $profile->getWorkflowHomePage () ) ?>" class="texto_10_gris"><?= __('Editar ficha') ?></a></p>
									</div>
									<!--fin caja links registrado -->
									<div class="clear"></div>
								</div>
								<!--fin caja texto registrado -->
								<div class="clear"></div>
							</div>
							<!--fin caja registrado extranet -->
	<?php } ?>

	<?php function t_tblock_authenticated_provider($sf_user){ ?>
		<div class="caja_color_top_der">
                        <div class="float_left">
                            <a href="<?= url_for ( '@sf_guard_signout' ) ?>"><?= __('Signout') ?></a>
                        </div>
                        <div class="float_right" style="padding-right: 10px;">
                            <a href="<?= url_for ( $sf_user->getProfile ()->getHomepage () ) ?>"><?= __('My profile') ?></a>
                        </div>
                        <div class="clear"></div>
					</div>
					
                                        
                                        <?php
                                        //MATUFIA DISEÑO PORQUE SE VE MAL SINO EN MOZILLA vs IE vs CHROME
                                            $navegador = getenv("HTTP_USER_AGENT");

                                            if (preg_match("/Mozilla/i", "$navegador") && !preg_match("/Chrome/i", "$navegador") && !preg_match("/MSIE/i", "$navegador"))
                                                {
                                                    echo "<div class='caja_formulario_acceso'>";
                                                }
                                                elseif (preg_match("/Chrome/i", "$navegador") && !preg_match("/MSIE/i", "$navegador"))
                                                {
                                                    echo "<div class='caja_formulario_acceso'>";
                                               }else
                                               {
                                                   echo "<div class='caja_formulario_acceso'>";

                                               }
                                        ?>

						
							<div>
								<span>
								     <?php if($sf_user->getProfile()->getEstablishment()): ?>
								     <a class="texto_11_color" href="<?= url_for ( 'establishment_show', $sf_user->getProfile ()->getEstablishment () ) ?>"><?= $sf_user->getProfile () ?></a>
								     <?php else: ?>
								     <a class="texto_11_color"><?= $sf_user->getProfile() ?></a>
								     <?php endif; ?>
								</span>
							</div>
							<div class="caja_foto_registrado">
										  <?php $profile = $sf_user->getProfile () ?>
								<?php if($profile->getLastProfileNode()->getPicture()): ?>
									<?= thumbnail_tag ( $profile->getUploadPictureDir () . '/' . $profile->getLastProfileNode ()->getPicture (),'50','50','normal',array() ) ?>
								<?php else: ?>
									<?php if($sf_user->getProfile()->getEstablishment()): ?>
										<a href="<?= url_for ( 'establishment_show', $sf_user->getProfile ()->getEstablishment () ) ?>"><img src="<?= template_image ( 'default-avatar.jpg' ) ?>" alt="<?= __ ( 'Pic' ) ?>" height="40" width="40" /></a>
									<?php endif; ?>
								<?php endif; ?>
							</div>
							<div class="caja_texto_registrado">
								<div class="caja_iconos_registrado">
									<p><img src="<?= template_image ( 'homepage.gif' ) ?>" alt="<?= __ ( 'Homepage' ) ?>" width="9" height="7" /></p>
								</div>
								<div class="caja_links_registrado">
									<p><a href="<?= url_for ( 'extranet_provider_reservation_list' ) ?>" class="texto_10_gris"><?= __('Reservas') ?></a></p>
								</div>
								<div class="caja_iconos_registrado">
									<p><img src="<?= template_image ( 'icono_mensajes.png' ) ?>" alt="<?= __ ( 'Messages' ) ?>" width="9" height="7" /></p>
								</div>
								<div class="caja_links_registrado">
									<p><a href="<?php echo url_for ( '@extranet_provider_notices' ) ?>" class="texto_10_gris"><?= __('Notices (%count%)', array('%count%' => $sf_user->getProfile()->getNbNewMessagesReservation())) ?></a></p>
								</div>
								<div class="clear"></div>
								<div class="clear"></div>
								<div class="caja_iconos_registrado">
									<p></p>
								</div>
								<div class="caja_links_registrado">
									<p><a href="<?= url_for ( $profile->getWorkflowHomePage () ) ?>" class="texto_10_gris"><?= __('Editar Ficha') ?></a></p>
								</div>

								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						
					</div>
	<?php } ?>

	<?php function t_tblock_user_registration(){ ?>
		<a href="<?= url_for ( "home_community_advantages" ) ?>">
						<img alt="<?php __ ( 'Register for free' ) ?>" src="<?= template_image ( 'bannercomunidadweb.jpg' ) ?>" />
					</a>
	<?php } ?>

