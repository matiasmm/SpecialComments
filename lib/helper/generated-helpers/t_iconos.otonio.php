<?php 
TemplateThemeController::getInstance()->loadClass('BaseTIcons');

class TIcons extends BaseTIcons{ 

} ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTProviderIcons');

class TProviderIcons extends BaseTProviderIcons{ 

} ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTTagIcon');

class TTagIcon extends BaseTTagIcon{ 

} ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTBookmarkIcons');

class TBookmarkIcons extends BaseTBookmarkIcons{ 

} ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTNoticeIcons');

class TNoticeIcons extends BaseTNoticeIcons{ 

} ?>

	<?php function t_draggable_icon($image_path,$id,$count,$url,$title){ ?>
		<div id="<?php echo $id?>" class="dw caja_novedades_icono">
<a href="<?php echo $url?>">
	<img src="<?php echo $image_path?>" alt="<?= __($title) ?>" title="<?= __($title) ?>"/>
</a>
<?php if($count): ?>
	 <div class="circulo">
	<?= $count ?>
	 </div>
	 
<?php endif; ?>
</div>
	<?php } ?>

<?php 
TemplateThemeController::getInstance()->loadClass('BaseTDraggableIcons');

class TDraggableIcons extends BaseTDraggableIcons{ 

} ?>

