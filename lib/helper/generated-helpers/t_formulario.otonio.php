	<?php function t_form_title($title,$mandatory_text){ ?>
		<div class="caja_contenedor_titulo_paso">
	        <div class="caja_titulo_paso">
	          <h1><?= $title ?></h1>
	        </div>
	        <!--fin caja titulo paso -->
	        
	        <?php if($mandatory_text): ?> 
		        <div class="caja_campos_obligatorios"><span class="texto_11_color"><?= __("Mandatory fields") ?> (*)</span></div>
		        <!--fin caja campos obligatorios -->
		    <?php endif; ?>
	        <div class="clear"></div>
	      </div>
	      <!--fin caja contenedor titulo paso -->
	<?php } ?>

	<?php function t_legend($string){ ?>
		<h5><?= $string  ?></h5>
	      <p>&nbsp;</p>
	<?php } ?>

	<?php function t_field_container($type,$str_error,$label,$field,$help){ ?>
		<div class="<?= 'form-item type-' . $type  ?><?php if($str_error): ?> error<?php endif; ?>">
	    		
	    		<?= $label ?>
	    		
	    		<?= $field ?>
				
						                
			    <?php if($str_error): ?>
			    	<strong class="message"><?= $str_error ?></strong>      
			    <?php endif; ?>
                <?php if($help): ?>
                    <span style="color: green;"><em><?= $help ?></em></span>
                <?php endif; ?>
			    
			</div>
	<?php } ?>

