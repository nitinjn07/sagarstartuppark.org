<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Current Stage of Operations</h4>
        </div>
        <div class="card-body">
            <?php 
             $rs = $this->db->get_where('business_operation',array('uid'=>$_SESSION['uid']));
             if($rs->num_rows()>0)
             {
                  $data = $rs->row();
                 ?>
            <form action="<?=base_url();?>PhaseOne/BusinessOperation" method="post">
                <div class="row">

                    <div class="form-group col-md-4">
                        <select name="state_of_opt" id="" class="form-select">
                            <option value="">Select Stage</option>
                            <option value="concept_ideation"
                                <?php if($data->state_of_opt=='concept_ideation'){ echo "selected"; } ?>>
                                Concept/Ideation
                            </option>
                            <option value="customer_discovery"
                                <?php if($data->state_of_opt=='customer_discovery'){ echo "selected"; } ?>>Customer
                                Discovery </option>
                            <option value="idea_validation"
                                <?php if($data->state_of_opt=='idea_validation'){ echo "selected"; } ?>>Idea
                                Validation</option>
                            <option value="minim_viable_product"
                                <?php if($data->state_of_opt=='minim_viable_product'){ echo "selected"; } ?>>Minimum
                                Viable
                                Product (MVP)</option>
                            <option value="product_market_fit"
                                <?php if($data->state_of_opt=='product_market_fit'){ echo "selected"; } ?>>Product
                                Market
                                Fit (PMF)</option>
                            <option value="growth_establishment"
                                <?php if($data->state_of_opt=='growth_establishment'){ echo "selected"; } ?>>Growth
                                Establishment / Scale Up</option>
                            <option value="maturity_ipo"
                                <?php if($data->state_of_opt=='maturity_ipo'){ echo "selected"; } ?>>Maturity / IPO
                            </option>
                            <option value="not_sure" <?php if($data->state_of_opt=='not_sure'){ echo "selected"; } ?>>
                                Not Sure
                            </option>

                        </select>
                    </div>

                    <div class=" form-group col-md-12">
                        <input type="submit" class="btn btn-success text-white" value="Save & Continue" />
                    </div>
                </div>
            </form>
            <?php
                 
             }
             else 
             {
                 ?>
            <form action="<?=base_url();?>PhaseOne/BusinessOperation" method="post" id="form">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label>Select Stage <span class="text-danger">*</span></label>
                        <select name="state_of_opt" id="" class="form-select">
                            <option value="">Select Stage </option>
                            <option value="concept_ideation">Concept/Ideation</option>
                            <option value="customer_discovery">Customer Discovery </option>
                            <option value="idea_validation">Idea Validation</option>
                            <option value="minim_viable_product">Minimum Viable Product (MVP)</option>
                            <option value="product_market_fit">Product Market Fit (PMF)</option>
                            <option value="growth_establishment">Growth Establishment / Scale Up</option>
                            <option value="maturity_ipo">Maturity / IPO</option>
                            <option value="not_sure">Not Sure</option>

                        </select>
                    </div>

                    <div class=" form-group col-md-12">
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
$(document).ready(function() {

    $('.formation').click(function() {
        var a = $(this).val();
        if (a == 1) {
            $('#formation_date').css('display', 'block');
        } else {
            $('#formation_date').css('display', 'none');
        }
    })

});
</script>
<script>
$("#form").validate({
    rules: {
        state_of_opt: {
            required: true
        }
    }
});
</script>