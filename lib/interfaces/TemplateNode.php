<?php
	interface TemplateNode{
		
			public function render();
			
			/**
			 * Returns how to render the node if the actual node is nested inside another Node
			 * @return string
			 */
			public function nestedRender();		

	}