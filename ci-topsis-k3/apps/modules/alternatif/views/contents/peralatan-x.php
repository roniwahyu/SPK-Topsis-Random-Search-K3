<?php if($alat!=null): ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="well well-sm text-center">
        <?php echo $this->input->get('id_alternatif'); ?>
        <h3>Peralatan:</h3>
        
        <!-- <div class="btn-group" data-toggle="buttons"> -->
            <?php foreach ($alat as $key => $value):?>
           
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="form-control" value="" >
                   <span style=""><?php echo $value['id_alat'];?></span>
                </label>
            </div>
        <?php

            // form_checkbox('alat[]');
                       
            endforeach; ?>
            
        <!-- </div> -->

    </div> 
</div>

<?php endif; ?>