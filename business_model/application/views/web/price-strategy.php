<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Pricing Strategy</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('pricing_strategy',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows())
            {
                $data = $rs->row();
                ?>
            <form action="<?=base_url();?>PhaseOne/PriceStrategy" method="post">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>What is the pricing strategy of your competitors?</label>
                        <input type="text" class="form-control" name="q1" value="<?=$data->q1;?>" />
                    </div>

                    <div class="form-group col-md-6">
                        <label> What are the most important costs for your startups? (seperated by ,) </label>
                        <textarea class="form-control" name="q2"><?=$data->q2;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Is your product unique?</label>
                        <textarea class="form-control" name="q3"><?=$data->q3;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How are you deciding the price of your offering? </label>
                        <textarea class="form-control" name="q4"><?=$data->q4;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the direct cost per sale? </label>
                        <textarea class="form-control" name="q5"><?=$data->q5;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the indirect cost per sale? </label>
                        <textarea class="form-control" name="q6"><?=$data->q6;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Desired profit margin per sale? </label>
                        <textarea class="form-control" name="q7"><?=$data->q7;?></textarea>
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
            <form action="<?=base_url();?>PhaseOne/PriceStrategy" method="post" id="form">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>What is the pricing strategy of your competitors? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q1" required />
                    </div>

                    <div class="form-group col-md-6">
                        <label> What are the most important costs for your startups? (seperated by ,) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q2" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Is your product unique? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q3" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How are you deciding the price of your offering? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q4" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the direct cost per sale? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q5" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the indirect cost per sale? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q6" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Desired profit margin per sale? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q7" required>
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