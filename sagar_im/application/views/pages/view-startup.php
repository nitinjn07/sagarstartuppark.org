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
                <td>Elevator Pitch</td>
                <td><?= substr($startup->pitch,0,150)."...";?></td>
            </tr>
            <tr>
                <td>Email / Phone</td>
                <td><?= $startup->email;?> / <?= $startup->mobile;?></td>
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
                <td><?= strtoupper(str_replace("_"," ",$startup->stage));?></td>
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
                <td>Founded In</td>
                <td><?=$startup->founded_month."/".$startup->founded_year;?></td>
            </tr>
            <tr>
                <td>On Boarding Date</td>
                <td><?php
                if($startup->on_board_date)
                {
                echo date("d-m-Y", strtotime($startup->on_board_date));
                }
                else 
                {
                    echo "Not Updated";
                }
                ?></td>
            </tr>
            <tr>
                <td>Tentative Gradudation Date</td>
                <td><?php 
                  $st=$this->db->get_where('onboard_seat',array('startupid'=>$startup->id))->row();
                  if(@$st->graduate_date)
                  {
                    echo date("d-m-Y", strtotime(@$st->graduate_date));
                  }
                  else 
                  {
                    echo "Not Updated";
                  }
                ?></td>
            </tr>

            <tr>
                <td>No of Seats Allocated</td>
                <td><?php  
                 
                  $seat = $this->db->get_where('onboard_seat',array('startupid'=>$startup->id))->row();
                  echo str_replace("|",",",@$seat->seat_no);
                ?></td>
            </tr>
            <tr>
                <td>DPIIT Number</td>
                <td><?= 
                   $startup->dpiit;
                ?></td>
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