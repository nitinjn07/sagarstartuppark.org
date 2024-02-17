<?php 
  $t = $this->db->get_where('team_member',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>Profile Photo</td>
                <td>
                    <img src="<?=base_url('uploads/team/').$t->profile;?>" width="100px" />
                </td>
            </tr>
            <tr>
                <td>Member Name</td>
                <td><?=$t->name;?></td>
            </tr>
            <tr>
                <td>Email ID</td>
                <td><?=$t->email;?></td>
            </tr>
            <tr>
                <td>Contact Number</td>
                <td><?=$t->contact;?></td>
            </tr>

            <tr>
                <td>Startup Name</td>
                <td>
                    <?php
                    $n= $this->db->get_where('startup',array('id'=>$t->startup_id))->row();
                    echo $n->startup_name; 
                    ?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$t->email;?></td>
            </tr>
            <tr>
                <td>Job Type</td>
                <td>
                    <?php if($t->intern==1){ echo "Internship /"; };?>
                    <?php if($t->part_time==1){ echo "Part Time"; };?>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td><?=$t->role;?></td>
            </tr>
            <tr>
                <td>Seat No</td>
                <td><?=$t->seat_no;?></td>
            </tr>
            <tr>
                <td>Registration Date</td>
                <td><?=$t->reg_date;?></td>
            </tr>



        </table>
    </div>

</div>