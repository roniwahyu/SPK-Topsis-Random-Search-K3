<!-- <div class="container"> -->
	<div class="row" style="margin-top:20px;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3><?php echo !empty($judul)?$judul:'' ?></h3>
						<button type="button" class="print pull-right btn-lg btn btn-info no-print"><i class="glyphicon glyphicon-print"></i> Cetak</button>

			<?php if(!is_null($table)):
				echo $table;
				endif;
			?>
			
		</div>
		
		
		
	</div>
	<div class="row" style="margin-top:20px;">
	</div>
<!-- </div> -->
