<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Find the Co-Founder
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Looking for a co-founder for your startup? We are here to help </h3>
                            </div>
                            <div class="card-body">
                                <form action="<?=base_url(); ?>CoFounderSearch/RequestForCoFounder" method="post">
                                    <div class="form-group" id="cofounder">
                                        <label for="" class="py-2">Your startup idea in two lines <span>*</span></label>
                                        <textarea name="startup_idea" maxlength="200" class="form-control"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Why you need a co-founder? <span>*</span></label>
                                        <textarea name="why_need" maxlength="200" class="form-control"
                                            required></textarea>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="" class="py-2">What Skill Set you looking for in Co-founder?
                                            <span>*</span></label>

                                        <input type="checkbox" name="skills_looking[]" class="a" value="Sales" />
                                        <b>Sales</b>
                                        <input type="checkbox" name="skills_looking[]" class="a"
                                            value="Product_Development" />
                                        <b>Product Development</b>
                                        <input type="checkbox" name="skills_looking[]" class="a" value="Marketing" />
                                        <b>Marketing</b>
                                        <input type="checkbox" name="skills_looking[]" class="a" value="Technology" />
                                        <b>Technology</b>
                                        <input type="checkbox" name="skills_looking[]" class="a"
                                            value="Business_Development" />
                                        <b>Business Development</b>
                                        <input type="checkbox" name="skills_looking[]" class="a"
                                            value="Business_Management" />
                                        <b>Business Management</b>

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">What skill set you and other founders have already ?
                                            <span>*</span></label>
                                        <input type="checkbox" name="skills_founder[]" class="b" value="Sales" />
                                        <b>Sales</b>
                                        <input type="checkbox" name="skills_founder[]" class="b"
                                            value="Product_Development" />
                                        <b>Product Development</b>
                                        <input type="checkbox" name="skills_founder[]" class="b" value="Marketing" />
                                        <b>Marketing</b>
                                        <input type="checkbox" name="skills_founder[]" class="b" value="Technology" />
                                        <b>Technology</b>
                                        <input type="checkbox" name="skills_founder[]" class="b"
                                            value="Business_Development" />
                                        <b>Business Development</b>
                                        <input type="checkbox" name="skills_founder[]" class="b"
                                            value="Business_Management" />
                                        <b>Business Management</b>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Why should someone partner with you in your
                                            startup?<span>*</span></label>
                                        <textarea name="why_partner" maxlength="200" class="form-control"
                                            required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">How many hours in a week you expect the co-founder to
                                            contribute?<span>*</span></label>
                                        <input type="number" name="working_hours" class="form-control" required />
                                    </div>
                                    <div class="form-group py-2">
                                        <input type="submit" class="btn btn-primary" value="Submit Request" />
                                    </div>
                                </form>

                            </div>

                            <!-- <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 my-5 text-center">
                                        <h3>Co-Founder Request Status</h3>
                                    </div>
                                    <?php
                                    $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row(); 
                                    $req = $this->db->get_where('co-founder',array('startup_id'=>$startup->id))->result();
                                    foreach($req as $r)
                                    {
                                   ?>
                                    <div class="col-md-4 text-white">
                                        <div class="card bg-warning">
                                            <div class="card-header">
                                                <?=$r->why_need;?>
                                            </div>
                                            <div class="card-body">
                                                <h5>Request Skills</h5>
                                                <p><?=$r->skills_looking;?></p>
                                                <h5>Skills in Founder</h5>
                                                <p><?=$r->skills_founder;?></p>
                                                <h5>Working Hours</h5>
                                                <p><?=$r->working_hours;?></p>

                                                <p class="badge bg-dark">Status : <?=$r->request_status;?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    }
                                  ?>
                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>