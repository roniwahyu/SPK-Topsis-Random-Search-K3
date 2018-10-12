<!-- <div class="container"> -->
	<div class="row" style="margin-top:20px;">
		<?php if(!empty($hasil)):?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Kriteria</h3>
				  </div>
				  <div class="panel-body">
						<?php echo $hasil; ?>
						
				  </div>
			</div>
		</div>
		<?php endif;?>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Kriteria</h3>
				  </div>
				  <div class="panel-body">
						<?php echo (!empty($kriteria)?$kriteria:''); ?>
						
				  </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Dosen</h3>
				  </div>
				  <div class="panel-body">
						<?php echo (!empty($dosen)?$dosen:''); ?>
						
				  </div>
			</div>
		</div>
	</div>
<!-- </div> -->
