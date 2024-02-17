<?php 
  $mvp = $this->db->get_where('mvp',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>Name</td>
                <td><?=$mvp->name;?></td>
            </tr>
            <tr>
                <td>Short Description</td>
                <td><?=$mvp->short_desc;?></td>
            </tr>
            <tr>
                <td>MVP Test Start Date</td>
                <td><?=$mvp->mvp_test_start_date;?></td>
            </tr>
            <tr>
                <td>MVP Test End Date</td>
                <td><?=$mvp->mvp_test_end_date;?></td>
            </tr>
        </table>
    </div>

</div>