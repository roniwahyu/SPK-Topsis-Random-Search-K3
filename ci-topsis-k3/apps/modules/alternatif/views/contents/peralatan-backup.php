<?php if($alat!=null): ?>
<div class="well well-sm text-center">
        <?php echo $this->input->get('id_alternatif'); ?>
        <h3>Peralatan:</h3>
        
        <!-- <div class="btn-group" data-toggle="buttons"> -->
            <?php foreach ($alat as $key => $value):
                # code...
                // echo $value['nama_alat'];
            ?>
            <!-- <label class="btn btn-lg btn-default"> -->
                <?php $check=array(
                    'name'=>'alat[]',
                    'value'=>$value['id_alat'],
                    'id'=>$value['id_alat'],
                    'autocomplete'=>'off',

                );  ?>
                <?php //form_checkbox($check); ?>
                <input name="alat[]" class="alat" id="<?php echo "alat".$value['id_alat'] ?>" value="<?php echo $value['id_alat'] ?>" type="checkbox" autocomplete="off" <?php echo set_checkbox('alat', 'value', TRUE); ?> >
                <span class="glyphicon glyphicon-ok-sign"></span>
            <span style="margin-left:10px" class=""><?php echo $value['nama_alat']; ?></span>
            <!-- </label> -->

                       
            <?php endforeach; ?>
            
        <!-- </div> -->

    </div>
<?php endif; ?>