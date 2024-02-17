<?php 
  $team = $this->db->get_where('team_member',array('id'=>$param))->row();
  
?>
<form action="<?= base_url();?>Team/updateTeam?startupid=<?=$team->startup_id;?>&&editid=<?=$team->id;?>"
    enctype="multipart/form-data" method="post">

    <div class="form-group">
        <label>Select Startup</label>
        <select name="startupid" id="startupid1" class="form-control">
            <option value="">Select Startup</option>
            <?php
                                              $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1))->result(); 
                                              foreach($startup as $s)
                                              {
                                            ?>
            <option value="<?=$s->id;?>" <?php if($team->startup_id==$s->id){ echo "selected"; }?>>
                <?=$s->startup_name;?>
            </option>
            <?php 
                                              }
                                              ?>
        </select>
    </div>
    <div class="form-group mt-2 mb-2">
        <label>Select Seat No</label>
        <select id="seatno1" name="seatno" class="form-control" required>

            <option value="<?=$team->seat_no;?>" selected><?=$team->seat_no;?></option>


        </select>

    </div>
    <div class="form-group mt-2 mb-2">
        <label>Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="name" value="<?=$team->name;?>" required />
    </div>
    <div class="form-group mt-2 mb-2">
        <label>Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" name="email" required value="<?=$team->email;?>" />
    </div>
    <div class="form-group mt-2 mb-2">
        <label>Contact <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="contact" required value="<?=$team->contact;?>" />
    </div>
    <div class="form-group mt-2 mb-2">
        <label>Intern <span class="text-danger">*</span></label>
        <label><input type="radio" name="intern" value="1" required <?php if($team->intern==1){echo "checked"; }?> />
            Yes</label>
        <label><input type="radio" name="intern" value="0" required <?php if($team->intern==0){echo "checked"; }?> />
            No</label>

    </div>
    <div class="form-group mt-2 mb-2">
        <label>Part Time <span class="text-danger">*</span></label>
        <label><input type="radio" name="parttime" value="1" required
                <?php if($team->part_time==1){echo "checked"; }?> /> Yes</label>
        <label><input type="radio" name="parttime" value="0" required
                <?php if($team->part_time==0){echo "checked"; }?> /> No</label>

    </div>
    <div class="form-group mt-2 mb-2">
        <label>Role <span class="text-danger">*</span></label>
        <input type="text" name="role" class="form-control" value="<?=$team->role;?>" required />
    </div>
    <div class="form-group mt-2 mb-2">
        <img src="<?=base_url('uploads/team/').$team->profile; ?>" width="50px" height="50px" />
        <label> Profile Photo <span class="text-danger">*</span></label>
        <input type="file" name="profile" />
    </div>
    <div class=" form-group mt-2 mb-2">
        <input type="submit" class="btn btn-primary" value="Update Member">
    </div>
</form>

<script>
$('#startupid1').on('change', function() {

    var id = $('#startupid1').val();


    $.ajax({
        type: "GET",
        url: '<?=base_url();?>Team/getSeatEdit',
        data: {
            'id': id
        },
        success: function(data) {
            $('#seatno1').html(data);
        }
    });

});

$("#startupid1").val(<?=$team->startup_id;?>).trigger('change');
</script>