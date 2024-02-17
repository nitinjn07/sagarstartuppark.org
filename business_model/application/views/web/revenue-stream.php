<?php include('header.php'); ?>
<div class="content-wrapper">

    <div class="card">
        <div class="card-header">
            <h4>Revenue Stream</h4>
            <p>How will you generate income/revenue?</p>
        </div>
        <div class="card-body">
            <?php 
            $rs = $this->db->get_where('revenue_model',array('uid'=>$_SESSION['uid']));

            if($rs->num_rows())
            {
                $data = $rs->row();
               
                
                ?>
            <form action="<?=base_url();?>PhaseOne/RevenueStream" method="post">
                <div class="row p-5">


                    <div class="form-group col-md-12">
                        <label>Select your revenue model and describe the details</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Transactional_Revenue_Model"
                                <?php if($data->model=='Transactional_Revenue_Model'){echo "checked"; }?>>Transactional
                            Revenue Model
                            <p>(Transactional Revenue Model is mainly for businesses that primarily offer a
                                transactional
                                service such as eBay, Kickstarter etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Affiliate_Revenue_Model"
                                <?php if($data->model=='Affiliate_Revenue_Model'){echo "checked"; }?>>Affiliate Revenue
                            Model
                            <p>(It involves an online distribution solution for services/products in exchange for a
                                commission – percentage or fixed amount such as LifeWire, WireCutter etc)</p>


                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Sales_Revenue_Model"
                                <?php if($data->model=='Sales_Revenue_Model'){echo "checked"; }?>>Sales Revenue
                            Model – Online/Offline
                            <p>( It involves your customer or clients buying your products/services – directly,
                                indirectly, or through the web such as Amazon, Buy.com etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Subscription_Based_Revenue_Model"
                                <?php if($data->model=='Subscription_Based_Revenue_Model'){echo "checked"; }?>>Subscription
                            Based
                            Revenue Model
                            <p>(It requires consumers to pay a recurring fee in exchange for your services or products.
                                The subscription could be for a week, month, year, or even a lifetime. Example NetFlix,
                                Medium.com etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Ad_Based_Revenue_Model"
                                <?php if($data->model=='Ad_Based_Revenue_Model'){echo "checked"; }?>>Ad-Based Revenue
                            Model
                            <p>(This is a sub-set of the Affiliate Revenue Model. It requires to display ads of services
                                and products of other companies on website. Example Google, YouTube, Instagram etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Freemium_Revenue_Model"
                                <?php if($data->model=='Freemium_Revenue_Model'){echo "checked"; }?>>Freemium Revenue
                            Model
                            <p>(In this model a basic version of offering is free but the premium version requires a fee
                                such as Jio, LinkedIn etc).</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Hybrid_Revenue_Model"
                                <?php if($data->model=='Hybrid_Revenue_Model'){echo "checked"; }?>>Hybrid Revenue Model
                            / Others



                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Can free users bring you value? </label>
                        <input type="text" class="form-control" name="q1" value="<?=$data->q1;?>" required />

                    </div>

                    <div class="form-group col-md-12">
                        <label>Is your product unique?</label>
                        <input type="text" class="form-control" name="q2" value="<?=$data->q2;?>" required />

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
            <form action="<?=base_url();?>PhaseOne/RevenueStream" method="post" id="form">
                <div class="row p-5">


                    <div class="form-group col-md-12">
                        <label>Select your revenue model and describe the details <span
                                class="text-danger">*</span></label>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Transactional_Revenue_Model" required>Transactional Revenue Model
                            <p>(Transactional Revenue Model is mainly for businesses that primarily offer a
                                transactional
                                service such as eBay, Kickstarter etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Affiliate_Revenue_Model" required>Affiliate Revenue Model
                            <p>(It involves an online distribution solution for services/products in exchange for a
                                commission – percentage or fixed amount such as LifeWire, WireCutter etc)</p>


                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Sales_Revenue_Model" required>Sales Revenue Model – Online/Offline
                            <p>( It involves your customer or clients buying your products/services – directly,
                                indirectly, or through the web such as Amazon, Buy.com etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Subscription_Based_Revenue_Model" required>Subscription Based Revenue Model
                            <p>(It requires consumers to pay a recurring fee in exchange for your services or products.
                                The subscription could be for a week, month, year, or even a lifetime. Example NetFlix,
                                Medium.com etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Ad_Based_Revenue_Model" required>Ad-Based Revenue Model
                            <p>(This is a sub-set of the Affiliate Revenue Model. It requires to display ads of services
                                and products of other companies on website. Example Google, YouTube, Instagram etc)</p>


                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Freemium_Revenue_Model" required>Freemium Revenue Model
                            <p>(In this model a basic version of offering is free but the premium version requires a fee
                                such as Jio, LinkedIn etc).</p>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="revenue"
                                value="Hybrid_Revenue_Model" required>Hybrid Revenue Model / Others
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Can free users bring you value? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q1" required />

                    </div>

                    <div class="form-group col-md-12">
                        <label>Is your product unique? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="q2" required />

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