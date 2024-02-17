<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Key Resources</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('key_resources',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows())
            {
                $data = $rs->row();
                ?>
            <form action="<?=base_url();?>PhaseOne/KeyResource" method="post">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>What types of resources do you require?</label>
                        <input type="text" class="form-control" name="q1" value="<?=$data->q1;?>" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>How many total employees do you need?</label>
                        <textarea class="form-control" name="q2"><?=$data->q2;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Any niche skills you need in your employees?</label>
                        <textarea class="form-control" name="q3"><?=$data->q3;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Do you require a production unit? </label>
                        <textarea class="form-control" name="q4"><?=$data->q4;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Do you require an office space? </label>
                        <textarea class="form-control" name="q5"><?=$data->q5;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What kind of inventory you need to keep in hand? </label>
                        <textarea class="form-control" name="q6"><?=$data->q6;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the average value of inventory? </label>
                        <textarea class="form-control" name="q7"><?=$data->q7;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Have you arranged money to meet this resourcing requirement? </label>
                        <textarea class="form-control" name="q8"><?=$data->q8;?></textarea>
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
            <form action="<?=base_url();?>PhaseOne/KeyResource" method="post" id="form">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>What types of resources do you require? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q1" required />
                    </div>

                    <div class="form-group col-md-6">
                        <label>How many total employees do you need? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q2" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Any niche skills you need in your employees? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q3" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Do you require a production unit? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q4" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Do you require an office space? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q5" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What kind of inventory you need to keep in hand? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q6" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the average value of inventory? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q7" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Have you arranged money to meet this resourcing requirement? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q8" required>
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
<script>
$("#form").validate();
</script>