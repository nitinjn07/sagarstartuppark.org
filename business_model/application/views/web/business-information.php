<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>What is the Name and Address of your Business?</h4>
        </div>
        <div class="card-body">
            <?php 
              $rs = $this->db->get_where('basic_information',array('uid'=>$_SESSION['uid']));

              if($rs->num_rows()>0)
              {
                  $data = $rs->row();
            ?>

            <form action="<?=base_url('PhaseOne/BasicInforamtion');?>" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Business Name</label>
                        <input type="text" class="form-control" value="<?=$data->business_name; ?>" name="bname" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Address</label>
                        <input type="text" class="form-control" value="<?=$data->address; ?>" name="address" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> City</label>
                        <input type="text" class="form-control" value="<?=$data->city; ?>" name="city" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> State</label>
                        <select name="state" class="form-select">
                            <option value="">Select State</option>
                            <?php
                              $state = $this->db->get('state_list')->result(); 
                              foreach($state as $st)
                              {
                            ?>
                            <option value="<?= $st->state; ?>" <?php if($st->state==$data->state){echo "selected"; } ?>>
                                <?= $st->state; ?></option>
                            <?php
                              }
                            ?>


                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Zip Code</label>
                        <input type="text" class="form-control" value="<?=$data->zip_code; ?>" name="zipcode" />
                    </div>
                    <div class="form-group col-md-3">
                        <label> Business Establishement(Month)</label>
                        <select class="form-select" name="est_month">

                            <option value=''>--Select Month--</option>
                            <option selected value='Janaury' <?php if($data->est_month=='Janaury'){echo "selected";}?>>
                                Janaury</option>
                            <option value='February' <?php if($data->est_month=='February'){echo "selected";}?>>February
                            </option>
                            <option value='March' <?php if($data->est_month=='March'){echo "selected";}?>>March
                            </option>
                            <option value='April' <?php if($data->est_month=='April'){echo "selected";}?>>April
                            </option>
                            <option value='May' <?php if($data->est_month=='May'){echo "selected";}?>>May</option>
                            <option value='June' <?php if($data->est_month=='June'){echo "selected";}?>>June</option>
                            <option value='July' <?php if($data->est_month=='July'){echo "selected";}?>>July</option>
                            <option value='August' <?php if($data->est_month=='August'){echo "selected";}?>>August
                            </option>
                            <option value='September' <?php if($data->est_month=='September'){echo "selected";}?>>
                                September</option>
                            <option value='October' <?php if($data->est_month=='October'){echo "selected";}?>>October
                            </option>
                            <option value='November' <?php if($data->est_month=='November'){echo "selected";}?>>November
                            </option>
                            <option value='December' <?php if($data->est_month=='December'){echo "selected";}?>>December
                            </option>
                        </select>

                    </div>
                    <div class="form-group col-lg-3">
                        <label> Business Establishement(Year)</label>
                        <input type="text" class="form-control" name="est_year" value="<?=$data->est_year;?>" />

                    </div>
                    <div class="form-group col-lg-12">
                        <label>Elevator Pitch </label>
                        <textarea class="form-control" name="pitch"><?=$data->pitch;?></textarea>

                    </div>
                    <div class="form-group col-lg-12">
                        <label>Mission Statement</label>
                        <textarea class="form-control" name="mission_stm"><?=$data->mission_stm;?></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Short Term Goal ( 6 Month to 1 Year )</label>
                        <textarea class="form-control" name="short_goal"><?=$data->short_goal;?></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Long Term Goal ( 5 Year Plan )</label>
                        <textarea class="form-control" name="long_goal"><?=$data->long_goal;?></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Type of Marketplance</label>
                        <select name="market_place" class="form-select">
                            <option value="">Select Market Plance</option>
                            <option value="B2B" <?php if($data->est_month=='B2B'){echo "selected";}?>>B2B (Business to
                                Business)</option>
                            <option value="B2C" <?php if($data->est_month=='B2C'){echo "selected";}?>>B2C (Business to
                                Consumer)</option>
                            <option value="B2G" <?php if($data->est_month=='B2G'){echo "selected";}?>>B2G (Business to
                                Government)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-success text-white" value="Update" />
                    </div>
                </div>
            </form>

            <?php 
                 
              }
              else 
              {
            ?>
            <form action="<?=base_url('PhaseOne/BasicInforamtion');?>" method="post" id="form">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Business Name <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" value="" name="bname" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Address </label>
                        <input type="text" class="form-control" name="address" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> City <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="city" required />
                    </div>
                    <div class="form-group col-md-6">

                        <label> State <span class="text-danger"> *</span></label>
                        <select name="state" class="form-select" required>
                            <option value="">Select State</option>
                            <?php
                              $state = $this->db->get('state_list')->result(); 
                              foreach($state as $st)
                              {
                            ?>
                            <option value="<?= $st->state; ?>">
                                <?= $st->state; ?>
                            </option>
                            <?php
                              }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Zip Code</label>
                        <input type="text" class="form-control" name="zipcode" />
                    </div>
                    <div class="form-group col-md-3">
                        <label> Business Establishement(Month)</label>
                        <select class="form-select" name="est_month">

                            <option value=''>--Select Month--</option>
                            <option selected value='Janaury'>Janaury</option>
                            <option value='February'>February</option>
                            <option value='March'>March</option>
                            <option value='April'>April</option>
                            <option value='May'>May</option>
                            <option value='June'>June</option>
                            <option value='July'>July</option>
                            <option value='August'>August</option>
                            <option value='September'>September</option>
                            <option value='October'>October</option>
                            <option value='November'>November</option>
                            <option value='December'>December</option>
                        </select>

                    </div>
                    <div class="form-group col-lg-3">
                        <label> Business Establishement(Year) <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="est_year" required />

                    </div>
                    <div class="form-group col-lg-12">
                        <label>Elevator Pitch <span class="text-danger"> *</span></label>
                        <textarea class="form-control" name="pitch" required></textarea>

                    </div>
                    <div class="form-group col-lg-12">
                        <label>Mission Statement</label>
                        <textarea class="form-control" name="mission_stm">
                        </textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Short Term Goal ( 6 Month to 1 Year )</label>
                        <textarea class="form-control" name="short_goal">
                        </textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Long Term Goal ( 5 Year Plan )</label>
                        <textarea class="form-control" name="long_goal">
                        </textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Type of Marketplance</label>
                        <select name="market_place" class="form-select" required>
                            <option value="">Select Market Plance</option>
                            <option value="B2B">B2B (Business to Business)</option>
                            <option value="B2C">B2C (Business to Consumer)</option>
                            <option value="B2G">B2G (Business to Government)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-success text-white" value="Save" />
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
        est_year: {
            required: true,
            number: true,
            minlength: 4,
            maxlength: 4
        },
        pitch: {
            required: true
        }
    }
});
</script>