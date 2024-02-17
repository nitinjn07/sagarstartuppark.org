<?php 
  $m = $this->db->get_where('partner',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>Logo</td>
                <td>
                    <img src="<?=base_url('uploads/logo/').$m->user_pic_url;?>" />
                </td>
            </tr>
            <tr>
                <td>Firm Name</td>
                <td><?=$m->firm_name;?></td>
            </tr>
            <tr>
                <td>Summary</td>
                <td><?=$m->summary;?></td>
            </tr>
            <tr>
                <td>Type of Firm</td>
                <td><?=$m->type_of_firm;?></td>
            </tr>

            <tr>
                <td>Name</td>
                <td><?=$m->name;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$m->email;?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?=$m->address;?></td>
            </tr>
            <tr>
                <td>State / City</td>
                <td><?=$m->state;?> / <?=$m->city;?></td>
            </tr>
            <tr>
                <td>Zip Code</td>
                <td><?=$m->zipcode;?></td>
            </tr>
            <tr>
                <td>LinkedIn</td>
                <td><a href="<?=$m->linkedin_url;?>" target="_blank"><?=$m->linkedin_url;?></a></td>
            </tr>


        </table>
    </div>

</div>