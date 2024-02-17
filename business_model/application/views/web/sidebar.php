<?php 
include('get_report_data.php'); 
$check = '<span class="badge bg-success"><i class="fa fa-check"></i></span>';

?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>dashboard">

                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>startup-profile">

                <span class="menu-title">Startup Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic0" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Business Model
                    <?php 
                    if($t1->num_rows()>0 && $t2->num_rows()>0 && $t3->num_rows()>0 && $t4->num_rows()>0)
                    {
                        echo $check;
                    }
                  ?>
                </span>

            </a>

            <div class="collapse" id="ui-basic0">

                <ul class="nav flex-column sub-menu">
                    <li class="text-white"><i class='fa fa-th'> </i> Startup Details</li>

                    <li class="nav-item"> <a class="nav-link" href="business-information">Business Information
                            <?php if($t1->num_rows()>0) { echo $check; } ?>
                        </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="contact-information">Contact Information
                            <?php if($t2->num_rows()>0) { echo $check; } ?></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="business-formation">Legal Existence
                            <?php if($t3->num_rows()>0) { echo $check; } ?></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="business-operation">Current Stage of Operation
                            <?php if($t4->num_rows()>0) { echo $check; } ?>
                        </a>
                    </li>

                    <li class="text-white"><i class='fa fa-th'> </i> Key Partners & Promoters</li>
                    <li class="nav-item"> <a class="nav-link" href="founders">Founders
                            <?php if($t5->num_rows()>0) { echo $check; } ?></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="business-partner">Partner
                            <?php if($t6->num_rows()>0) { echo $check; } ?></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="business-advisor">Promoters
                            <?php if($t7->num_rows()>0) { echo $check; } ?></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>value-propositions">

                            <span class="menu-title">Value Propositions
                                <?php if($t8->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>customer-segment">

                            <span class="menu-title">Customer Segment
                                <?php if($t9->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>distribution-channel">

                            <span class="menu-title">Distribution Channel
                                <?php if($t10->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>revenue-stream">

                            <span class="menu-title">Revenue Stream
                                <?php if($t11->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>price-strategy">

                            <span class="menu-title">Price / Cost Strategy
                                <?php if($t12->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>competitive-analysis">

                            <span class="menu-title">Competitive Analysis
                                <?php if($t13->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>key-resource">

                            <span class="menu-title">Key Resource
                                <?php if($t14->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url();?>key-activity">

                            <span class="menu-title">Key Activity
                                <?php if($t15->num_rows()>0) { echo $check; } ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php 
               if($t1->num_rows()>0 
               && $t2->num_rows()>0 
               && $t3->num_rows()>0
               && $t4->num_rows()>0
               && $t5->num_rows()>0
               && $t8->num_rows()>0
               && $t9->num_rows()>0
               && $t10->num_rows()>0
               && $t11->num_rows()>0
               && $t12->num_rows()>0
               && $t13->num_rows()>0
               && $t14->num_rows()>0
               && $t15->num_rows()>0)
               {
           ?>
                        <a class="nav-link" href="generate-report" class="btn btn-success">


                            <span class="menu-title">Generate PDF</span>
                        </a>
                        <?php
               }
               else 
               {
             ?>
                        <button class="btn btn-light" disabled>Generate Business Model Canvas</button>
                        <?php
               }
               ?>


                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?=base_url();?>change-password">

                <span class="menu-title">Change Password
                </span>
            </a>
        </li>



    </ul>
</nav>