<?php $this->layout('solopageconnected_layout', ['title' => 'Big Band']) ?>

<?php $this->start('main_content') ?>

<section id="clients" class="parallax-section">
	<div class="container">
		<div class="clients-wrapper">
			<div class="row text-center">
			
				<div class="col-sm-8 col-sm-offset-2">
					<h2 class="title-one">Infos Artiste</h2>
				</div>
				<div class="col-sm-12"> 
					
					<?php
					if(!empty($formErrors)){
						?>
						<div class="status alert alert-danger" style=""><?php
							echo '<p style="color:red">'.implode('<br>', $formErrors);?>
						</div>
						<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $this->stop('main_content') ?>
