<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Mentor Connect
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?=base_url();?>MentorConnect/connectMeeting" method="post">

                                    <div class="row">

                                        <div class="col-md-5">

                                            <div class="form-group mb-2 mt-2">
                                                <label>Startup ID</label>
                                                <input type="text" name="startupid" class="form-control"
                                                    value="<?=$_SESSION['step_one']['startupid'];?>" readonly />
                                            </div>
                                            <div class="form-group mb-2 mt-2">
                                                <label>Industry</label>
                                                <input type="text" name="industry" class="form-control"
                                                    value="<?=$_SESSION['step_one']['industry'];?>" readonly />
                                            </div>
                                            <div class="form-group mb-2 mt-2">
                                                <label>Mentor</label>
                                                <?php
                                                  $mentor = $this->db->get_where('mentor',array('id'=>$_SESSION['step_one']['mentorid']))->row(); 
                                                ?>
                                                <input type="text" name="mentor" class="form-control"
                                                    value="<?=$mentor->name;?>" readonly />
                                                <input type="hidden" name="mentorid" value="<?=$mentor->id;?>" />
                                            </div>

                                            <div class="form-group mb-2 mt-2">
                                                <label>Select Meeting Date</label>
                                                <input type="text" id="datepicker" class="form-control"
                                                    name="meeting_date" required />
                                            </div>
                                            <div class="form-group">
                                                <label> Start Time </label>
                                                <input type="time" class="form-control" name="meeting_start" required>
                                            </div>
                                            <div class="form-group">
                                                <label> End Time </label>
                                                <input type="time" class="form-control" name="meeting_end" required>
                                            </div>
                                            <div class="form-group">
                                                <label> Purpose</label>
                                                <textarea class="form-control" name="meeting_purpose"
                                                    required></textarea>
                                            </div>
                                            <div class="form-group mt-2 mb-2">
                                                <input type="submit" class="btn btn-primary" value="Submit Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('common/footer.php');?>