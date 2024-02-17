<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Who are the Founder's and Co-Founder's ?</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('founders',array('uid'=>$_SESSION['uid']));
            if($rs->num_rows())
            {
                 $data = $rs->row();
            ?>
            <form action="<?=base_url('PhaseOne/Founders');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Founder's Name</label>
                        <input type="text" class="form-control" value="<?=$data->founder_name;?>" name="founder_name" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Founder's Background</label>
                        <input type="text" class="form-control" value="<?=$data->founder_background;?>"
                            name="founder_background" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Co-Founder's Name (1)</label>
                        <input type="text" class="form-control" name="co_name_one" value="<?=$data->co_name_one;?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Co-Founder's Background (1)</label>
                        <input type="text" class="form-control" name="co_background_one"
                            value="<?=$data->co_background_one;?>" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Co-Founder's Name (2)</label>
                        <input type="text" class="form-control" name="co_name_two" value="<?=$data->co_name_two;?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Co-Founder's Background (2)</label>
                        <input type="text" class="form-control" name="co_background_two"
                            value="<?=$data->co_background_two;?>" />
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
            <form action="<?=base_url('PhaseOne/Founders');?>" method="post" id="form">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Founder's Name <span class="text-danger"> * </span></label>
                        <input type="text" class="form-control" name="founder_name" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Founder's Background <span class="text-danger"> * </span></label>
                        <input type="text" class="form-control" name="founder_background" required />
                    </div>


                    <div class="form-group col-md-6">
                        <label>Co-Founder's Name (1) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="co_name_one" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Co-Founder's Background (1) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="co_background_one" />
                    </div>

                    <div class="form-group col-md-6">
                        <label>Co-Founder's Name (2) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="co_name_two" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Co-Founder's Background (2) <span class="text-primary"> (optional) </span></label>
                        <input type="text" class="form-control" name="co_background_two" />
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