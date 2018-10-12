<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="icon-table"></i> Form nilai</h3>
            <div class="btn-group pull-right">
                <a href="#inside" data-toggle="tab" class="btn btn-success"><i class="icon-checkbox-partial"></i> Daftar Nilai</a>
                <a class="btn btn-info reset" href="#" >Reset Form</a>
            </div> 
    </div>
    <div class="panel-body">
        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 kelola" >
                <div id="form_input" class="">
                    <?php echo form_open(base_url().'nilai/submit_nilai',array('id'=>'addform','role'=>'form','class'=>'form')); ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <input type="hidden" value='' id="id_nilai" name="id_nilai">
                        <?php echo form_input('id_dosen',!empty($id_dosen)?$id_dosen:'','id="id_dosen" class="form-control" placeholder="Enter ID Dosen"'); ?>
                            
                                            
                        </div>
                    </div>
                    <div class="row">

                            
                            <?php if(!empty($kriteria)):
                            // echo var_dump($kriteria);
                            $i=1;
                                foreach ($kriteria as $value) {
                                    # code...
                                    echo '<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">';
                                    echo '<div class="form-group">';
                                    echo form_label($value['nama_kriteria'].' : ','nilai',array('class'=>'control-label'));
                                    echo '<div class="controls">';
                                    echo '<input name="id_kriteria[]" type="hidden" value="'.$value['id_kriteria'].'">';
                                    echo form_input('nilai[]','','id="nilai" class="form-control input-lg" placeholder="'.$value['keterangan'].'"');
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    // echo $value['nilai'];
                                }
                                endif;

                            ?>
                            
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="save_nilai" type="submit" class="btn btn-md btn-success"><icon class="fa fa-floppy-o"></icon> Simpan</button>
                            <a href="#" id="cancel_edit" class="btn btn-md btn-danger batal" style=""><i class="glyphicon glyphicon-remove"></i> Batal</a>
                        </div>
                    </div>
                    <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>