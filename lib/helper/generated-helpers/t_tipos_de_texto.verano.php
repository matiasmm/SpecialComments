	<?php function t_ttext_slogan($text){ ?>
		<div class="slogan_home"><?= $text ?></div>
	<?php } ?>

	<?php function t_h1($title){ ?>
		<h1><?= $title?></h1>
	<?php } ?>

	<?php function t_h2($title){ ?>
		<h2><?= $title?></h2>
	<?php } ?>

	<?php function t_h3($title){ ?>
		<h3><?= $title ?></h3>
	<?php } ?>

	<?php function t_h4($title){ ?>
		<h4><?= $title ?></h4>
	<?php } ?>

	<?php function t_h5($title){ ?>
		<h5><?= $title ?></h5>
	<?php } ?>

	<?php function t_text1($title){ ?>
		<p class="texto_11_color"><?= h1($title) ?> </p>
	<?php } ?>

	<?php function t_table_subtitle($text){ ?>
		<span class="tabla_destacado"><?= $text ?></span>
	<?php } ?>

	<?php function t_tlink_solo($anchor,$url){ ?>
		<div class="caja_link_solo2">
		<a href="<?= $url?>" class="text_11_arial"><?= $anchor?></a>
	</div>
	<?php } ?>

	<?php function t_ttext_warning($class){ ?>
		<?php $els = spInformant::getInstance()->get_Messages("warning"); 
		if(!count($els))
			return ;
	
	?> 
			
	 
	<a name="message"></a>
	
	
	<script languaje="javascript">
	location.href='#message';
	</script>
	
	<div class="caja_error_todo warning <?= $class?$class:"message_box" ?>" <?= !count($els)?"style='display: none'":'' ?>>
	<p class="texto_14_error"><strong>  
		<?= __("Detected errors") ?>:</strong></p>
	<div class="caja_error"><span class="texto_14_error message_content">
		<?php foreach($els as $message): ?>
			<li>		 
			<?php echo $message; ?>
			</li>
		<?php endforeach; ?>
	</span> </div>
	<!--fin caja error-->
	</div>
	<!--fin caja error todo -->
	<?php } ?>

	<?php function t_ttext_notice($class){ ?>
		<?php $els = spInformant::getInstance()->get_Messages("notice"); 
			if(!count($els))
			return ;
			?> 
	
	
	
	<a name="message"></a>
	
	<script languaje="javascript">
	location.href='#message';
	</script>
	 
		<div class="mensaje_confirmacion notice <?= $class?$class:"message_box" ?>" <?= !count($els)?"style='display: none'":'' ?>>
			<div class="caja_error_todo">
			<div class="caja_error"><span class="texto_14_error message_content">
				 <?php foreach($els as $message): ?> 
					<li>	 <?= $message ?> 	 
					</li>

				 <?php endforeach; ?> 
			</span> </div>
			<!--fin caja error-->
			</div>
			<!--fin caja error todo -->
		</div>
	<?php } ?>

	<?php function t_ttext_display_messages($class){ ?>
		<?php
	echo ttext_notice($class);
	echo ttext_warning($class);
?>
	<?php } ?>

