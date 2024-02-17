<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>What is the primary Industry of your Business?</h4>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('value_propositions',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows())
            {
                $data = $rs->row();
                ?>
            <form action="<?=base_url();?>PhaseOne/ValuePropositions" method="post" id="form">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>What Industry do you server?</label>
                        <select class="form-select" name="industry">
                            <option value="">Select Industry</option>
                            <option value="Aerospace" <?php if($data->industry=='Aerospace'){echo "selected";}?>>
                                Aerospace Industry</option>
                            <option value="Transport" <?php if($data->industry=='Transport'){echo "selected";}?>>
                                Transport Industry</option>
                            <option value="Computer" <?php if($data->industry=='Computer'){echo "selected";}?>>Computer
                                Industry</option>
                            <option value="Telecommunication"
                                <?php if($data->industry=='Telecommunication'){echo "selected";}?>>Telecommunication
                                industry</option>
                            <option value="Agriculture" <?php if($data->industry=='Agriculture'){echo "selected";}?>>
                                Agriculture industry</option>
                            <option value="Construction" <?php if($data->industry=='Construction'){echo "selected";}?>>
                                Construction Industry</option>
                            <option value="Education" <?php if($data->industry=='Education'){echo "selected";}?>>
                                Education Industry</option>
                            <option value="Pharmaceutical"
                                <?php if($data->industry=='Pharmaceutical'){echo "selected";}?>>Pharmaceutical Industry
                            </option>
                            <option value="Food" <?php if($data->industry=='Food'){echo "selected";}?>>Food Industry
                            </option>
                            <option value="Health" <?php if($data->industry=='Health'){echo "selected";}?>>Health care
                                Industry</option>
                            <option value="Hospitality" <?php if($data->industry=='Hospitality'){echo "selected";}?>>
                                Hospitality Industry</option>
                            <option value="Entertainment"
                                <?php if($data->industry=='Entertainment'){echo "selected";}?>>Entertainment Industry
                            </option>
                            <option value="News" <?php if($data->industry=='News'){echo "selected";}?>>News Media
                                Industry</option>
                            <option value="Energy" <?php if($data->industry=='Energy'){echo "selected";}?>>Energy
                                Industry</option>
                            <option value="Manufacturing"
                                <?php if($data->industry=='Manufacturing'){echo "selected";}?>>Manufacturing Industry
                            </option>
                            <option value="Music" <?php if($data->industry=='Music'){echo "selected";}?>>Music Industry
                            </option>
                            <option value="Other" <?php if($data->industry=='Other'){echo "selected";}?>>Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Do you offer a product/service or both?</label>
                        <br />
                        <label><input type="radio" name="offer" value="product"
                                <?php if($data->offer=='product'){echo "checked"; }?> /> Product</label>
                        <label><input type="radio" name="offer" value="service"
                                <?php if($data->offer=='service'){echo "checked"; }?> /> Service</label>
                        <label><input type="radio" name="offer" value="other"
                                <?php if($data->offer=='other'){echo "checked"; }?> /> Other</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Name of Product/Service/Other </label>
                        <input type="text" class="form-control" name="name" value="<?=$data->name;?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Description Product/Service/Other </label>
                        <textarea class="form-control" name="description"><?=$data->description;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Which of your customer’s problems are you helping to solve? </label>
                        <textarea class="form-control" name="q1"><?=$data->q1;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Is it a problem or a need? </label>
                        <textarea class="form-control" name="q2"><?=$data->q2;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the value you deliver to your customer? </label>
                        <textarea class="form-control" name="q3"><?=$data->q3;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is your promise to your customers? </label>
                        <textarea class="form-control" name="q4"><?=$data->q4;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How do you make your product/service? </label>
                        <textarea class="form-control" name="q5"><?=$data->q5;?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Any proprietary feature that gives your offering competitive advantage</label>
                        <textarea class="form-control" name="q6"><?=$data->q6;?></textarea>
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
            <form action="<?=base_url();?>PhaseOne/ValuePropositions" method="post" id="form">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>What Industry do you server? <span class="text-danger">*</span></label>
                        <select class="form-select" name="industry" required>
                            <option value="">Select Industry</option>
                            <option value="Aerospace">Aerospace Industry</option>
                            <option value="Transport">Transport Industry</option>
                            <option value="Computer">Computer Industry</option>
                            <option value="Telecommunication">Telecommunication industry</option>
                            <option value="Agriculture">Agriculture industry</option>
                            <option value="Construction">Construction Industry</option>
                            <option value="Education">Education Industry</option>
                            <option value="Pharmaceutical">Pharmaceutical Industry</option>
                            <option value="Food">Food Industry</option>
                            <option value="Health">Health care Industry</option>
                            <option value="Hospitality">Hospitality Industry</option>
                            <option value="Entertainment">Entertainment Industry</option>
                            <option value="News">News Media Industry</option>
                            <option value="Energy">Energy Industry</option>
                            <option value="Manufacturing">Manufacturing Industry</option>
                            <option value="Music">Music Industry</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Do you offer a product/service or both? <span class="text-danger">*</span></label>
                        <br />
                        <label><input type="radio" name="offer" value="product" required /> Product</label>
                        <label><input type="radio" name="offer" value="service" required /> Service</label>
                        <label><input type="radio" name="offer" value="other" required /> Other</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Name of Product/Service/Other <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Description Product/Service/Other <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="description" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Which of your customer’s problems are you helping to solve? </label>
                        <textarea class="form-control" name="q1"> </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Is it a problem or a need? </label>
                        <textarea class="form-control" name="q2"> </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is the value you deliver to your customer? </label>
                        <textarea class="form-control" name="q3"> </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> What is your promise to your customers? </label>
                        <textarea class="form-control" name="q4"> </textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label> How do you make your product/service? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q5" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Any proprietary feature that gives your offering competitive advantage <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q6" required>
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
        description: {
            required: true
        },
        q1: {
            required: true
        },
        q5: {
            required: true
        },
        q6: {
            required: true
        }

    }
});
</script>