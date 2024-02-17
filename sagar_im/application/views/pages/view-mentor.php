<?php 
  $m = $this->db->get_where('mentor',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td>Mentor Name</td>
                <td><?=$m->name;?></td>
            </tr>
            <tr>
                <td>Summary</td>
                <td><?=$m->summary;?></td>
            </tr>
            <tr>
                <td>Experience</td>
                <td><?=$m->no_of_mentor_year;?></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><?=$m->email;?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?=$m->mobile;?></td>
            </tr>
            <tr>
                <td>Linkedin</td>
                <td><a href="<?=$m->linkedin_url;?>" target="_blank"><?=$m->linkedin_url;?></a></td>
            </tr>
            <tr>
                <td>State/City</td>
                <td><?=$m->state."/".$m->city;?></td>
            </tr>

        </table>
    </div>

</div>