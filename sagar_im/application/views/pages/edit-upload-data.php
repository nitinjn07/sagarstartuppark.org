<?php 
  $ud = $this->db->get_where('startupupload',array('id'=>$param))->row();
?>
<form action="<?=base_url();?>UploadDocument/StartupUploadUpdate?id=<?=$ud->id;?>" method="post"
    enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <label class="mb-2 mt-3">Select Startup</label>
            <?php 
                                            $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1))->result(); 

                                            
                                            ?>
            <select class="form-control" name="startupid" id="startupid">

                <option value="">Select Startup </option>
                <?php
                                            foreach($startup as $s)
                                            {                                            
                                            ?>
                <option value="<?=$s->id;?>">
                    <?=$s->startup_name;?></option>

                <?php 
                                            }

                                            ?>

            </select>
        </div>
        <div class="col-md-12">
            <label class="mb-2 mt-3">Elecator Pitch</label>
            <textarea class="form-control" name="elector_pitch"><?php echo $ud->elector_pitch;?></textarea>
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">Startup Leagal Registration</label>
            <select class="form-control" name="legal_reg" id="legal">
                <option value="">Select Registration Type</option>
                <option value="Private_Limited">Private Limited</option>
                <option value="Limited_Liability_Partnership">LLP</option>
                <option value="Partnership_Firm">Partnership Firm</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">Registration Number</label>
            <input type="text" class="form-control" name="reg_no" value="<?=$ud->reg_no;?>" />
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">Upload COI <a href="<?=base_url().$ud->coi_files;?>" target="_blank"><i
                        class='fa fa-book'></i></a></label>
            <input type="file" class="form-control" name="coi_file" />
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">Upload PAN <a href="<?=base_url().$ud->pan_files;?>" target="_blank"><i
                        class='fa fa-book'></i></a></label>
            <input type="file" class="form-control" name="pan_file" />
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">DPIIT Number </label>
            <input type="text" class="form-control" name="dpiit_number" value="<?=$ud->dpiit_number;?>" />
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">DPIIT Certificate <a href="<?=base_url().$ud->dpiit_files;?>" target="_blank"><i
                        class='fa fa-book'></i></a></label>
            <input type="file" class="form-control" name="dpiit_file" />
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">MSME Certificate <a href="<?=base_url().$ud->msme_files;?>" target="_blank"><i
                        class='fa fa-book'></i></a></label>
            <input type="file" class="form-control" name="msme_file" />
        </div>
        <div class="col-md-6">
            <label class="mb-2 mt-3">Upload Incubation Aggreement <a href="<?=base_url().$ud->incubation_files;?>"
                    target="_blank"><i class='fa fa-book'></i></a></label>
            <input type="file" class="form-control" name="incubation_file" />
        </div>
        <div class="col-md-12 pt-3 text-center">
            <input type="submit" value="Update Data" class="btn btn-primary" />
        </div>
    </div>
    </div>
</form>

<script>
$('#startupid option:eq(<?=$ud->startupid;?>)').prop('selected', true);

$('#legal option[value="<?=$ud->legal_reg;?>"]').attr("selected", "selected");
</script>