<?php 
  $j = $this->db->get_where('job_listing',array('id'=>$param))->row();
?>
<div class="row">
    <div class="col-md-12">
        <table class="table">

            <tr class="text-center">
                <td colspan="2">
                    <h3><?=$j->job_title;?></h3>
                </td>

            </tr>

            <tr>
                <td>Job Type</td>
                <td><?=$j->job_type;?></td>
            </tr>
            <tr>
                <td>No of Openings</td>
                <td><?=$j->no_of_openings;?></td>
            </tr>
            <tr>
                <td>Startup/Company Name</td>
                <td><?php
                                              $sname = $this->db->get_where('startup',array('id'=>$j->startupid))->row();
                                              echo $sname->startup_name;
                                            ?></td>
            </tr>
            <tr>
                <td>Job Role</td>
                <td><?=$j->job_role;?></td>
            </tr>
            <tr>
                <td>Short Description</td>
                <td><?=$j->short_description;?></td>
            </tr>
            <tr>
                <td>Long Description</td>
                <td><?=$j->long_description;?></td>
            </tr>
            <tr>
                <td>Salary Range(in INR)</td>
                <td>Up to <label class="price"><?= ($j->min_max_salary != '') ? $j->min_max_salary : $j->min_max_salary; ?></label> Lakh</td>
            </tr>
            <tr>
                <td>Essential Education</td>
                <td><?=$j->essential_education;?></td>
            </tr>
            <tr>
                <td>Required Skills</td>
                <td><?=$j->skill_required_1;?>,<?=$j->skill_required_2;?>
                    <?php
                    if($j->skill_required_3!="")
                    {
                        echo ",".$j->skill_required_3;
                    } 
                    if($j->skill_required_4!="")
                    {
                        echo ",".$j->skill_required_4;
                    } 
                    if($j->skill_required_4!="")
                    {
                        echo ",".$j->skill_required_4;
                    } 
                  ?>
                </td>
            </tr>


        </table>
    </div>

</div>