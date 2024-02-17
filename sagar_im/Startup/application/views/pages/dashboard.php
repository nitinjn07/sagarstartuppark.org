<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <main class="content bg-dark">
        <div class="container-fluid">


            <div class="header">
                <div class="row">


                    <div class="col-12 p-0">
                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">


                        </div>
                    </div>
                    <div class="row">

                        <h3 class="text-center text-white">Startup Stages</h3>
                        <?php
                           $email = $_SESSION['username'];
                           $upgrade = $this->db->get_where('startup',array('email'=>$email))->row();
                           if($upgrade)
                           { 
                        ?>

                        <div class="col-12 p-0">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title="" data-content="mb-1 text-white"
                                        data-original-title="2003">
                                        <div
                                            class="inner-circle <?php if($upgrade->im_stage=='concept_ideation'){ echo "bg-success"; } else if($upgrade->stage =='concept_ideation'){ echo "bg-warning"; } ?>">
                                        </div>

                                        <p class="h6 text-white mb-0 mb-lg-0">
                                            <?php if($upgrade->im_stage=='concept_ideation'){ ?>
                                            <i class="fa fa-flag fa-2x text-success"></i><br />
                                            <?php } else if($upgrade->stage =='concept_ideation'){ ?>
                                            <i class="fa fa-flag fa-2x text-warning"></i><br />
                                            <?php } ?>
                                            Concept Ideation<br />
                                        </p>
                                    </div>
                                </div>

                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title="" data-content="mb-1 text-white"
                                        data-original-title="2004">
                                        <div
                                            class="inner-circle <?php if($upgrade->im_stage=='customer_discovery'){ echo "bg-success"; }  else if($upgrade->stage =='customer_discovery'){ echo "bg-warning"; }  ?>">
                                        </div>

                                        <p class="h6 text-white mb-0 mb-lg-0">
                                            <?php if($upgrade->im_stage=='customer_discovery'){ ?>
                                            <i class="fa fa-flag fa-2x text-success"></i><br />
                                            <?php } ?>
                                            Customer Discovery
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title="" data-content="mb-1 text-white"
                                        data-original-title="2005">
                                        <div
                                            class="inner-circle <?php if($upgrade->im_stage=='idea_validation'){ echo "bg-success"; }  else if($upgrade->stage =='idea_validation'){ echo "bg-warning"; }  ?>">
                                        </div>

                                        <p class="h6 text-white mb-0 mb-lg-0">
                                            <?php if($upgrade->im_stage=='idea_validation'){ ?>
                                            <i class="fa fa-flag fa-2x text-success"></i><br />
                                            <?php } ?>
                                            Idea Validation
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title="" data-content="mb-1 text-white"
                                        data-original-title="2010">
                                        <div
                                            class="inner-circle <?php if($upgrade->im_stage=='minimum_viable_product'){ echo "bg-success"; }  else if($upgrade->stage =='minimum_viable_product'){ echo "bg-warning"; }  ?>">
                                        </div>

                                        <p class="h6 text-white mb-0 mb-lg-0">
                                            <?php if($upgrade->im_stage=='minimum_viable_product'){ ?>
                                            <i class="fa fa-flag fa-2x text-success"></i><br />
                                            <?php } ?>
                                            Minimum Viable Product
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-step mb-0">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title="" data-content="mb-1 text-white"
                                        data-original-title="2020">
                                        <div
                                            class="inner-circle <?php if($upgrade->im_stage=='product_market_fit'){ echo "bg-success"; }  else if($upgrade->stage =='product_market_fit'){ echo "bg-warning"; }  ?>">
                                        </div>

                                        <p class="h6 text-white mb-0 mb-lg-0">
                                            <?php if($upgrade->im_stage=='product_market_fit'){ ?>
                                            <i class="fa fa-flag fa-2x text-success"></i><br />
                                            <?php } ?>
                                            Product Market Fit
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-step mb-0">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title="" data-content="mb-1 text-white"
                                        data-original-title="2020">
                                        <div
                                            class="inner-circle <?php if($upgrade->im_stage=='growth_establishment_and_scale_up'){ echo "bg-success"; }  else if($upgrade->stage =='growth_establishment_and_scale_up'){ echo "bg-warning"; }  ?>">
                                        </div>

                                        <p class="h6 text-white mb-0 mb-lg-0">
                                            <?php if($upgrade->im_stage=='growth_establishment_and_scale_up'){ ?>
                                            <i class="fa fa-flag fa-2x text-success"></i><br />
                                            <?php } ?>
                                            Growth Establishment and Scale Up
                                        </p>
                                    </div>
                                </div>
                                <div class="timeline-step mb-0">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" title="" data-content="mb-1 text-white"
                                        data-original-title="2020">
                                        <div
                                            class="inner-circle <?php if($upgrade->im_stage=='maturity_and_possible_exit'){ echo "bg-success"; }  else if($upgrade->stage =='maturity_and_possible_exit'){ echo "bg-warning"; }  ?>">
                                        </div>

                                        <p class="h6 text-white mb-0 mb-lg-0">
                                            <?php if($upgrade->im_stage=='maturity_and_possible_exit'){ ?>
                                            <i class="fa fa-flag fa-2x text-success"></i><br />
                                            <?php } ?>
                                            Maturity and Possible Exit
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                           }
                        ?>
                    </div>
                    <div class="container-fluid bg-white">



                        <div class="row">
                            <!-- <div class="col-xl-12 col-xxl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Sales Forecast Vs Actual Sales (Monthly)-<?=date('Y');?>
                                        </h5>

                                    </div>
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="chBar" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!--<div class="col-xl-12 col-xxl-12">-->
                            <!--    <div class="card">-->
                            <!--        <div class="card-header">-->
                            <!--            <h5 class="card-title">Burn Forecast Vs Actual Burn (Monthly) - <?=date('Y');?>-->
                            <!--            </h5>-->

                            <!--        </div>-->
                            <!--        <div class="card-body">-->
                            <!--            <div class="chart">-->
                            <!--                <canvas id="chBar2" height="100"></canvas>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->


                        </div>

                        <div class="row">
                            <div class="col-12 col-md-12 col-xxl-12 d-flex order-1 order-xxl-1">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="card-actions float-end">
                                            <a href="#" class="me-1">
                                                <i class="align-middle" data-feather="refresh-cw"></i>
                                            </a>
                                            <div class="d-inline-block dropdown show">
                                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                                    <i class="align-middle" data-feather="more-vertical"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title mb-0">Calendar</h5>
                                    </div>
                                    <div class="card-body d-flex">
                                        <div class="align-self-center w-100">
                                            <div class="chart">
                                                <div id="datetimepicker-dashboard"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Burn Rate (<?=date('Y');?>)</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                                            <i class="align-middle" data-feather="truck"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="display-5 mt-1 mb-3">
                                                <?php 
                                                           $burn_rate=$this->db->get_where('burn_rate',array('year'=>date('Y'),'startup_id'=>$startup->id,'status'=>1))->result();
                                                           $burn = 0;
                                                           foreach($burn_rate as $br)
                                                           {
                                                                $burn += $br->burn_rate;
                                                           }
                                                           echo "₹ ".@number_format($burn);
                                                        ?>
                                            </h1>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">CAC (<?=date('Y');?>)</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                                            <i class="align-middle" data-feather="users"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="display-5 mt-1 mb-3"><?php 
                                                           $cac=$this->db->get_where('cac',array('year'=>date('Y'),'startup_id'=>$startup->id))->row();
                                                          if($cac)
                                                          {
                                                            echo "₹ ".number_format($cac->cac)."/-";
                                                          }
                                                          else {
                                                            echo "0";
                                                          }
                                                        ?></h1>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Gross Revenue (<?=date('Y');?>)</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                                            <i class="align-middle" data-feather="dollar-sign"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="display-5 mt-1 mb-3">
                                                <?php 
                                                           $gross_revenue=$this->db->order_by('id','desc')->get_where('gross_revenue',array('startup_id'=>$startup->id,'status'=>1,'year'=>date('Y')))->result();
                                                           if($gross_revenue)
                                                           {
                                                               $revenue = 0;
                                                               foreach($gross_revenue as $gr)
                                                               {
                                                                    $revenue +=$gr->gross;
                                                                    
                                                               }
                                                               echo "₹ ".number_format(round(@$revenue))."/-";
                                                           }
                                                           else 
                                                           {
                                                            echo "0";
                                                           }
                                                        ?>
                                            </h1>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mt-0">
                                                    <h5 class="card-title">Gross Profit
                                                        (<?=date('Y');?>)</h5>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="avatar">
                                                        <div class="avatar-title rounded-circle bg-primary-dark">
                                                            <i class="align-middle" data-feather="shopping-cart"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h1 class="display-5 mt-1 mb-3">
                                                <?php 
                                                           $gross_profit=$this->db->order_by('id','desc')->get_where('gross_profit',array('startup_id'=>$startup->id,'status'=>1,'year'=>date('Y')))->result();
                                                           if($gross_profit)
                                                           {
                                                               $revenue = 0;
                                                               foreach($gross_profit as $gf)
                                                               {
                                                                    $revenue +=$gf->gross_profit;
                                                                    
                                                               }
                                                               echo "₹ ".number_format(round(@$revenue))."/-";
                                                           }
                                                           else 
                                                           {
                                                            echo "0";
                                                           }
                                                        ?>
                                            </h1>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>






                </div>

            </div>

        </div>
    </main>

    <?=include('common/footer.php');?>