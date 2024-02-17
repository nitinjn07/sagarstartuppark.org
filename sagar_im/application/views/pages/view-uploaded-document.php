<?php 
  $ud = $this->db->get_where('startupupload',array('id'=>$param))->row();
?>
<table class="table table-bordered">
    <tr>
        <td>Registartion Number</td>
        <td><?=$ud->reg_no;?></td>
    </tr>
    <tr>
        <td>Elector Pitch</td>
        <td><?=$ud->elector_pitch;?></td>
    </tr>
    <tr>
        <td>Legal Registration</td>
        <td><?=$ud->legal_reg;?></td>
    </tr>
    <tr>
        <td>DPIIT Number</td>
        <td><?=$ud->dpiit_number;?></td>
    </tr>

    <tr>
        <td>COI Document</td>
        <td><a href="<?=base_url().$ud->coi_files;?>">Open</a></td>
    </tr>
    <tr>
        <td>PAN Card</td>
        <td><a href="<?=base_url().$ud->pan_files;?>">Open</a></td>
    </tr>
    <tr>
        <td>DPIIT Certificate</td>
        <td><a href="<?=base_url().$ud->dpiit_files;?>">Open</a></td>
    </tr>
    <tr>
        <td>MSME Certificate</td>
        <td><a href="<?=base_url().$ud->msme_files;?>">Open</a></td>
    </tr>
    <tr>
        <td>Incubation Aggreement</td>
        <td><a href="<?=base_url().$ud->incubation_files;?>">Open</a></td>
    </tr>
</table>