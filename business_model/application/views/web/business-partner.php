<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Who are your most important partners?</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('business_partner',array('uid'=>$_SESSION['uid']));
            if($rs->num_rows())
            {
                 $data = $rs->row();
            ?>
            <form action="<?=base_url('PhaseOne/BusinessPartner');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Partner Name (1)</label>
                        <input type="text" class="form-control" value="<?=$data->name_one;?>" name="name_one" />
                    </div>
                    <div class="form-group col-md-4">
                        <label> Why that partner is important?</label>
                        <input type="text" class="form-control" value="<?=$data->importance_one;?>"
                            name="importance_one" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>What activity that partner performs for your business?</label>
                        <input type="text" class="form-control" name="activity_one" value="<?=$data->activity_one;?>" />
                    </div>

                    <div class="form-group col-md-4">
                        <label>Partner Name (2)</label>
                        <input type="text" class="form-control" value="<?=$data->name_two;?>" name="name_two" />
                    </div>
                    <div class="form-group col-md-4">
                        <label> Why that partner is important?</label>
                        <input type="text" class="form-control" value="<?=$data->importance_two;?>"
                            name="importance_two" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>What activity that partner performs for your business?</label>
                        <input type="text" class="form-control" name="activity_two" value="<?=$data->activity_two;?>" />
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
            <form action="<?=base_url('PhaseOne/BusinessPartner');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Partner Name (1) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="name_one" />
                    </div>
                    <div class="form-group col-md-4">
                        <label> Why that partner is important? <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="importance_one" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>What activity that partner performs for your business? <span class="text-primary">
                                (optional) </span></label>
                        <input type="text" class="form-control" name="activity_one" />
                    </div>

                    <div class="form-group col-md-4">
                        <label>Partner Name (2) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="name_two" />
                    </div>
                    <div class="form-group col-md-4">
                        <label> Why that partner is important? <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="importance_two" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>What activity that partner performs for your business? <span class="text-primary">
                                (optional) </span></label>
                        <input type="text" class="form-control" name="activity_two" />
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