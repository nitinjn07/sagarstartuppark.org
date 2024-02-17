<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Key Activity</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('key_activity',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows())
            {
                $data = $rs->row();
                ?>
            <form action="<?=base_url();?>PhaseOne/KeyActivity" method="post">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>What are the activities you perform everyday to create value (product/service)?</label>
                        <input type="text" class="form-control" name="q1" value="<?=$data->q1;?>" />
                    </div>

                    <div class="form-group col-md-12">
                        <label>What are the activities you perform everyday to delivery value (product/service)?</label>
                        <textarea class="form-control" name="q2"><?=$data->q2;?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Write down 5 most important activities you will do in next three months to create/deliver
                            value? </label>
                        <textarea class="form-control" name="q3"><?=$data->q3;?></textarea>
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
            <form action="<?=base_url();?>PhaseOne/KeyActivity" method="post" id="form">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>What are the activities you perform everyday to create value (product/service)? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q1" required />
                    </div>

                    <div class="form-group col-md-12">
                        <label>What are the activities you perform everyday to delivery value (product/service)? <span
                                class="text-danger">*</span></label>
                        <input type="text" class=" form-control" name="q2" required />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Write down 5 most important activities you will do in next three months to create/deliver
                            value? <span class="text-danger">*</span></label>
                        <input type="text" class=" form-control" name="q3" required />
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