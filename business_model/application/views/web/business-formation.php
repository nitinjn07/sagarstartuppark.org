<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>What is your Business Structure?</h4>
        </div>
        <div class="card-body">
            <?php 
               $rs = $this->db->get_where('business_formation',array('uid'=>$_SESSION['uid']));
               if($rs->num_rows()>0)
               {
                   $data = $rs->row();
                   ?>
            <form action="<?=base_url('PhaseOne/BusinessFormation');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Business Entity Type</label>
                        <select name="entity_type" id="" class="form-select">
                            <option value="">Select Business Entity Type</option>
                            <option value="Private_Limited_Company"
                                <?php if($data->entity_type=='Private_Limited_Company'){ echo "selected"; }; ?>>Private
                                Limited
                                Company
                            </option>
                            <option value="Public_Limited_Company"
                                <?php if($data->entity_type=='Public_Limited_Company'){ echo "selected"; }; ?>>Public
                                Limited
                                Company
                            </option>
                            <option value="Partnerships_Firm"
                                <?php if($data->entity_type=='Partnerships_Firm'){ echo "selected"; }; ?>>Partnerships
                                Firm</option>
                            <option value="Limited_Liability_Partnership"
                                <?php if($data->entity_type=='Limited_Liability_Partnership'){ echo "selected"; }; ?>>
                                Limited Liability
                                Partnership (LLP)</option>
                            <option value="One_Person_Company"
                                <?php if($data->entity_type=='One_Person_Company'){ echo "selected"; }; ?>>One Person
                                Company (OPC)</option>
                            <option value="Sole_Proprietorship"
                                <?php if($data->entity_type=='Sole_Proprietorship'){ echo "selected"; }; ?>>Sole
                                Proprietorship</option>
                            <option value="Section_8_Company"
                                <?php if($data->entity_type=='Section_8_Company'){ echo "selected"; }; ?>>
                                Section 8 Company</option>
                            <option value="not_registered"
                                <?php if($data->entity_type=='not_registered'){ echo "selected"; }; ?>>
                                Not Yet Registered</option>
                        </select>
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
            <form action="<?=base_url('PhaseOne/BusinessFormation');?>" method="post" id="form">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Business Entity Type <span class="text-danger">*</span></label>
                        <select name="entity_type" id="" class="form-select">
                            <option value="">Select Business Entity Type</option>
                            <option value="Private_Limited_Company">Private
                                Limited
                                Company
                            </option>
                            <option value="Public_Limited_Company">Public
                                Limited
                                Company
                            </option>
                            <option value="Partnerships_Firm">Partnerships
                                Firm</option>
                            <option value="Limited_Liability_Partnership">
                                Limited Liability
                                Partnership (LLP)</option>
                            <option value="One_Person_Company">One Person
                                Company (OPC)</option>
                            <option value="Sole_Proprietorship">Sole
                                Proprietorship</option>
                            <option value="Section_8_Company">
                                Section 8 Company</option>
                            <option value="not_registered">
                                Not Yet Registered</option>
                        </select>
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
        entity_type: {
            required: true
        }
    }
});
</script>