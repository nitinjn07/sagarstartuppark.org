<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Customer Segment</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('customer_segment',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows())
            {
                $data = $rs->row();
                ?>
            <form action="<?=base_url();?>PhaseOne/CustomerSegment" method="post">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>For whom you are creating values? Describe your target customer </label>
                        <input type="text" class="form-control" name="target_customer"
                            value="<?=$data->target_customer;?>" />
                    </div>
                    <div class="form-group col-md-12">
                        <h4> Total size of your industry?</h4>

                    </div>
                    <div class="form-group col-md-4">
                        <label> Customer Location</label>
                        <input type="text" class="form-control pt-2 pb-2" name="location"
                            placeholder="Customer Location" value="<?=$data->location;?>" />

                    </div>
                    <div class="form-group col-md-4">
                        <label>Customer Age</label>
                        <input type="text" class="form-control pt-2 pb-2" value="<?=$data->age;?>" name="age"
                            placeholder="Customer Age" />

                    </div>
                    <div class="form-group col-md-4">
                        <label> Customer Income/Occupation</label>
                        <input type="text" class="form-control pt-2 pb-2" value="<?=$data->occupation;?>"
                            name="occupation" placeholder="Customer Income/Occupation" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Total size of the industry you are targeting?</label>
                        <textarea class="form-control" name="q1"><?=$data->q1;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Describe your target customer:</label>
                        <textarea class="form-control" name="q2"><?=$data->q2;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How do you plan to get your first customer?</label>
                        <textarea class="form-control" name="q3"><?=$data->q3;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How do you plan to retain them? </label>
                        <textarea class="form-control" name="q4"><?=$data->q4;?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label> Any feedback mechanism from customer? </label>
                        <textarea class="form-control" name="q5"><?=$data->q5;?></textarea>
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
            <form action="<?=base_url();?>PhaseOne/CustomerSegment" method="post" id="form">
                <div class="row">


                    <div class="form-group col-md-12">
                        <label>For whom you are creating values? Describe your target customer <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="target_customer" required />
                    </div>
                    <div class="form-group col-md-12">
                        <h4> Total size of your industry</h4>

                    </div>
                    <div class="form-group col-md-4">
                        <label> Target Customers location (seperated by , ) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control pt-2 pb-2" name="location"
                            placeholder="Customer Location" required />

                    </div>
                    <div class="form-group col-md-4">
                        <label>Customer Age <span class="text-danger">*</span></label>
                        <input type="text" class="form-control pt-2 pb-2" name="age" placeholder="Customer Age"
                            required />

                    </div>
                    <div class="form-group col-md-4">
                        <label> Customer Income/Occupation <span class="text-danger">*</span></label>
                        <input type="text" class="form-control pt-2 pb-2" name="occupation"
                            placeholder="Customer Income/Occupation" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Total size of the industry you are targeting? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q1" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Describe your target customer: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q2" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How do you plan to get your first customer? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q3" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How do you plan to retain them? </label>
                        <textarea class="form-control" name="q4"> </textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label> Any feedback mechanism from customer? </label>
                        <textarea class="form-control" name="q5"> </textarea>
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