<?php 
  $m = $this->db->get_where('screning_committe',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>Name</td>
                <td><?=$m->name;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$m->email;?></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><?=$m->contact;?></td>
            </tr>

            <tr>
                <td>Designation</td>
                <td><?=$m->designation;?></td>
            </tr>


        </table>
    </div>

</div>