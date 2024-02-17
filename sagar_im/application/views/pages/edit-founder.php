<?php 
 $founder = $this->db->get_where('founders',array('id'=>$param))->row();
?>
<form action="<?=base_url();?>AcceptedApplication/UpdateFounder" method="post">
    <div class="form-group">
        <label class="pt-2 pb-2">Founder ID<span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="id" value="<?=$param;?>" readonly />
    </div>
    <div class="form-group">
        <label class="pt-2 pb-2">Founder Name <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="founderName" value="<?=$founder->founderName;?>"
            placeholder="Founder Name" required />
    </div>
    <div class="form-group">
        <label class="pt-2 pb-2">Email <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="founderEmail" value="<?=$founder->founderEmail;?>"
            required />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Contact <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" name="founderMobile" value="<?=$founder->founderMobile;?>"
            required />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Gender <span class='text-danger'>(*)</span></label>
        <select class="form-control" name="founderGender">
            <option>Select Gender</option>
            <option value="male" <?php if($founder->founderGender=='male'){echo "selected"; }?>>Male</option>
            <option value="female" <?php if($founder->founderGender=='female'){echo "selected"; }?>>Female
            </option>
        </select>
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Background <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" value="<?=$founder->founderBackground;?>" name="founderBackground"
            required />
    </div>
    <div class=" form-group">
        <label class="pt-2 pb-2">Education <span class='text-danger'>(*)</span></label>
        <input type="text" class="form-control pb-2" value="<?=$founder->founderEducation;?>" name="founderEducation"
            required />
    </div>
    <div class="form-group mt-2 mb-2">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>