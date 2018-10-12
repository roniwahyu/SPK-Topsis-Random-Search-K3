<?php if($alat!=null): ?>
<!-- <div class="row"> -->

    <!-- <div class="well well-sm"> -->
        <?php echo $this->input->get('id_alternatif'); ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Peralatan:</h3>
        </div>
        
        
        <!-- <div class="btn-group" data-toggle="buttons"> -->
        <?php foreach ($alat as $key => $value):
        echo '<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">';
          $data = array(
            'name' => 'alat',
            'id' => 'id_alat',
            'value' => $value['id_alat'],
            'class' => '',

            );   
        echo '<div class="checkbox"><label >'; 
        
        echo form_checkbox($data, set_checkbox('alat', $value['id_alat']));
        echo "<span style='margin-left:20px'>".$value['nama_alat']."</span></label>";
        echo "</div>";
        echo "</div>";


                       
            endforeach; ?>

<!-- </div> -->
<?php endif; ?>