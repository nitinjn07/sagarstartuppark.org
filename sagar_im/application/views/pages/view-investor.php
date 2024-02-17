<?php 
  $i = $this->db->get_where('investor',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>Company Name</td>
                <td><?=$i->compay_name;?></td>
            </tr>
            <tr>
                <td>Type of Investor</td>
                <td><?=$i->type_of_invester;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?=$i->email;?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?=$i->mobile;?></td>
            </tr>
            <tr>
                <td>Linkedin</td>
                <td><a href="<?=$i->linkedin_url;?>" target="_blank"><?=$i->linkedin_url;?></a></td>
            </tr>
            <tr>
                <td>State/City</td>
                <td><?=$i->state."/".$i->city;?></td>
            </tr>

        </table>
    </div>

</div>