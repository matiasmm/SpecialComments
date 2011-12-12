<?php

			//Themes: otonio,verano,invierno,primavera			
	function tblock_not_authenticated($sf_user){ 
		if(!function_exists("t_tblock_not_authenticated"))
			require(dirname(__FILE__).'/generated-helpers/t_bloques.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tblock_not_authenticated($sf_user);
		return ob_get_clean();
		
	}			
	function tblock_travel_meet_share(){ 
		if(!function_exists("t_tblock_travel_meet_share"))
			require(dirname(__FILE__).'/generated-helpers/t_bloques.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tblock_travel_meet_share();
		return ob_get_clean();
		
	}			
	function tblock_authenticated_user($sf_user){ 
		if(!function_exists("t_tblock_authenticated_user"))
			require(dirname(__FILE__).'/generated-helpers/t_bloques.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tblock_authenticated_user($sf_user);
		return ob_get_clean();
		
	}			
	function tblock_authenticated_provider($sf_user){ 
		if(!function_exists("t_tblock_authenticated_provider"))
			require(dirname(__FILE__).'/generated-helpers/t_bloques.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tblock_authenticated_provider($sf_user);
		return ob_get_clean();
		
	}			
	function tblock_user_registration(){ 
		if(!function_exists("t_tblock_user_registration"))
			require(dirname(__FILE__).'/generated-helpers/t_bloques.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tblock_user_registration();
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function form_foot(){ 
		if(!function_exists("t_form_foot"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_form_foot();
		return ob_get_clean();
		
	}			
	function end_form_foot(){ 
		if(!function_exists("t_end_form_foot"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_form_foot();
		return ob_get_clean();
		
	}			
	function caja_botones(){ 
		if(!function_exists("t_caja_botones"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_caja_botones();
		return ob_get_clean();
		
	}			
	function end_caja_botones(){ 
		if(!function_exists("t_end_caja_botones"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_caja_botones();
		return ob_get_clean();
		
	}			
	function form_listable_actions(){ 
		if(!function_exists("t_form_listable_actions"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_form_listable_actions();
		return ob_get_clean();
		
	}			
	function end_form_listable_actions(){ 
		if(!function_exists("t_end_form_listable_actions"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_form_listable_actions();
		return ob_get_clean();
		
	}			
	function link_to_action($anchor,$url,$options=array(),$link_helper="link_to"){ 
		if(!function_exists("t_link_to_action"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_link_to_action($anchor,$url,$options,$link_helper);
		return ob_get_clean();
		
	}			
	function button_right($button){ 
		if(!function_exists("t_button_right"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_button_right($button);
		return ob_get_clean();
		
	}			
	function link_plus($anchor,$url,$onclick=''){ 
		if(!function_exists("t_link_plus"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_link_plus($anchor,$url,$onclick);
		return ob_get_clean();
		
	}			
	function link_go($anchor,$url,$ventana_destino=0){ 
		if(!function_exists("t_link_go"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_link_go($anchor,$url,$ventana_destino);
		return ob_get_clean();
		
	}			
	function btn_submit($value,$type,$options){ 
		if(!function_exists("t_btn_submit"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_btn_submit($value,$type,$options);
		return ob_get_clean();
		
	}			
	function float_left_button($value,$options=array()){ 
		if(!function_exists("t_float_left_button"))
			require(dirname(__FILE__).'/generated-helpers/t_botones.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_float_left_button($value,$options);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function end_buscador_column1(){ 
		if(!function_exists("t_end_buscador_column1"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_buscador_column1();
		return ob_get_clean();
		
	}			
	function end_buscador_column2(){ 
		if(!function_exists("t_end_buscador_column2"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_buscador_column2();
		return ob_get_clean();
		
	}			
	function end_buscador_elementos(){ 
		if(!function_exists("t_end_buscador_elementos"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_buscador_elementos();
		return ob_get_clean();
		
	}			
	function end_col_elementos_buscador1(){ 
		if(!function_exists("t_end_col_elementos_buscador1"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_col_elementos_buscador1();
		return ob_get_clean();
		
	}			
	function col_elementos_buscador2(){ 
		if(!function_exists("t_col_elementos_buscador2"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_col_elementos_buscador2();
		return ob_get_clean();
		
	}			
	function end_col_elementos_buscador2(){ 
		if(!function_exists("t_end_col_elementos_buscador2"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_col_elementos_buscador2();
		return ob_get_clean();
		
	}			
	function caja_cont_resultado_busqueda(){ 
		if(!function_exists("t_caja_cont_resultado_busqueda"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_caja_cont_resultado_busqueda();
		return ob_get_clean();
		
	}			
	function end_caja_cont_resultado_busqueda(){ 
		if(!function_exists("t_end_caja_cont_resultado_busqueda"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_caja_cont_resultado_busqueda();
		return ob_get_clean();
		
	}			
	function buscador_column1($image=false){ 
		if(!function_exists("t_buscador_column1"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_buscador_column1($image);
		return ob_get_clean();
		
	}			
	function buscador_column2(){ 
		if(!function_exists("t_buscador_column2"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_buscador_column2();
		return ob_get_clean();
		
	}			
	function buscador_elementos(){ 
		if(!function_exists("t_buscador_elementos"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_buscador_elementos();
		return ob_get_clean();
		
	}			
	function caja_minimizar(){ 
		if(!function_exists("t_caja_minimizar"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_caja_minimizar();
		return ob_get_clean();
		
	}			
	function col_elementos_buscador1(){ 
		if(!function_exists("t_col_elementos_buscador1"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_col_elementos_buscador1();
		return ob_get_clean();
		
	}			
	function results_order_leyend($handler,$autocompleter_widget){ 
		if(!function_exists("t_results_order_leyend"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_results_order_leyend($handler,$autocompleter_widget);
		return ob_get_clean();
		
	}			
	function notice_search_box($form,$url){ 
		if(!function_exists("t_notice_search_box"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_notice_search_box($form,$url);
		return ob_get_clean();
		
	}			
	function mapa_busqueda(){ 
		if(!function_exists("t_mapa_busqueda"))
			require(dirname(__FILE__).'/generated-helpers/t_buscador.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_mapa_busqueda();
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function search_(){ 
		if(!function_exists("t_search_"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_search_();
		return ob_get_clean();
		
	}			
	function _search(){ 
		if(!function_exists("t__search"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__search();
		return ob_get_clean();
		
	}			
	function b_icon_arrow($icon_url){ 
		if(!function_exists("t_b_icon_arrow"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.otonio.php');
		ob_start();
		t_b_icon_arrow($icon_url);
		return ob_get_clean();
		
	}			
	function _square(){ 
		if(!function_exists("t__square"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__square();
		return ob_get_clean();
		
	}			
	function _portada(){ 
		if(!function_exists("t__portada"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__portada();
		return ob_get_clean();
		
	}			
	function _sep_col_1(){ 
		if(!function_exists("t__sep_col_1"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__sep_col_1();
		return ob_get_clean();
		
	}			
	function sep_col_2_(){ 
		if(!function_exists("t_sep_col_2_"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_sep_col_2_();
		return ob_get_clean();
		
	}			
	function _sep_col_2(){ 
		if(!function_exists("t__sep_col_2"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__sep_col_2();
		return ob_get_clean();
		
	}			
	function _p_portada(){ 
		if(!function_exists("t__p_portada"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__p_portada();
		return ob_get_clean();
		
	}			
	function p_portada_sin_css($title,$legend=""){ 
		if(!function_exists("t_p_portada_sin_css"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_p_portada_sin_css($title,$legend);
		return ob_get_clean();
		
	}			
	function p_portada($title,$legend=""){ 
		if(!function_exists("t_p_portada"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_p_portada($title,$legend);
		return ob_get_clean();
		
	}			
	function square_($title,$icon_url=""){ 
		if(!function_exists("t_square_"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_square_($title,$icon_url);
		return ob_get_clean();
		
	}			
	function portada_($title,$legend=""){ 
		if(!function_exists("t_portada_"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_portada_($title,$legend);
		return ob_get_clean();
		
	}			
	function sep_col_1_($small=false){ 
		if(!function_exists("t_sep_col_1_"))
			require(dirname(__FILE__).'/generated-helpers/t_contenedores.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_sep_col_1_($small);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function tpf_template_container_(){ 
		if(!function_exists("t_tpf_template_container_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_template_container_();
		return ob_get_clean();
		
	}			
	function tpf_header_container_(){ 
		if(!function_exists("t_tpf_header_container_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_header_container_();
		return ob_get_clean();
		
	}			
	function _tpf_header_container(){ 
		if(!function_exists("t__tpf_header_container"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpf_header_container();
		return ob_get_clean();
		
	}			
	function tpf_right_column_(){ 
		if(!function_exists("t_tpf_right_column_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_right_column_();
		return ob_get_clean();
		
	}			
	function _tpf_right_column(){ 
		if(!function_exists("t__tpf_right_column"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpf_right_column();
		return ob_get_clean();
		
	}			
	function _tpf_template_container(){ 
		if(!function_exists("t__tpf_template_container"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpf_template_container();
		return ob_get_clean();
		
	}			
	function tpf_header($site_name,$menu){ 
		if(!function_exists("t_tpf_header"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_header($site_name,$menu);
		return ob_get_clean();
		
	}			
	function tpf_terms_and_conditions(){ 
		if(!function_exists("t_tpf_terms_and_conditions"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_terms_and_conditions();
		return ob_get_clean();
		
	}			
	function tpf_content_(){ 
		if(!function_exists("t_tpf_content_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_content_();
		return ob_get_clean();
		
	}			
	function _tpf_content(){ 
		if(!function_exists("t__tpf_content"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpf_content();
		return ob_get_clean();
		
	}			
	function tpf_footer(){ 
		if(!function_exists("t_tpf_footer"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_footer();
		return ob_get_clean();
		
	}			
	function tpf_login(){ 
		if(!function_exists("t_tpf_login"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_2_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_login();
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function tpp_template_container_(){ 
		if(!function_exists("t_tpp_template_container_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpp_template_container_();
		return ob_get_clean();
		
	}			
	function tpp_center_column_(){ 
		if(!function_exists("t_tpp_center_column_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpp_center_column_();
		return ob_get_clean();
		
	}			
	function tpp_left_(){ 
		if(!function_exists("t_tpp_left_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpp_left_();
		return ob_get_clean();
		
	}			
	function _tpp_left(){ 
		if(!function_exists("t__tpp_left"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpp_left();
		return ob_get_clean();
		
	}			
	function _tpp_content(){ 
		if(!function_exists("t__tpp_content"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpp_content();
		return ob_get_clean();
		
	}			
	function _tpp_center_column(){ 
		if(!function_exists("t__tpp_center_column"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpp_center_column();
		return ob_get_clean();
		
	}			
	function placeholder_(){ 
		if(!function_exists("t_placeholder_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.otonio.php');
		ob_start();
		t_placeholder_();
		return ob_get_clean();
		
	}			
	function _placeholder(){ 
		if(!function_exists("t__placeholder"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.otonio.php');
		ob_start();
		t__placeholder();
		return ob_get_clean();
		
	}			
	function _tpp_template_container(){ 
		if(!function_exists("t__tpp_template_container"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__tpp_template_container();
		return ob_get_clean();
		
	}			
	function tpp_content_(){ 
		if(!function_exists("t_tpp_content_"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpp_content_();
		return ob_get_clean();
		
	}			
	function tpf_search(){ 
		if(!function_exists("t_tpf_search"))
			require(dirname(__FILE__).'/generated-helpers/t_estructura_3_columnas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tpf_search();
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function draggable_canvas_($profile_name){ 
		if(!function_exists("t_draggable_canvas_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_draggable_canvas_($profile_name);
		return ob_get_clean();
		
	}			
	function draggable_col_1_(){ 
		if(!function_exists("t_draggable_col_1_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_draggable_col_1_();
		return ob_get_clean();
		
	}			
	function _draggable_col_1(){ 
		if(!function_exists("t__draggable_col_1"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__draggable_col_1();
		return ob_get_clean();
		
	}			
	function draggable_col_2_(){ 
		if(!function_exists("t_draggable_col_2_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_draggable_col_2_();
		return ob_get_clean();
		
	}			
	function _draggable_col_2(){ 
		if(!function_exists("t__draggable_col_2"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__draggable_col_2();
		return ob_get_clean();
		
	}			
	function draggable_col_3_(){ 
		if(!function_exists("t_draggable_col_3_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_draggable_col_3_();
		return ob_get_clean();
		
	}			
	function _draggable_col_3(){ 
		if(!function_exists("t__draggable_col_3"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__draggable_col_3();
		return ob_get_clean();
		
	}			
	function _draggable_canvas(){ 
		if(!function_exists("t__draggable_canvas"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__draggable_canvas();
		return ob_get_clean();
		
	}			
	function _draggable_canvas_no_leyend(){ 
		if(!function_exists("t__draggable_canvas_no_leyend"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__draggable_canvas_no_leyend();
		return ob_get_clean();
		
	}			
	function extranet_menu_lateral_subcolumn_(){ 
		if(!function_exists("t_extranet_menu_lateral_subcolumn_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_extranet_menu_lateral_subcolumn_();
		return ob_get_clean();
		
	}			
	function _extranet_menu_lateral_subcolumn(){ 
		if(!function_exists("t__extranet_menu_lateral_subcolumn"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__extranet_menu_lateral_subcolumn();
		return ob_get_clean();
		
	}			
	function modules_subcolumns_(){ 
		if(!function_exists("t_modules_subcolumns_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_modules_subcolumns_();
		return ob_get_clean();
		
	}			
	function modules_col1_(){ 
		if(!function_exists("t_modules_col1_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_modules_col1_();
		return ob_get_clean();
		
	}			
	function _modules_col1(){ 
		if(!function_exists("t__modules_col1"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__modules_col1();
		return ob_get_clean();
		
	}			
	function modules_col2_(){ 
		if(!function_exists("t_modules_col2_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_modules_col2_();
		return ob_get_clean();
		
	}			
	function _modules_col2(){ 
		if(!function_exists("t__modules_col2"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__modules_col2();
		return ob_get_clean();
		
	}			
	function _modules_subcolumns(){ 
		if(!function_exists("t__modules_subcolumns"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__modules_subcolumns();
		return ob_get_clean();
		
	}			
	function friend_list_($requests_nro){ 
		if(!function_exists("t_friend_list_"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_friend_list_($requests_nro);
		return ob_get_clean();
		
	}			
	function extranet_default_content($text){ 
		if(!function_exists("t_extranet_default_content"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_extranet_default_content($text);
		return ob_get_clean();
		
	}			
	function nuevas_amistades($form){ 
		if(!function_exists("t_nuevas_amistades"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_nuevas_amistades($form);
		return ob_get_clean();
		
	}			
	function mis_albumes($listable){ 
		if(!function_exists("t_mis_albumes"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_mis_albumes($listable);
		return ob_get_clean();
		
	}			
	function contenidos_mas_leidos($listable){ 
		if(!function_exists("t_contenidos_mas_leidos"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_contenidos_mas_leidos($listable);
		return ob_get_clean();
		
	}			
	function buscador_conoce_simple($form){ 
		if(!function_exists("t_buscador_conoce_simple"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_buscador_conoce_simple($form);
		return ob_get_clean();
		
	}			
	function cuadernos_de_viaje($listable){ 
		if(!function_exists("t_cuadernos_de_viaje"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_cuadernos_de_viaje($listable);
		return ob_get_clean();
		
	}			
	function mis_viajes($listable){ 
		if(!function_exists("t_mis_viajes"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_mis_viajes($listable);
		return ob_get_clean();
		
	}			
	function extranet_menu_lateral_friend($profile,$my_user){ 
		if(!function_exists("t_extranet_menu_lateral_friend"))
			require(dirname(__FILE__).'/generated-helpers/t_extranet.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_extranet_menu_lateral_friend($profile,$my_user);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function form_title($title,$mandatory_text=true){ 
		if(!function_exists("t_form_title"))
			require(dirname(__FILE__).'/generated-helpers/t_formulario.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_form_title($title,$mandatory_text);
		return ob_get_clean();
		
	}			
	function legend($string){ 
		if(!function_exists("t_legend"))
			require(dirname(__FILE__).'/generated-helpers/t_formulario.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_legend($string);
		return ob_get_clean();
		
	}			
	function field_container($type,$str_error,$label,$field,$help){ 
		if(!function_exists("t_field_container"))
			require(dirname(__FILE__).'/generated-helpers/t_formulario.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_field_container($type,$str_error,$label,$field,$help);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function draggable_icon($image_path,$id,$count,$url,$title=''){ 
		if(!function_exists("t_draggable_icon"))
			require(dirname(__FILE__).'/generated-helpers/t_iconos.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_draggable_icon($image_path,$id,$count,$url,$title);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function list_with_action_bar(){ 
		if(!function_exists("t_list_with_action_bar"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_list_with_action_bar();
		return ob_get_clean();
		
	}			
	function end_list_with_action_bar(){ 
		if(!function_exists("t_end_list_with_action_bar"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_list_with_action_bar();
		return ob_get_clean();
		
	}			
	function cont_image_info(){ 
		if(!function_exists("t_cont_image_info"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_cont_image_info();
		return ob_get_clean();
		
	}			
	function end_cont_image_info(){ 
		if(!function_exists("t_end_cont_image_info"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_cont_image_info();
		return ob_get_clean();
		
	}			
	function division_line(){ 
		if(!function_exists("t_division_line"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_division_line();
		return ob_get_clean();
		
	}			
	function division_line4(){ 
		if(!function_exists("t_division_line4"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_division_line4();
		return ob_get_clean();
		
	}			
	function image_thumb($album_cover,$width=105,$height=105,$options=array()){ 
		if(!function_exists("t_image_thumb"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_image_thumb($album_cover,$width,$height,$options);
		return ob_get_clean();
		
	}			
	function image_info($title,$content){ 
		if(!function_exists("t_image_info"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_image_info($title,$content);
		return ob_get_clean();
		
	}			
	function results_header(){ 
		if(!function_exists("t_results_header"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_results_header();
		return ob_get_clean();
		
	}			
	function user_results_header(){ 
		if(!function_exists("t_user_results_header"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_user_results_header();
		return ob_get_clean();
		
	}			
	function list_with_action_bar_h($listablePeer,$actions){ 
		if(!function_exists("t_list_with_action_bar_h"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_list_with_action_bar_h($listablePeer,$actions);
		return ob_get_clean();
		
	}			
	function resultado_row($listable){ 
		if(!function_exists("t_resultado_row"))
			require(dirname(__FILE__).'/generated-helpers/t_listados.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_resultado_row($listable);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function google_map_cont($id){ 
		if(!function_exists("t_google_map_cont"))
			require(dirname(__FILE__).'/generated-helpers/t_map_component.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_google_map_cont($id);
		return ob_get_clean();
		
	}			
	function end_google_map_cont(){ 
		if(!function_exists("t_end_google_map_cont"))
			require(dirname(__FILE__).'/generated-helpers/t_map_component.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_google_map_cont();
		return ob_get_clean();
		
	}			
	function origin_icons_box(){ 
		if(!function_exists("t_origin_icons_box"))
			require(dirname(__FILE__).'/generated-helpers/t_map_component.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_origin_icons_box();
		return ob_get_clean();
		
	}			
	function end_origin_icons_box(){ 
		if(!function_exists("t_end_origin_icons_box"))
			require(dirname(__FILE__).'/generated-helpers/t_map_component.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_origin_icons_box();
		return ob_get_clean();
		
	}			
	function how_to_arrive_map_icons($url,$vistable,$gps_coords=array()){ 
		if(!function_exists("t_how_to_arrive_map_icons"))
			require(dirname(__FILE__).'/generated-helpers/t_map_component.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_how_to_arrive_map_icons($url,$vistable,$gps_coords);
		return ob_get_clean();
		
	}			
	function how_to_arrive_box(){ 
		if(!function_exists("t_how_to_arrive_box"))
			require(dirname(__FILE__).'/generated-helpers/t_map_component.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_how_to_arrive_box();
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function tmenu_banner_ItemsParentBegin_level0(){ 
		if(!function_exists("t_tmenu_banner_ItemsParentBegin_level0"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_banner_ItemsParentBegin_level0();
		return ob_get_clean();
		
	}			
	function tmenu_banner_separator(){ 
		if(!function_exists("t_tmenu_banner_separator"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_banner_separator();
		return ob_get_clean();
		
	}			
	function tmenu_banner_ItemsParentEnd_level0(){ 
		if(!function_exists("t_tmenu_banner_ItemsParentEnd_level0"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_banner_ItemsParentEnd_level0();
		return ob_get_clean();
		
	}			
	function tmenu_banner_buttons(){ 
		if(!function_exists("t_tmenu_banner_buttons"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_banner_buttons();
		return ob_get_clean();
		
	}			
	function end_tmenu_banner_buttons(){ 
		if(!function_exists("t_end_tmenu_banner_buttons"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_tmenu_banner_buttons();
		return ob_get_clean();
		
	}			
	function _LateralgetItem_level0(){ 
		if(!function_exists("t__LateralgetItem_level0"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t__LateralgetItem_level0();
		return ob_get_clean();
		
	}			
	function tmenu_f_restaurant_content($context=''){ 
		if(!function_exists("t_tmenu_f_restaurant_content"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_f_restaurant_content($context);
		return ob_get_clean();
		
	}			
	function tmenu_f_activity_content($context=''){ 
		if(!function_exists("t_tmenu_f_activity_content"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_f_activity_content($context);
		return ob_get_clean();
		
	}			
	function tmenu_f_atraction_content($context=''){ 
		if(!function_exists("t_tmenu_f_atraction_content"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_f_atraction_content($context);
		return ob_get_clean();
		
	}			
	function tmenu_f_shop_content($context=''){ 
		if(!function_exists("t_tmenu_f_shop_content"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_f_shop_content($context);
		return ob_get_clean();
		
	}			
	function LateralgetItem_level0_no_acordeon($title,$link,$image_file_name){ 
		if(!function_exists("t_LateralgetItem_level0_no_acordeon"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_LateralgetItem_level0_no_acordeon($title,$link,$image_file_name);
		return ob_get_clean();
		
	}			
	function LateralgetItem_level0_($title,$image_file_name){ 
		if(!function_exists("t_LateralgetItem_level0_"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_LateralgetItem_level0_($title,$image_file_name);
		return ob_get_clean();
		
	}			
	function tmenu_top_nav(){ 
		if(!function_exists("t_tmenu_top_nav"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_top_nav();
		return ob_get_clean();
		
	}			
	function tmenu_banner_item($anchor,$link,$active){ 
		if(!function_exists("t_tmenu_banner_item"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_banner_item($anchor,$link,$active);
		return ob_get_clean();
		
	}			
	function tmenu_search_providers($selected,$context){ 
		if(!function_exists("t_tmenu_search_providers"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_search_providers($selected,$context);
		return ob_get_clean();
		
	}			
	function tmenu_f_housing_content($context=''){ 
		if(!function_exists("t_tmenu_f_housing_content"))
			require(dirname(__FILE__).'/generated-helpers/t_menues.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tmenu_f_housing_content($context);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function ItemsParentBegin_level0(){ 
		if(!function_exists("t_ItemsParentBegin_level0"))
			require(dirname(__FILE__).'/generated-helpers/t_pasos_registro.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ItemsParentBegin_level0();
		return ob_get_clean();
		
	}			
	function ItemsParentEnd_level0(){ 
		if(!function_exists("t_ItemsParentEnd_level0"))
			require(dirname(__FILE__).'/generated-helpers/t_pasos_registro.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ItemsParentEnd_level0();
		return ob_get_clean();
		
	}			
	function ItemsParentBegin_level1(){ 
		if(!function_exists("t_ItemsParentBegin_level1"))
			require(dirname(__FILE__).'/generated-helpers/t_pasos_registro.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ItemsParentBegin_level1();
		return ob_get_clean();
		
	}			
	function Item_level1($link,$color,$description,$width){ 
		if(!function_exists("t_Item_level1"))
			require(dirname(__FILE__).'/generated-helpers/t_pasos_registro.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_Item_level1($link,$color,$description,$width);
		return ob_get_clean();
		
	}			
	function ItemsParentEnd_level1(){ 
		if(!function_exists("t_ItemsParentEnd_level1"))
			require(dirname(__FILE__).'/generated-helpers/t_pasos_registro.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ItemsParentEnd_level1();
		return ob_get_clean();
		
	}			
	function Item_level0($link,$step,$color,$description,$width,$selected){ 
		if(!function_exists("t_Item_level0"))
			require(dirname(__FILE__).'/generated-helpers/t_pasos_registro.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_Item_level0($link,$step,$color,$description,$width,$selected);
		return ob_get_clean();
		
	}			
	function wizard_level_separator($nr_cols){ 
		if(!function_exists("t_wizard_level_separator"))
			require(dirname(__FILE__).'/generated-helpers/t_pasos_registro.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_wizard_level_separator($nr_cols);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function ttext_slogan($text){ 
		if(!function_exists("t_ttext_slogan"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ttext_slogan($text);
		return ob_get_clean();
		
	}			
	function h1($title){ 
		if(!function_exists("t_h1"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_h1($title);
		return ob_get_clean();
		
	}			
	function h2($title){ 
		if(!function_exists("t_h2"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_h2($title);
		return ob_get_clean();
		
	}			
	function h3($title){ 
		if(!function_exists("t_h3"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_h3($title);
		return ob_get_clean();
		
	}			
	function h4($title){ 
		if(!function_exists("t_h4"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_h4($title);
		return ob_get_clean();
		
	}			
	function h5($title){ 
		if(!function_exists("t_h5"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_h5($title);
		return ob_get_clean();
		
	}			
	function text1($title){ 
		if(!function_exists("t_text1"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_text1($title);
		return ob_get_clean();
		
	}			
	function table_subtitle($text){ 
		if(!function_exists("t_table_subtitle"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_table_subtitle($text);
		return ob_get_clean();
		
	}			
	function tlink_solo($anchor,$url){ 
		if(!function_exists("t_tlink_solo"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tlink_solo($anchor,$url);
		return ob_get_clean();
		
	}			
	function ttext_warning($class=null){ 
		if(!function_exists("t_ttext_warning"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ttext_warning($class);
		return ob_get_clean();
		
	}			
	function ttext_notice($class=null){ 
		if(!function_exists("t_ttext_notice"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ttext_notice($class);
		return ob_get_clean();
		
	}			
	function ttext_display_messages($class=null){ 
		if(!function_exists("t_ttext_display_messages"))
			require(dirname(__FILE__).'/generated-helpers/t_tipos_de_texto.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ttext_display_messages($class);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera			
	function tfondo_contenido(){ 
		if(!function_exists("t_tfondo_contenido"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tfondo_contenido();
		return ob_get_clean();
		
	}			
	function end_tfondo_contenido(){ 
		if(!function_exists("t_end_tfondo_contenido"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_tfondo_contenido();
		return ob_get_clean();
		
	}			
	function tcolor_column(){ 
		if(!function_exists("t_tcolor_column"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tcolor_column();
		return ob_get_clean();
		
	}			
	function end_tcolor_column(){ 
		if(!function_exists("t_end_tcolor_column"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_tcolor_column();
		return ob_get_clean();
		
	}			
	function title_with_icon($vistable){ 
		if(!function_exists("t_title_with_icon"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_title_with_icon($vistable);
		return ob_get_clean();
		
	}			
	function icon_box($icon,$options=array()){ 
		if(!function_exists("t_icon_box"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_icon_box($icon,$options);
		return ob_get_clean();
		
	}			
	function description_box($content){ 
		if(!function_exists("t_description_box"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_description_box($content);
		return ob_get_clean();
		
	}			
	function taction_toolbar_aloj($vistable){ 
		if(!function_exists("t_taction_toolbar_aloj"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_taction_toolbar_aloj($vistable);
		return ob_get_clean();
		
	}			
	function ticons_actions($vistable){ 
		if(!function_exists("t_ticons_actions"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_ticons_actions($vistable);
		return ob_get_clean();
		
	}			
	function link_to_asistente_escapada($url){ 
		if(!function_exists("t_link_to_asistente_escapada"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_link_to_asistente_escapada($url);
		return ob_get_clean();
		
	}			
	function caja_cont_ficha(){ 
		if(!function_exists("t_caja_cont_ficha"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_caja_cont_ficha();
		return ob_get_clean();
		
	}			
	function end_caja_cont_ficha(){ 
		if(!function_exists("t_end_caja_cont_ficha"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_caja_cont_ficha();
		return ob_get_clean();
		
	}			
	function tcolumn_tab_info(){ 
		if(!function_exists("t_tcolumn_tab_info"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tcolumn_tab_info();
		return ob_get_clean();
		
	}			
	function end_tcolumn_tab_info(){ 
		if(!function_exists("t_end_tcolumn_tab_info"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_end_tcolumn_tab_info();
		return ob_get_clean();
		
	}			
	function minimal_list_photo_albums($vistable){ 
		if(!function_exists("t_minimal_list_photo_albums"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_minimal_list_photo_albums($vistable);
		return ob_get_clean();
		
	}			
	function minimal_list_video_albums($vistable){ 
		if(!function_exists("t_minimal_list_video_albums"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_minimal_list_video_albums($vistable);
		return ob_get_clean();
		
	}			
	function tcarrousel($vistable){ 
		if(!function_exists("t_tcarrousel"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tcarrousel($vistable);
		return ob_get_clean();
		
	}			
	function valoracion_reserva($vistable,$options=array()){ 
		if(!function_exists("t_valoracion_reserva"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_valoracion_reserva($vistable,$options);
		return ob_get_clean();
		
	}			
	function tcol_utlimo_minuto($vistable){ 
		if(!function_exists("t_tcol_utlimo_minuto"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tcol_utlimo_minuto($vistable);
		return ob_get_clean();
		
	}			
	function tab_comments_and_friends($vistable){ 
		if(!function_exists("t_tab_comments_and_friends"))
			require(dirname(__FILE__).'/generated-helpers/t_vistas.'.TemplateThemeController::getInstance()->getActualTheme().'.php');
		ob_start();
		t_tab_comments_and_friends($vistable);
		return ob_get_clean();
		
	}
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera
			//Themes: otonio,verano,invierno,primavera