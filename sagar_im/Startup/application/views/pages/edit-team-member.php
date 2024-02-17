<?php 
  $team = $this->db->get_where('team_member',array('id'=>$param))->row();
  $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
?>
<form action="<?= base_url();?>Team/updateTeam?editid=<?=$team->id;?>&&startupid=<?=$team->startup_id;
;?>" enctype="multipart/form-data" method="post">

    <div class="form-group mt-2 mb-2">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="<?=$team->name;?>" />
    </div>
    <div class="form-group mt-2 mb-2">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?=$team->email;?>" />
    </div>
    <div class="form-group mt-2 mb-2">
        <label>Contact</label>
        <input type="text" class="form-control" name="contact" value="<?=$team->contact;?>" />
    </div>
    <div class="form-group mt-2 mb-4">
        <label>Seat Number <span class="text-danger">*</span></label>
        <select class="form-control" name="seatno">
            <option value="">Select Seat Number</option>
            <?php
                                             $seat = $this->db->get_where('onboard_seat',array('startupid'=>$startup->id))->row(); 
                                             $seats = explode("|",$seat->seat_no);
                                             foreach($seats as $s)
                                             {
                                             ?>
            <option value="<?=$s;?>" <?php if($team->seat_no==$s){echo "selected";}?>><?=$s;?></option>
            <?php
                                             }
                                            ?>
        </select>
    </div>
    <div class="form-group mt-2 mb-2">
        <label>Intern</label>
        <label><input type="radio" name="intern" value="1" <?php if($team->intern==1){ echo "checked"; }; ?> />
            Yes</label>
        <label><input type="radio" name="intern" value="0" <?php if($team->intern==0){ echo "checked"; }; ?> />
            No</label>

    </div>
    <div class="form-group mt-2 mb-2">
        <label>Part Time</label>
        <label><input type="radio" name="parttime" value="1" <?php if($team->part_time==1){ echo "checked"; }; ?> />
            Yes</label>
        <label><input type="radio" name="parttime" value="0" <?php if($team->part_time==1){ echo "checked"; }; ?> />
            No</label>

    </div>
    <div class="form-group mt-2 mb-2">
        <label>Role</label>
        <input type="text" name="role" class="form-control" value="<?=$team->role;?>" />
    </div>
    <div class="form-group mt-2 mb-2">
        <img src="<?=base_url('../uploads/team/').$team->profile; ?>" width="50px" />
        <label> Profile Photo </label>
        <input type="file" name="profile" />
    </div>
    <div class=" form-group mt-2 mb-2">
        <input type="submit" class="btn btn-primary" value="Update Team">
    </div>
</form>