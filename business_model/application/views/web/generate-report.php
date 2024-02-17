<?php include('header.php'); ?>
<style>
#page {
    width: 100%;
    height: 2480px;
    padding: 20px;
}
</style>
<div class="content-wrapper">

    <?php 
include('get_report_data.php');
if($t1->num_rows()>0 
&& $t2->num_rows()>0 
&& $t3->num_rows()>0
&& $t4->num_rows()>0
&& $t5->num_rows()>0
&& $t6->num_rows()>0
&& $t7->num_rows()>0
&& $t8->num_rows()>0
&& $t9->num_rows()>0
&& $t10->num_rows()>0
&& $t11->num_rows()>0
&& $t12->num_rows()>0
&& $t13->num_rows()>0
&& $t14->num_rows()>0
&& $t15->num_rows()>0)
{
    $d1 = $t1->row();
    $d2  = $t2->row();
    $d3 = $t3->row();
    $d4 = $t4->row();
    $d5 = $t5->row();
    $d6 = $t6->row();
    $d7 = $t7->row();
    $d8 = $t8->row();
    $d9 = $t9->row();
    $d10 = $t10->row();
    $d11 = $t11->row();
    $d12 = $t12->row();
    $d13 = $t13->row();
    $d14 = $t14->row();
    $d15 = $t15->row();
    ?>
    <div class="row">

        <div class="col-lg-12 text-center mb-3">
            <button onclick="getPDF()" class="btn btn-danger text-white">Generate PDF</button>
        </div>
        <div class="col-md-12 mx-auto bg-white p-4 canvas_div_pdf">

            <div id="page" style="min-height:5000px;">
                <h2 class="text-center">BUSINESS MODEL </h2>
                <h4 class="text-center"><?=$d1->business_name;?></h4>
                <p class="text-center"><?=$d1->state;?>, <?=$d1->city;?></p>
                <p class="text-center"><?=$d2->website;?></p>
                <hr />
                <h3>Basic Information:</h3>
                <table class="table table-condensed table-striped">
                    <tbody>
                        <tr>
                            <td>
                                <p>Startup Name:</p>
                            </td>
                            <td>
                                <?=$d1->business_name;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Address</p>
                            </td>
                            <td>
                                <?=$d1->address;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>State</p>
                            </td>
                            <td>
                                <?=$d1->state;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>City</p>
                            </td>
                            <td>
                                <?=$d1->city;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Zip Code</p>
                            </td>
                            <td>
                                <?=$d1->zip_code;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Business Established ( Month / Year )</p>
                            </td>
                            <td>
                                <?=$d1->est_month;?> / <?=$d1->est_year;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Type of Marketplace</p>
                            </td>
                            <td>

                                <?=$d3->entity_type;?>
                            </td>
                        </tr>
                        <tr>
                            <td width="285">
                                <p>Telephone</p>
                            </td>
                            <td>
                                <?=$d2->telephone;?>
                            </td>
                        </tr>
                        <tr>
                            <td width="285">
                                <p>Email Address</p>
                            </td>
                            <td>
                                <?=$d2->email;?>
                            </td>
                        </tr>
                        <tr>
                            <td width="285">
                                <p>Website</p>
                            </td>
                            <td>
                                <?=$d2->website;?>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h3 class="pt-2 pb-2">Elevator Pitch:</h3>
                <p class="pb-1"><?=$d1->pitch;?></p>

                <h3 class="pt-2 pb-2">Mission Statement:</h3>
                <p class="pb-1"><?=$d1->mission_stm;?></p>

                <h3 class="pt-2 pb-2">Short Term Goal:</h3>
                <p class="pb-1"><?=$d1->short_goal;?></p>

                <h3 class="pt-2 pb-2">Long Term Goal:</h3>
                <p class="pb-1"><?=$d1->long_goal;?></p>


                <h3 class="pt-2 pb-2">Legal Existence:</h3>
                <p class="pb-1"><?=$d3->entity_type;?></p>

                <h3 class="pt-2 pb-2">Current Stage of Operation:</h3>
                <p class="pb-1"><?=$d4->state_of_opt;?></p>


                <h3>Key Partners &amp; Promoters:</h3>

                <h4 class="mt-3 mb-2">Founder's & Co-Founders</h4>
                <table class="table table-bordered table-condensed">
                    <tbody>
                        <tr>
                            <td>
                                <p>Founder&rsquo;s Name</p>
                            </td>
                            <td>
                                <?=$d5->founder_name;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Founder&rsquo;s Background</p>
                            </td>
                            <td>
                                <?=$d5->founder_background;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Co- Founder&rsquo;s Name ( 1)</p>
                            </td>
                            <td>
                                <?=$d5->co_name_one;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Co- Founder&rsquo;s Background ( 1)</p>
                            </td>
                            <td>
                                <?=$d5->co_background_one;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Co- Founder&rsquo;s Name ( 2)</p>
                            </td>
                            <td>
                                <?=$d5->co_name_two;?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Co- Founder&rsquo;s Background ( 2)</p>
                            </td>
                            <td>
                                <?=$d5->co_background_two;?>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="mt-3 mb-2">Partners</h4>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Importance</th>
                        <th>Activity</th>
                    </tr>
                    <tr>
                        <td><?=$d6->name_one;?></td>
                        <td><?=$d6->importance_one;?></td>
                        <td><?=$d6->activity_one;?></td>
                    </tr>
                    <tr>
                        <td><?=$d6->name_two;?></td>
                        <td><?=$d6->importance_two;?></td>
                        <td><?=$d6->activity_two;?></td>
                    </tr>
                </table>

                <h4 class="mt-3 mb-2">Promoters / Advisor</h4>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>

                    </tr>
                    <tr>
                        <td><?=$d7->name_one;?></td>
                        <td><?=$d7->role_one;?></td>

                    </tr>
                    <tr>
                        <td><?=$d7->name_two;?></td>
                        <td><?=$d7->role_two;?></td>

                    </tr>
                </table>

                <h3 class="pt-4">Value Propositions:</h3>
                <ol>
                    <li>What Industry do you server?</li>
                    <p><?=$d8->industry;?></p>
                    <li>Do you offer a product/service or both?</li>
                    <p><?=$d8->name;?></p>
                    <li>Name of Product/Service/Other</li>
                    <p><?=$d8->description;?></p>
                    <li>Description Product/Service/Other</li>
                    <p><?=$d8->q1;?></p>
                    <li>Which of your customer&rsquo;s problems are you helping to solve?</li>
                    <p><?=$d8->q2;?></p>
                    <li>Is it a problem or a need?</li>
                    <p><?=$d8->q3;?></p>
                    <li>What is the value you deliver to your customer?</li>
                    <p><?=$d8->q4;?></p>
                    <li>What is your promise to your customers?</li>
                    <p><?=$d8->q5;?></p>
                    <li>How do you make your product/service?</li>
                    <p><?=$d8->q6;?></p>
                    <li>Any proprietary feature that gives your offering competitive advantage</li>
                    <p><?=$d8->offer;?></p>
                </ol>
                <h3>Customer Segment:</h3>
                <h4>For whom you are creating values? Describe your target customer
                    Total size of your industry </h4>



                <table class="table table-bordered">
                    <tr>
                        <th>Customer Location:</th>
                        <th>Customer Age:</th>
                        <th>Customer Occupation:</th>
                    </tr>
                    <tr>
                        <td><?=$d9->location;?></td>
                        <td><?=$d9->age;?></td>
                        <td><?=$d9->occupation;?></td>
                    </tr>
                </table>

                <ol>
                    <li>Total size of the industry you are targeting?</li>
                    <p><?=$d9->q1;?></p>
                    <li>Describe your target customer</li>
                    <?=$d9->q2;?>
                    <li>How do you plan to get your first customer?</li>
                    <?=$d9->q3;?>
                    <li>How do you plan to retain them?</li>
                    <?=$d9->q4;?>
                    <li>Any feedback mechanism from customer?</li>
                    <?=$d9->q5;?>
                </ol>

                <h3 class="pt-4">Distribution Channel:</h3>
                <ol>
                    <li>How does your value proposition reach your customer?</li>
                    <p><?=$d10->q1;?></p>
                    <li>How will you/do you market your product/service:</li>
                    <p><?=$d10->q2;?></p>
                    <li>Where can your customer use or buy your products or services?</li>
                    <p><?=$d10->q3;?></p>
                    <li>What methods of distribution will you use to sell your products and/or services?</li>
                    <p><?=$d10->distribution_method;?></p>
                </ol>
                <p>&nbsp;</p>
                <h3>Revenue Stream:</h3>
                <p>How will you generate income/revenue?</p>

                <p><?=$d11->model;?></p>
                <h3>Price/Cost Strategy:</h3>
                <ol>
                    <li>What is the pricing strategy of your competitors?</li>
                    <p><?=$d12->q1;?></p>
                    <li>Can free users bring you value?</li>
                    <p><?=$d12->q2;?></p>
                    <li>Is your product unique?</li>
                    <p><?=$d12->q3;?></p>
                    <li>How are you deciding the price of your offering?</li>
                    <p><?=$d12->q4;?></p>
                    <li>What is the direct cost per sale?</li>
                    <p><?=$d12->q5;?></p>
                    <li>What is the indirect cost per sale?</li>
                    <p><?=$d12->q6;?></p>
                    <li>Desired profit margin per sale?</li>
                    <p><?=$d12->q7;?></p>
                </ol>

                <h3>Competitive Analysis:</h3>
                <p>List down your top three competitors &ndash;</p>
                <ol>
                    <li>Competitors First: <?=$d13->com1;?></li>
                    <li>Competitors Second: <?=$d13->com1;?></li>
                    <li>Competitors Third: <?=$d13->com1;?></li>
                </ol>
                <h4>How you are different from these three?</h4>
                <p><?=$d13->q1;?></p>
                <h4>Do you have a cost advantage?</h4>
                <p><?=$d13->q2;?></p>
                <h4>Do you have a technology or user experience advantage?</h4>
                <p><?=$d13->q3;?></p>
                <h4>Why will customer will choose your product over your competitors?</h4>
                <p><?=$d13->q4;?></p>

                <h3>Key Resource:</h3>
                <ol>
                    <li>What types of resources do you require?</li>
                    <p><?=$d14->q1;?></p>
                    <li>How many total employees do you need?</li>
                    <p><?=$d14->q2;?></p>
                    <li>Any niche skills you need in your employees?</li>
                    <p><?=$d14->q3;?></p>
                    <li>Do you require a production unit?</li>
                    <p><?=$d14->q4;?></p>
                    <li>Do you require an office space?</li>
                    <p><?=$d14->q5;?></p>
                    <li>What kind of inventory you need to keep in hand?</li>
                    <p><?=$d14->q6;?></p>
                    <li>What is the average value of inventory?</li>
                    <p><?=$d14->q7;?></p>
                    <li>Have you arranged money to meet this resourcing requirement?</li>
                    <p><?=$d14->q8;?></p>
                </ol>

                <h3>Key Activity:</h3>

                <p>What are the activities you perform every day to create value (product/service)? </p>
                <p><?=$d15->q1;?></p>
                <p> What are the activities you perform every day to deliver value (product/service)?</p>
                <p><?=$d15->q2;?></p>
                <p>Write down 5 most important activities you will do in next three months to create/deliver value?</p>
                <p><?=$d15->q3;?></p>
            </div>


        </div>
        <?php
}else { redirect(base_url()."dashboard"); } 
?>


    </div>
    <?php include('footer.php'); ?>