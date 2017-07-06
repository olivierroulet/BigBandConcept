<?php $this->layout('public_layout', ['title' => 'Actualités-évènements']) ?>

<?php $this->start('main_content') ?>


<article id="actuUpdate">
	<h1 class="text-center">Mise à jour d'un évènement</h1>


	<div>
		titre <input type="text" value="<?=$current_news['AC_Com1'];?>">

		<?=debug($current_news);?>
	</div>
</article>

<?php $this->stop('main_content') ?>
