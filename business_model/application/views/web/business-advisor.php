<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Who are your key promoters/advisors? </h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('promoters_advisor',array('uid'=>$_SESSION['uid']));
            if($rs->num_rows())
            {
                 $data = $rs->row();
            ?>
            <form action="<?=base_url('PhaseOne/BusinessAdvisor');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Partner/Advisor Name (1)</label>
                        <input type="text" class="form-control" value="<?=$data->name_one;?>" name="name_one" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Role</label>
                        <input type="text" class="form-control" value="<?=$data->role_one;?>" name="role_one" />
                    </div>


                    <div class="form-group col-md-6">
                        <label>Partner/Advisor Name (2)</label>
                        <input type="text" class="form-control" value="<?=$data->name_two;?>" name="name_two" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Role</label>
                        <input type="text" class="form-control" value="<?=$data->role_two;?>" name="role_two" />
                    </div>


                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-success text-white" value="Save & Continue" />
                    </div>
                </div>
            </form>
            <?php
            }
            else 
            {
            ?>
            <form action="<?=base_url('PhaseOne/BusinessAdvisor');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Partner/Advisor Name (1) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="name_one" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Role <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="role_one" />
                    </div>


                    <div class="form-group col-md-6">
                        <label>Partner/Advisor Name (2) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="name_two" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Role <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="role_two" />
                    </div>


                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-success text-white" value="Save & Continue" />
                    </div>
                </div>
            </form>
            <?php
            }
            ?>

        </div>
    </div>


</div>
<?php include('footer.php'); ?>