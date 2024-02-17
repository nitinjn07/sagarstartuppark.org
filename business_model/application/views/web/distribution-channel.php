<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Distribution Channel</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('distribution_channel',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows())
            {
                $data = $rs->row();
                $method = explode(",",$data->distribution_method);
                
                ?>
            <form action="<?=base_url();?>PhaseOne/DistributionChannel" method="post">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>How does your value proposition reach your customer? </label>
                        <input type="text" class="form-control" name="q1" value="<?=$data->q1;?>" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>How will you/do you market your product/service:</label>
                        <textarea class="form-control" name="q2"><?=$data->q2;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>What methods of distribution will you use to sell your products and/or services?</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Retail"
                                <?php if(in_array("Retail",$method)){echo "checked"; }?> /> Retail</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Direct_Sales"
                                <?php if(in_array("Direct_Sales",$method)){echo "checked"; }?> /> Direct Sales</label>
                        <label for=""><input type="checkbox" name="dm[]" value="E_Commerce"
                                <?php if(in_array("E_Commerce",$method)){echo "checked"; }?> /> E-Commerce</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Wholesale"
                                <?php if(in_array("Wholesale",$method)){echo "checked"; }?> /> Wholesale</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Inside_Sales_Force"
                                <?php if(in_array("Inside_Sales_Force",$method)){echo "checked"; }?> /> Inside Sales
                            Force</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Outside_Sales_Representatives"
                                <?php if(in_array("Outside_Sales_Representatives",$method)){echo "checked"; }?> />
                            Outside Sales
                            Representatives</label>
                        <label for=""><input type="checkbox" name="dm[]" value="OEM"
                                <?php if(in_array("OEM",$method)){echo "checked"; }?> /> OEM</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Where can your customer use or buy your products or services?</label>
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
            <form action="<?=base_url();?>PhaseOne/DistributionChannel" method="post" id="form">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>How does your value proposition reach your customer? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q1" required />
                    </div>

                    <div class="form-group col-md-6">
                        <label>How will you/do you market your product/service:</label>
                        <textarea class="form-control" name="q2"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>What methods of distribution will you use to sell your products and/or services?</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Retail" /> Retail</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Direct_Sales" /> Direct Sales</label>
                        <label for=""><input type="checkbox" name="dm[]" value="E_Commerce" /> E-Commerce</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Wholesale" /> Wholesale</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Inside_Sales_Force" /> Inside Sales
                            Force</label>
                        <label for=""><input type="checkbox" name="dm[]" value="Outside_Sales_Representatives" />
                            Outside Sales
                            Representatives</label>
                        <label for=""><input type="checkbox" name="dm[]" value="OEM" /> OEM</label>
                        <label for=""><input type="checkbox" name="dm[]" value="OTHER" /> OTHER</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Where can your customer use or buy your products or services? <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q3" required>
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