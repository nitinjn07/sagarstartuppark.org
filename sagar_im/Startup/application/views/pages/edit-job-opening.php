<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Update Job opening
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">


                                <form action="<?=base_url();?>JobOpening/UpdateJobOpening" method="post"
                                    enctype="multipart/form-data" id="partner_reg">
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 "> Job Title <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="job_title"
                                                placeholder="Job Title" value="<?=$job->job_title;?>" />
                                            <input type="hidden" name="id" value="<?=$job->id;?>" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Job Location <span
                                                    class="text-danger">(*)</span></label>
                                            <select name="job_location" class="form-control" required>
                                                <option value="">Select Job Location</option>
                                                <option value="WFH"
                                                    <?php if($job->job_location=='WFH'){echo "selected";}?>>Work From
                                                    Home</option>
                                                <option value="Spark"
                                                    <?php if($job->job_location=='Spark'){echo "selected";}?>>Spark
                                                    Incubation Centre</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Job Type <span class="text-danger">(*)</span></label>
                                            <select name="job_type" class="form-control" required>
                                                <option>Select Job Type</option>
                                                 <option value="certified_internship"  <?php if($job->job_type=='certified_internship'){echo "selected"; }?>>Certified Internship ( Without Pay)</option>
                                                <option value="Internship"
                                                    <?php if($job->job_type=='Internship'){echo "selected"; }?>>
                                                    Internship</option>
                                                <option value="Full Time"
                                                    <?php if($job->job_type=='Full Time'){echo "selected"; }?>>Full Time
                                                </option>
                                                <option value="Part Time"
                                                    <?php if($job->job_type=='Part Time'){echo "selected"; }?>>Part Time
                                                </option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">Number of Openings <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" name="no_of_openings" min="1" max="10"
                                                class="form-control" value="<?=$job->no_of_openings;?>" />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Startup <span class="text-danger">(*)</span></label>
                                            <select class="form-control" name="startupid" readonly>
                                                <option value="">Select One</option>
                                                <?php
                                                  $startup = $this->db->get_where('startup',array('delstatus'=>1,'is_screened'=>1,'is_graduate'=>0,'email'=>$_SESSION['username']))->result(); 
                                                  foreach($startup as $s)
                                                  {
                                                 ?>
                                                <option value="<?=$s->id;?>" selected><?=$s->startup_name;?></option>
                                                <?php
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 ">Job Role <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="job_role"
                                                placeholder="Job Role" value="<?=$job->job_role;?>" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Short Description <span
                                                    class="text-danger">(*)</span></label>
                                            <textarea class="form-control"
                                                name="short_desc"><?=$job->short_description;?></textarea>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2">Long Description <span
                                                    class="text-danger">(*)</span></label>
                                            <textarea class="form-control"
                                                name="long_desc"><?=$job->long_description;?></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Essential Education <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="essential_education"
                                                placeholder="BSc.,MBA,B.Com etc.."
                                                value="<?=$job->essential_education;?>" />
                                        </div>

                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            Required Skills
                                        </div>
                                    </div>
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label>#1</label>
                                            <input type="text" name="required_skill_1" placeholder="Skill #1"
                                                class="form-control" value="<?=$job->skill_required_1;?>" />
                                        </div>
                                        <div class="col">
                                            <label>#2</label>
                                            <input type="text" name="required_skill_2" placeholder="Skill #2"
                                                class="form-control" value="<?=$job->skill_required_2;?>" />
                                        </div>
                                        <div class="col">
                                            <label>#2</label>
                                            <input type="text" name="required_skill_3" placeholder="Skill #3"
                                                class="form-control" value="<?=$job->skill_required_3;?>" />
                                        </div>
                                        <div class="col">
                                            <label>#3</label>
                                            <input type="text" name="required_skill_4" placeholder="Skill #4"
                                                class="form-control" value="<?=$job->skill_required_4;?>" />
                                        </div>
                                        <div class="col">
                                            <label>#4</label>
                                            <input type="text" name="required_skill_5" placeholder="Skill #5"
                                                class="form-control" value="<?=$job->skill_required_5;?>" />
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <label class="pt-2 ">Stipend or Salary Range in INR <span
                                                    class="text-danger">(*)</span></label>
                                                    
                                            <div class="col-md-12">Up to <label class="price"><?= ($job->min_max_salary != '') ? $job->min_max_salary : $job->min_max_salary; ?></label> Lakh</div>

                                            <input type="range" class="custom-range" min="1" max="100" step="1" id="customRange3" name="min_max_salary" value="<?= $job->min_max_salary; ?>" style="width: 100%">
                                        </div>

                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block"
                                                value="Update Listing" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>

<script>
    $(document).ready(function() {
        $('#customRange3').on('input', function(){
             v = $('#customRange3').val();
             $('label.price').text(v);
        });
    });
</script>