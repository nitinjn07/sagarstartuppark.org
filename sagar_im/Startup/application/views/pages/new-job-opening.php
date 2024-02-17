<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        New Job opening
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>JobOpening/AddNewJob" method="post"
                                    enctype="multipart/form-data" id="partner_reg">
                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">Startup <span class="text-danger">(*)</span></label>
                                            <select class="form-control" name="startupid" readonly>

                                                <?php
                                                  $startup = $this->db->get_where('startup',array('delstatus'=>1,'is_screened'=>1,'is_graduate'=>0,'email'=>$_SESSION['username']))->result(); 
                                                  foreach($startup as $s)
                                                  {
                                                 ?>
                                                <option value="<?=$s->id;?>"
                                                    <?php if($_SESSION['username']==$s->email){echo "selected";}?>>
                                                    <?=$s->startup_name;?></option>
                                                <?php
                                                  }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Job Title <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="job_title"
                                                placeholder="Job Title" required />
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Job Location <span
                                                    class="text-danger">(*)</span></label>
                                            <select name="job_location" class="form-control" required>
                                                <option value="">Select Job Location</option>
                                                <option value="WFH">Work From Home</option>
                                                <option value="Spark">Spark Incubation Centre</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2 "> Job Type <span class="text-danger">(*)</span></label>
                                            <select name="job_type" class="form-control" required>
                                                <option>Select Job Type</option>
                                                <option value="certified_internship">Certified Internship ( Without Pay)</option>
                                                <option value="Internship">Paid Internship</option>
                                                <option value="Full_Time">Full Time</option>
                                                <option value="Part_Time">Part Time</option>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="row mb-3 mt-3">
                                        <div class="col">
                                            <label class="pt-2 ">Number of Openings <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="number" name="no_of_openings" min="1" max="10"
                                                class="form-control" required />
                                        </div>

                                        <div class="col">
                                            <label class="pt-2 ">Job Role <span class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="job_role"
                                                placeholder="Job Role" required />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Job Summary <span class="text-danger">(*)</span></label>
                                            <textarea class="form-control" name="short_desc" required></textarea>
                                        </div>
                                        <div class="col">
                                            <label class="pt-2">Job Description <span
                                                    class="text-danger">(*)</span></label>
                                            <textarea class="form-control" name="long_desc" required></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="pt-2">Essential Education <span
                                                    class="text-danger">(*)</span></label>
                                            <input type="text" class="form-control" name="essential_education"
                                                placeholder="BSc.,MBA,B.Com etc.." required />
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
                                                class="form-control" required />
                                        </div>
                                        <div class="col">
                                            <label>#2</label>
                                            <input type="text" name="required_skill_2" placeholder="Skill #2"
                                                class="form-control" required />
                                        </div>
                                        <div class="col">
                                            <label>#3</label>
                                            <input type="text" name="required_skill_3" placeholder="Skill #3"
                                                class="form-control" />
                                        </div>
                                        <div class="col">
                                            <label>#4</label>
                                            <input type="text" name="required_skill_4" placeholder="Skill #4"
                                                class="form-control" />
                                        </div>
                                        <div class="col">
                                            <label>#5</label>
                                            <input type="text" name="required_skill_5" placeholder="Skill #5"
                                                class="form-control" />
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <label class="pt-2 ">Stipend or Salary Range in INR/Month <span
                                                    class="text-danger">(*)</span></label>

                                            <div class="col-md-12"><label class="price">0</label>
                                                Rs</div>

                                            <input type="range" class="custom-range" min="0" max="100000" step="1"
                                                id="customRange3" name="min_max_salary" style="width: 100%">
                                        </div>


                                        <div class="col d-grid">
                                            <input type="submit" class="btn btn-primary mt-4 btn-block"
                                                value="List Job" />
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
            document.getElementById("customRange3").value=0;
            $('#customRange3').on('input', function() {
                v = $('#customRange3').val();
                $('label.price').text(v);
            });
        });
        </script>