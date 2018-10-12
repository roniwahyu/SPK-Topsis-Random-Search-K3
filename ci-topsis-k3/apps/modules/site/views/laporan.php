<!-- <div class="container"> -->
	<div class="row" style="margin-top:20px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom:20px;">
			<button type="button" class="print pull-right btn-lg btn btn-info no-print"><i class="glyphicon glyphicon-print"></i> Cetak</button>

		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"  >
			<h3>Kriteria</h3>

			<?php if(!is_null($kriteria)):
				echo $kriteria;
				endif;
			?>
			<hr>
			<h3>Faktor Resiko</h3>
			<?php if(!is_null($resiko)):
				echo $resiko;
				endif;
			?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<h3>Hasil TOPSIS</h3>
			<?php if(!is_null($hasil)):
				echo $hasil;
				endif;
			 ?>
		</div>
		
		
	</div>
	<div class="row" style="margin-top:20px;">
	</div>
<!-- </div> -->
