<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Competitive Analysis</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('competitive_analysis',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows()>0)
            {
                $data = $rs->row();
                ?>
            <form action="<?=base_url();?>PhaseOne/CompetitiveAnalysis" method="post">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>List down your top three competitors -</label>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Competitor -1</label>
                        <input type="text" class="form-control" name="com1" value="<?=$data->com1;?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Competitor -2</label>
                        <input type="text" class="form-control" name="com2" value="<?=$data->com2;?>" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Competitor -3</label>
                        <input type="text" class="form-control" name="com3" value="<?=$data->com3;?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> How you are different from these three?</label>
                        <textarea class="form-control" name="q1"><?=$data->q1;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Do you have a cost advantage? </label>
                        <textarea class="form-control" name="q2"><?=$data->q2;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Do you have a technology or user experience advantage?</label>
                        <textarea class="form-control" name="q3"><?=$data->q3;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Why will customer will choose your product over your competitors? </label>
                        <textarea class="form-control" name="q4"><?=$data->q4;?></textarea>
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
            <form action="<?=base_url();?>PhaseOne/CompetitiveAnalysis" method="post" id="form">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>List down your top three competitors -</label>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Competitor -1 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="com1" required />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Competitor -2</label>
                        <input type="text" class="form-control" name="com2" />
                    </div>
                    <div class="form-group col-md-4">
                        <label>Competitor -3</label>
                        <input type="text" class="form-control" name="com3" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> How you are different from these three? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q1" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Do you have a cost advantage? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q2" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Do you have a technology or user experience advantage? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q3" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Why will customer will choose your product over your competitors? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q4" required>
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