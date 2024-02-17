<?php 
  $connect = $this->db->get_where('mentor_connect',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Meeting Details</h2>
        <form action="<?=base_url();?>MeetingRequest/MeetingReject" method="post">
            <div class="form-group mb-2 mt-2">
                <label>Meeting ID</label>
                <input type="text" class="form-control" name="meeting_id" value="<?=$connect->id; ?>" readonly />
            </div>
            <div class="form-group mb-2 mt-2">
                <label>Remark</label>
                <input type="text" class="form-control" name="remark" />
            </div>


            <div class="form-group mb-2 mt-2">
                <input type="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>

</div>