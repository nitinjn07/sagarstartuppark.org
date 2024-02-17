<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Team Member
                    </h1>
                </div>`
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <?php 
  $startup = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
?>
                                <form action="<?= base_url();?>Team/addTeam" enctype="multipart/form-data"
                                    method="post">

                                    <div class="form-group mt-2 mb-2">
                                        <label>MemberID</label>
                                        <input type="text" class="form-control mt-2" name="startup_id" value="<?php 
                              $sid = $this->db->Query('select * from team_member');                                    
                              
                              $total = $sid->num_rows();
                              $total +=1;
                              echo "TM-".$total."/".$startup->id;
                            ?>" readonly />

                                        <input type="hidden" name="startupid" value="<?=$startup->id;?>" />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Contact <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="contact" required />
                                    </div>
                                    <div class="form-group mt-2 mb-4">
                                        <label>Seat Number <span class="text-danger">*</span></label>
                                        <select class="form-control" name="seatno" required>
                                            <option value="">Select Seat Number</option>
                                            <?php
                                             $seat = $this->db->get_where('onboard_seat',array('startupid'=>$startup->id))->row(); 
                                             $seats = explode("|",$seat->seat_no);
                                             foreach($seats as $s)
                                             {
                                             ?>
                                            <option value="<?=$s;?>"><?=$s;?></option>
                                            <?php
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Intern <span class="text-danger">*</span></label>
                                        <label><input type="radio" name="intern" value="1" required /> Yes</label>
                                        <label><input type="radio" name="intern" value="0" required /> No</label>

                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Part Time <span class="text-danger">*</span></label>
                                        <label><input type="radio" name="parttime" value="1" required /> Yes</label>
                                        <label><input type="radio" name="parttime" value="0" required /> No</label>

                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Role <span class="text-danger">*</span></label>
                                        <input type="text" name="role" class="form-control" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label> Profile Photo <span class="text-danger">*</span></label>
                                        <input type="file" name="profile" />
                                    </div>
                                    <div class=" form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Add Team">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>