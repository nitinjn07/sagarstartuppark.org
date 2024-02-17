<?php 
  $team = $this->db->get_where('team_member',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td><img src="<?=base_url('../uploads/team/').$team->profile; ?>" width="50px" /></td>
                <td></td>
            </tr>
            <tr>
                <td> Name</td>
                <td><?=$team->name;?></td>
            </tr>
            <tr>
                <td> Email</td>
                <td><?=$team->email;?></td>
            </tr>
            <tr>
                <td> Contact</td>
                <td><?=$team->contact;?></td>
            </tr>
            <tr>
                <td> Is Intern</td>
                <td><?php if($team->intern==1){ echo "Yes"; }else { echo "No"; } ?>
                </td>
            </tr>
            <tr>
                <td> Is Partime Employee</td>
                <td><?php if($team->part_time==1){ echo "Yes"; } else { echo "No"; } ?>
                </td>
            </tr>

            <tr>
                <td> Designation</td>
                <td><?=$team->role;?></td>
            </tr>

        </table>
    </div>

</div>