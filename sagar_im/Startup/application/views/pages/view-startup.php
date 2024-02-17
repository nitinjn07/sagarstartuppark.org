<?php 
  $startup = $this->db->get_where('startup',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>Startup Name</td>
                <td><?=$startup->startup_name;?></td>
            </tr>
            <tr>
                <td>Product & Services</td>
                <td><?=$startup->product_service_summary;?></td>
            </tr>
            <tr>
                <td>Startup Type</td>
                <td><?=$startup->startup_type;?></td>
            </tr>
            <tr>
                <td>Stage</td>
                <td><?=$startup->stage;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$startup->email;?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><?=$startup->city."/".$startup->state;?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?=$startup->mobile;?></td>
            </tr>
            <tr>
                <td>Founded In</td>
                <td><?=$startup->founded_month."/".$startup->founded_year;?></td>
            </tr>
            <tr>
                <td>Screening Status</td>
                <td><?php if($startup->is_screened==0){echo "<span class='bg-danger text-white p-2'>Not Done</span>"; }else { echo "<span class='bg-success text-white p-2'>Done</span>"; };?>
                </td>
            </tr>
            <tr>
                <td>Is Graduated</td>
                <td><?php if($startup->is_graduate==0) {echo "<span class='bg-danger text-white p-2'>No</span>"; } else { echo "<span class='bg-success text-white p-2'>Yes: -Graduation Date:".$startup->graduate_date."</span>"; };?>
                </td>
            </tr>
        </table>
    </div>

</div>