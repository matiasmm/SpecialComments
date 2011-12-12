<?php
	interface TemplateNode{
		
			public function render();
			
			/**
			 * Returns how to render the node if the actual node is nested inside another Node
			 * @return string
			 */
			public function nestedRender();		

			/**
			 * How to call the node from single Helper.
			 * @return unknown_type
			 */
			public function renderCall($generated_dir_name,$helper_base_file, array $options= array());
	}