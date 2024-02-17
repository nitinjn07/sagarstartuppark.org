<?php 
  $j = $this->db->get_where('application_form',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">

            <tr class="text-center">
                <td colspan="2">
                    <h3><?=$j->Name;?></h3>
                </td>

            </tr>
            <tr>
                <td>Email</td>
                <td><?=$j->Email;?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?=$j->Mobile;?></td>
            </tr>
            <tr>
                <td>State/City</td>
                <td><?=$j->State;?> / <?=$j->City;?></td>
            </tr>
            <tr>
                <td>Startup/Company Name</td>
                <td><?php
                                              $sid = $this->db->limit(1)->get_where('job_listing',array('id'=>$j->jobid))->row();
                                              $sname = $this->db->get_where('startup',array('id'=>$sid->startupid))->row();
                                              echo $sname->startup_name;
                                            ?></td>
            </tr>
            <tr>
                <td>Last Company Name</td>
                <td><?=$j->Last_Company_Name;?></td>
            </tr>
            <tr>
                <td>Higher Qualification</td>
                <td><?=$j->Higher_Qualification;?></td>
            </tr>
            <tr>
                <td>Current CTC</td>
                <td><?=$j->Current_CTC;?></td>
            </tr>
            <tr>
                <td>Apply For</td>
                <td><?=$j->applyfor;?></td>
            </tr>



        </table>
    </div>

</div>