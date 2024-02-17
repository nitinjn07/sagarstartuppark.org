<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>What is the Contact Information of your Business?</h4>
        </div>
        <div class="card-body">
            <?php 
           $rs = $this->db->get_where('business_contact',array('uid'=>$_SESSION['uid']));
           if($rs->num_rows()>0)
           {
               $data = $rs->row();
            ?>
            <form action="<?=base_url('PhaseOne/ContactInformation');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Telephone Number</label>
                        <input type="text" class="form-control" value="<?=$data->telephone; ?>" name="tel" />
                    </div>
                    <div class="form-group col-md-4">
                        <label> Email Address</label>
                        <input type="email" class="form-control" value="<?=$data->email; ?>" name="email" />
                    </div>

                    <div class="form-group col-md-4">
                        <label> Website</label>
                        <input type="url" class="form-control" value="<?=$data->website; ?>" name="website" />
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-success text-white" value="Save & Continue" />
                    </div>
                </div>
            </form>
            <?php
           }else 
           {
            ?>
            <form action="<?=base_url('PhaseOne/ContactInformation');?>" method="post" id="form">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Mobile Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="tel" required />
                    </div>
                    <div class="form-group col-md-4">
                        <label> Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" required />
                    </div>

                    <div class="form-group col-md-4">
                        <label> Website <span class="text-primary">(optional)</span></label>
                        <input type="url" class="form-control" name="website" />
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
$("#form").validate({
    rules: {
        tel: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        email: {
            required: true,
            email: true
        }
    }
});
</script>