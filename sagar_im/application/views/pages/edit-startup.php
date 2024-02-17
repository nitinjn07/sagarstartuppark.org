<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Edit Applications
                    </h1>
                </div>
                <form action="<?=base_url();?>AcceptedApplication/updateStartup?updateid=<?=$startup->id; ?>"
                    method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4>Startup Basic Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>Startup ID</label>
                                                <input type="text" class="form-control mt-2" value="<?=$startup->id;?>"
                                                    name="startup_id" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>Startup Name</label>
                                                <input type="text" class="form-control mt-2" name="startup_name"
                                                    value="<?=$startup->startup_name;?>" readonly />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>Email ID</label>
                                                <input type="text" class="form-control mt-2" name="email"
                                                    value="<?=$startup->email;?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>Mobile Number</label>
                                                <input type="text" class="form-control mt-2" name="mobile"
                                                    value="<?=$startup->mobile;?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>State</label>
                                                <select onchange="print_city('state', this.selectedIndex);" name="state"
                                                    class="form-control valid mt-2" readonly>
                                                    <option value="<?=$startup->state;?>" selected><?=$startup->state;?>
                                                    </option>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>City</label>
                                                <select id="state" class="form-control mt-2" name="city" readonly
                                                    required>
                                                    <option value="">Select City</option>
                                                    <option value="<?=$startup->city;?>" selected><?=$startup->city;?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>Website Address</label>
                                                <input type="text" class="form-control mt-2" name="website_address"
                                                    value="<?=$startup->website_address;?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-3">
                                                <label>Current Stage</label>
                                                <select name="im_stage" id="startup_stage" class="form-control"
                                                    readonly>
                                                    <option value="">Select Startup Stage</option>

                                                    <option value="concept_ideation"
                                                        <?php if($startup->im_stage=='concept_ideation'){echo "selected";}?>>
                                                        Concept Ideation</option>
                                                    <option value="customer_discovery"
                                                        <?php if($startup->im_stage=='customer_discovery'){echo "selected";}?>>
                                                        Customer Discovery</option>
                                                    <option value="idea_validation"
                                                        <?php if($startup->im_stage=='idea_validation'){echo "selected";}?>>
                                                        Idea Validation</option>
                                                    <option value="minimum_viable_product"
                                                        <?php if($startup->im_stage=='minimum_viable_product'){echo "selected";}?>>
                                                        Minimum Viable Product</option>
                                                    <option value="product_market_fit"
                                                        <?php if($startup->im_stage=='product_market_fit'){echo "selected";}?>>
                                                        Product Market Fit</option>
                                                    <option value="growth_establishment_and_scale_up"
                                                        <?php if($startup->im_stage=='growth_establishment_and_scale_up'){echo "selected";}?>>
                                                        Growth Establishment and Scale Up</option>
                                                    <option value="maturity_and_possible_exit"
                                                        <?php if($startup->im_stage=='maturity_and_possible_exit'){echo "selected";}?>>
                                                        Maturity and Possible Exit</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-lg-12 pt-2">
                                            <div class="form-group pt-2">
                                                <label>Product / Services</label>
                                                <textarea class="form-control mt-2"
                                                    name="product_service_summary"><?=$startup->product_service_summary;?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pt-2">
                                            <div class="form-group py-2">
                                                <label>Elevetor Pitch</label>
                                                <textarea class="form-control"
                                                    name="pitch"><?=$startup->pitch;?></textarea>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="row">
                                        <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Photo</th>
                                                    <th>Member Name</th>
                                                    <th>Startup Name</th>
                                                    <th>Job Type</th>
                                                    <th>Role</th>
                                                    <th>SeatNo</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j=1;
                                          
                                           $team = $this->db->get_where('team_member',array('startup_id'=>$startup->id,'delstatus'=>1))->result();
                                           foreach($team as $t)
                                           {
                                        ?>
                                                <tr>

                                                    <td><?=$j;?></td>
                                                    <td><img src='<?=base_url('uploads/team/').$t->profile;?>'
                                                            width="50px" height="50px" />
                                                    </td>
                                                    <td><a href="javascript:void(0)"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-team-member/<?= $t->id; ?>')"><?=$t->name;?></a>
                                                    </td>
                                                    <td><?php 
                                               $n= $this->db->get_where('startup',array('id'=>$t->startup_id))->row();
                                               echo $n->startup_name;
                                            ?></td>
                                                    <td><?php if($t->intern==1){ echo "Internship /"; };?>
                                                        <?php if($t->part_time==1){ echo "Part Time"; };?></td>
                                                    <td><?=$t->role;?></td>
                                                    <td><?=$t->seat_no;?></td>
                                                    <td>
                                                        <a href="javascript:void(0)"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-team-member/<?= $t->id; ?>')"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="fa fa-edit"></i></a>

                                                        <a href="<?=base_url();?>Team/deleteTeam?startupid=<?=$t->startup_id; ?>&&id=<?=$t->id; ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure to delete');"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>


                                                </tr>
                                                <?php 
                                         $j++;
                                           }
                                        ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div><!-- End of Basic Information -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Business Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company Type</label>
                                                <select class="form-control" name="company_type">
                                                    <option value="">Select Company Type</option>
                                                    <option value="Not_Registered"
                                                        <?php if($startup->companyType=='Not_Registered'){ echo "selected"; } ?>>
                                                        Not Registered</option>
                                                    <option value="Proprietorship"
                                                        <?php if($startup->companyType=='Proprietorship'){ echo "selected"; } ?>>
                                                        Proprietorship</option>
                                                    <option value="LLP"
                                                        <?php if($startup->companyType=='LLP'){ echo "selected"; } ?>>
                                                        LLP
                                                    </option>
                                                    <option value="Private_Limited"
                                                        <?php if($startup->companyType=='Private_Limited'){ echo "selected"; } ?>>
                                                        Private Limited</option>
                                                    <option value="Partnership_Firm"
                                                        <?php if($startup->companyType=='Partnership_Firm'){ echo "selected"; } ?>>
                                                        Partnership Firm</option>
                                                    <option value="other"
                                                        <?php if($startup->companyType=='other'){ echo "selected"; } ?>>
                                                        Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-2">
                                                <label>Founded Month</label>
                                                <select name="founded_month" id="month" class="form-control mt-2">

                                                    <option value="" selected="selected">Select Month</option>
                                                    <option value="January"
                                                        <?php if($startup->founded_month=='January'){ echo "selected"; } ?>>
                                                        January
                                                    </option>
                                                    <option value="February"
                                                        <?php if($startup->founded_month=='February'){ echo "selected"; } ?>>
                                                        February
                                                    </option>
                                                    <option value="March"
                                                        <?php if($startup->founded_month=='March'){ echo "selected"; } ?>>
                                                        March
                                                    </option>
                                                    <option value="April"
                                                        <?php if($startup->founded_month=='April'){ echo "selected"; } ?>>
                                                        April
                                                    </option>
                                                    <option value="May"
                                                        <?php if($startup->founded_month=='May'){ echo "selected"; } ?>>
                                                        May
                                                    </option>
                                                    <option value="June"
                                                        <?php if($startup->founded_month=='June'){ echo "selected"; } ?>>
                                                        June
                                                    </option>
                                                    <option value="July"
                                                        <?php if($startup->founded_month=='July'){ echo "selected"; } ?>>
                                                        July
                                                    </option>
                                                    <option value="August"
                                                        <?php if($startup->founded_month=='August'){ echo "selected"; } ?>>
                                                        August
                                                    </option>
                                                    <option value="September"
                                                        <?php if($startup->founded_month=='September'){ echo "selected"; } ?>>
                                                        September
                                                    </option>
                                                    <option value="October"
                                                        <?php if($startup->founded_month=='October'){ echo "selected"; } ?>>
                                                        October
                                                    </option>
                                                    <option value="November"
                                                        <?php if($startup->founded_month=='November'){ echo "selected"; } ?>>
                                                        November
                                                    </option>
                                                    <option value="December"
                                                        <?php if($startup->founded_month=='December'){ echo "selected"; } ?>>
                                                        December
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-2">
                                                <label>Founded Year</label>
                                                <input type="number" class="form-control mt-2"
                                                    value="<?=$startup->founded_year;?>" max="<?=date('Y');?>"
                                                    name="founded_year">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mt-2">
                                                <label>Type of Business</label>
                                                <select class="form-control mt-2" id="business_type"
                                                    name="type_of_business">
                                                    <option value="">Select Type of Business</option>
                                                    <option value="B2B"
                                                        <?php if($startup->type_of_business=='B2B'){ echo "selected"; } ?>>
                                                        B2B
                                                    </option>
                                                    <option value="B2C"
                                                        <?php if($startup->type_of_business=='B2C'){ echo "selected"; } ?>>
                                                        B2C
                                                    </option>
                                                    <option value="B2G"
                                                        <?php if($startup->type_of_business=='B2G'){ echo "selected"; } ?>>
                                                        B2G
                                                    </option>
                                                    <option value="Both"
                                                        <?php if($startup->type_of_business=='Both'){ echo "selected"; } ?>>
                                                        Both
                                                        B2B and
                                                        B2C</option>
                                                    <option value="Other"
                                                        <?php if($startup->type_of_business=='Other'){ echo "selected"; } ?>>
                                                        Other
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <div class="form-group mt-2">
                                                <label>Sector</label>
                                                <select class="form-control mt-2" id="sector" name="verticals_sectors">
                                                    <option value="">Select Sectors</option>
                                                    <option value="Healthcare"
                                                        <?php if($startup->verticals_sectors=='Healthcare'){ echo "selected"; } ?>>
                                                        Healthcare</option>
                                                    <option value="Agriculture"
                                                        <?php if($startup->verticals_sectors=='Agriculture'){ echo "selected"; } ?>>
                                                        Agriculture</option>
                                                    <option value="Information_Technology"
                                                        <?php if($startup->verticals_sectors=='Information_Technology'){ echo "selected"; } ?>>
                                                        Information Technology
                                                    </option>
                                                    <option value="Citizen_Services"
                                                        <?php if($startup->verticals_sectors=='Citizen_Services'){ echo "selected"; } ?>>
                                                        Citizen Services</option>
                                                    <option value="Social_welfare_and_development"
                                                        <?php if($startup->verticals_sectors=='Social_welfare_and_development'){ echo "selected"; } ?>>
                                                        Social welfare and
                                                        development
                                                    </option>
                                                    <option value="Education"
                                                        <?php if($startup->verticals_sectors=='Education'){ echo "selected"; } ?>>
                                                        Education
                                                    </option>
                                                    <option value="Finance"
                                                        <?php if($startup->verticals_sectors=='Finance'){ echo "selected"; } ?>>
                                                        Finance
                                                    </option>
                                                    <option value="Transportation"
                                                        <?php if($startup->verticals_sectors=='Transportation'){ echo "selected"; } ?>>
                                                        Transportation</option>
                                                    <option value="Legal_Services"
                                                        <?php if($startup->verticals_sectors=='Legal_Services'){ echo "selected"; } ?>>
                                                        Legal Services</option>

                                                    <option value="Technical_Services"
                                                        <?php if($startup->verticals_sectors=='Technical_Services'){ echo "selected"; } ?>>
                                                        Technical Services</option>


                                                    <option value="Marketing_and_Advertising"
                                                        <?php if($startup->verticals_sectors=='Marketing_and_Advertising'){ echo "selected"; } ?>>
                                                        Marketing and Advertising</option>

                                                    <option value="Food_and_Beverage"
                                                        <?php if($startup->verticals_sectors=='Food_and_Beverage'){ echo "selected"; } ?>>
                                                        Food and Beverage</option>

                                                    <option value="Commercial"
                                                        <?php if($startup->verticals_sectors=='Commercial'){ echo "selected"; } ?>>
                                                        Commercial</option>

                                                    <option value="Import_and_Export"
                                                        <?php if($startup->verticals_sectors=='Import_and_Export'){ echo "selected"; } ?>>
                                                        Import and Export</option>

                                                    <option value="HR_Services"
                                                        <?php if($startup->verticals_sectors=='HR_Services'){ echo "selected"; } ?>>
                                                        HR Services</option>
                                                    <option value="Other"
                                                        <?php if($startup->verticals_sectors=='Other'){ echo "selected"; } ?>>
                                                        Other
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-2">
                                                <label>DPIIT</label>
                                                <input type="text" class="form-control mt-2"
                                                    value="<?=$startup->dpiit;?>" name="dpiit" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-2">
                                                <label>Incubation Joining Month</label>
                                                <select name="incubation_joining_month" class="form-control mt-2">

                                                    <option value="" selected="selected">Select Month</option>
                                                    <option value="January"
                                                        <?php if($startup->incubation_joining_month=='January'){echo "selected"; }; ?>>
                                                        January</option>
                                                    <option value="February"
                                                        <?php if($startup->incubation_joining_month=='February'){echo "selected"; }; ?>>
                                                        February</option>
                                                    <option value="March"
                                                        <?php if($startup->incubation_joining_month=='March'){echo "selected"; }; ?>>
                                                        March</option>
                                                    <option value="April"
                                                        <?php if($startup->incubation_joining_month=='April'){echo "selected"; }; ?>>
                                                        April</option>
                                                    <option value="May"
                                                        <?php if($startup->incubation_joining_month=='May'){echo "selected"; }; ?>>
                                                        May
                                                    </option>
                                                    <option value="June"
                                                        <?php if($startup->incubation_joining_month=='June'){echo "selected"; }; ?>>
                                                        June</option>
                                                    <option value="July"
                                                        <?php if($startup->incubation_joining_month=='July'){echo "selected"; }; ?>>
                                                        July</option>
                                                    <option value="August"
                                                        <?php if($startup->incubation_joining_month=='August'){echo "selected"; }; ?>>
                                                        August</option>
                                                    <option value="September"
                                                        <?php if($startup->incubation_joining_month=='September'){echo "selected"; }; ?>>
                                                        September</option>
                                                    <option value="October"
                                                        <?php if($startup->incubation_joining_month=='October'){echo "selected"; }; ?>>
                                                        October</option>
                                                    <option value="November"
                                                        <?php if($startup->incubation_joining_month=='November'){echo "selected"; }; ?>>
                                                        November</option>
                                                    <option value="December"
                                                        <?php if($startup->incubation_joining_month=='December'){echo "selected"; }; ?>>
                                                        December</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-2">
                                                <label>Incubation Joining Year</label>
                                                <input type="number" class="form-control mt-2"
                                                    value="<?=$startup->incubation_joining_year;?>"
                                                    name="incubation_joining_year" max="<?=date('Y');?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-3">
                                                <label>Is DPIIT Registered ?</label>
                                                <input type="radio" name="is_dpiit_reg"
                                                    <?php if($startup->is_dpiit_reg==1){echo "checked";}; ?> value="1">
                                                Yes
                                                <input type="radio" name="is_dpiit_reg"
                                                    <?php if($startup->is_dpiit_reg==0){echo "checked";}; ?> value="0">
                                                No
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-3">
                                                <label>Tax Excemption / 80IAC availed?</label>
                                                <input type="radio" name="is_tax_excemption" value="1"
                                                    <?php if($startup->is_tax_excemption==1){echo "checked";}; ?>> Yes
                                                <input type="radio" name="is_tax_excemption" value="0"
                                                    <?php if($startup->is_tax_excemption==0){echo "checked";}; ?>> No
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-3">
                                                <label>Is DPIIT Recognized?</label>
                                                <input type="radio" name="is_dpiit_recog" value="1"
                                                    <?php if($startup->is_dpiit_recog==1){echo "checked";}; ?>> Yes
                                                <input type="radio" name="is_dpiit_recog" value="0"
                                                    <?php if($startup->is_dpiit_recog==0){echo "checked";}; ?>> No
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-3">
                                                <label>Stage (On Joining)</label>
                                                <select name="stage" id="startup_stage" class="form-control">
                                                    <option value="">Select Startup Stage</option>

                                                    <option value="concept_ideation"
                                                        <?php if($startup->stage=='concept_ideation'){echo "selected";}?>>
                                                        Concept Ideation</option>
                                                    <option value="customer_discovery"
                                                        <?php if($startup->stage=='customer_discovery'){echo "selected";}?>>
                                                        Customer Discovery</option>
                                                    <option value="idea_validation"
                                                        <?php if($startup->stage=='idea_validation'){echo "selected";}?>>
                                                        Idea Validation</option>
                                                    <option value="minimum_viable_product"
                                                        <?php if($startup->stage=='minimum_viable_product'){echo "selected";}?>>
                                                        Minimum Viable Product</option>
                                                    <option value="product_market_fit"
                                                        <?php if($startup->stage=='product_market_fit'){echo "selected";}?>>
                                                        Product Market Fit</option>
                                                    <option value="growth_establishment_and_scale_up"
                                                        <?php if($startup->stage=='growth_establishment_and_scale_up'){echo "selected";}?>>
                                                        Growth Establishment and Scale Up</option>
                                                    <option value="maturity_and_possible_exit"
                                                        <?php if($startup->stage=='maturity_and_possible_exit'){echo "selected";}?>>
                                                        Maturity and Possible Exit</option>
                                                </select>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div><!-- Startup Business Information -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Startup Founder Details</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group pt-2">

                                                <label>Is Women Startup</label>
                                                <input type="checkbox" class="mt-2" value="1"
                                                    <?php if($startup->is_women==1){echo "checked"; }?>
                                                    name="is_women" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-3">
                                                <label>Number of Founder</label>
                                                <input type="number" class="form-control" id="no_founder"
                                                    name="no_of_founder" value="<?=$startup->no_of_founder?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group pt-3">




                                                <a class="btn btn-primary mt-3" href="javascript:void(0)"
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/add-founder/<?= $startup->id; ?>')">Add
                                                    Founders</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <table class="table">
                                            <tr>
                                                <th>Startup ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Gender</th>
                                                <th>Background</th>
                                                <th>Education</th>
                                                <th>Action</th>

                                            </tr>
                                            <?php
                                              $rs = $this->db->get_where('founders',array('delstatus'=>1,'startup_id'=>$startup->id))->result();
                                              $i=1;
                                              foreach($rs as $r)
                                              {

                                            ?>
                                            <tr>
                                                <td><?=$i;?></td>
                                                <td><?=$r->founderName;?></td>
                                                <td><?=$r->founderEmail;?></td>
                                                <td><?=$r->founderMobile;?></td>
                                                <td><?=$r->founderGender;?></td>
                                                <td><?=$r->founderBackground;?></td>
                                                <td><?=$r->founderEducation;?></td>
                                                <td>
                                                    <a href="<?=base_url();?>AcceptedApplication/deleteFounder?delid=<?=$r->id;?>&&sid=<?=$startup->id;?>"
                                                        class="btn btn-danger"><i class="fa fa-trash"> </i></a>
                                                    <a href="javascript:voide(0)"
                                                        onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-founder/<?= $r->id; ?>')"
                                                        class="btn btn-warning"><i class="fa fa-edit"> </i></a>
                                                </td>
                                            </tr>
                                            <?php 
                                              }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- Startup Founder Details -->


                        </div><!-- Startup Founder Details -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Social Networkings URL</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 pt-2">
                                            <label class="pt-2">Facebook ( <i class='fa fa-facebook text-primary'> </i>
                                                )</label>
                                            <input type="text" name="facebook" class="form-control"
                                                value="<?=$startup->facebook;?>" />
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <label class="pt-2">Twitter ( <i class='fa fa-twitter'> </i> )</label>
                                            <input type="text" name="twitter" class="form-control"
                                                value="<?=$startup->twitter;?>" />
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <label class="pt-2">Linked In ( <i class='fa fa-linkedin'> </i> )</label>
                                            <input type="text" name="linkedin" class="form-control"
                                                value="<?=$startup->linkedin;?>" />
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <label class="pt-2">Youtube URL( <i class='fa fa-youtube text-danger'> </i>
                                                )</label>
                                            <input type="text" name="youtube" class="form-control"
                                                value="<?=$startup->youtube;?>" />
                                        </div>
                                        <div class="col-md-4 pt-2">
                                            <label class="pt-2">Whatsapp Number( <i class='fa fa-whatsapp text-success'>
                                                </i>
                                                )</label>
                                            <input type="text" name="whatsapp" class="form-control"
                                                value="<?=$startup->whatsapp;?>" />
                                        </div>


                                    </div>

                                </div>
                            </div><!-- Startup Founder Details -->

                        </div><!-- Startup Founder Details -->
                        <!-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Revenue Information </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group py-2">
                                                <label>Revenue Generated</label>
                                                <label><input type="checkbox" id="is_revenue_gen" name="is_revenue_gen"
                                                        value="1"
                                                        <?php if($startup->is_revenue_gen==1){echo "checked"; }?> />
                                                    if Yes
                                                </label>

                                            </div>
                                        </div>
                                        <div id="revenue_gen">
                                            <div class="form-group py-2">
                                                <label>Last Revenue Year</label>
                                                <select class="form-control" name="last_year">
                                                    <option value="">Select Year</option>

                                                    <?php for($i=date('Y'); $i>=date('Y')-20; $i--) {  ?>

                                                    <option value="<?=$i;?>"
                                                        <?php if($startup->last_year==$i){echo "selected";}; ?>>
                                                        <?=$i;?>
                                                    </option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group py-2">
                                                <label>Revenue Amount (In Lac)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="last_year_amount"
                                                        value="<?=$startup->last_year_amount;?>" />

                                                </div>

                                            </div>
                                            <div class="form-group py-2">
                                                <label>Last Revenue Month</label>
                                                <select class="form-control" name="last_month">
                                                    <option value="">Select Month</option>
                                                    <option selected value='1'
                                                        <?php if($startup->last_month==1){echo "selected";}; ?>>
                                                        Janaury
                                                    </option>
                                                    <option value='2'
                                                        <?php if($startup->last_month==2){echo "selected";}; ?>>
                                                        February</option>
                                                    <option value='3'
                                                        <?php if($startup->last_month==3){echo "selected";}; ?>>
                                                        March
                                                    </option>
                                                    <option value='4'
                                                        <?php if($startup->last_month==4){echo "selected";}; ?>>
                                                        April
                                                    </option>
                                                    <option value='5'
                                                        <?php if($startup->last_month==5){echo "selected";}; ?>>
                                                        May
                                                    </option>
                                                    <option value='6'
                                                        <?php if($startup->last_month==6){echo "selected";}; ?>>
                                                        June
                                                    </option>
                                                    <option value='7'
                                                        <?php if($startup->last_month==7){echo "selected";}; ?>>
                                                        July
                                                    </option>
                                                    <option value='8'
                                                        <?php if($startup->last_month==8){echo "selected";}; ?>>
                                                        August
                                                    </option>
                                                    <option value='9'
                                                        <?php if($startup->last_month==9){echo "selected";}; ?>>
                                                        September</option>
                                                    <option value='10'
                                                        <?php if($startup->last_month==10){echo "selected";}; ?>>
                                                        October</option>
                                                    <option value='11'
                                                        <?php if($startup->last_month==11){echo "selected";}; ?>>
                                                        November</option>
                                                    <option value='12'
                                                        <?php if($startup->last_month==12){echo "selected";}; ?>>
                                                        December</option>
                                                </select>

                                            </div>
                                            <div class="form-group py-2">
                                                <label>Revenue Amount (In Lac)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="last_month_amount"
                                                        value="<?=$startup->last_month_amount;?> " />

                                                </div>

                                            </div>
                                            <div class="form-group py-2">
                                                <label>Revenue Last Quater</label>
                                                <select class="form-control" name="last_quater">
                                                    <option value="">Select Month</option>

                                                    <option selected value='1-3'
                                                        <?php if($startup->last_quater=="1-3"){echo "selected";}; ?>>
                                                        January-March
                                                    </option>
                                                    <option value='4-6'
                                                        <?php if($startup->last_quater=="4-6"){echo "selected";}; ?>>
                                                        April-June</option>
                                                    <option value='7-9'
                                                        <?php if($startup->last_quater=="7-9"){echo "selected";}; ?>>
                                                        July-Sep</option>
                                                    <option value='10-12'
                                                        <?php if($startup->last_quater=="10-12"){echo "selected";}; ?>>
                                                        Oct-Dec</option>


                                                </select>

                                            </div>
                                            <div class="form-group py-2">
                                                <label>Revenue Amount (In Lac)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="last_quater_amount"
                                                        value="<?=$startup->last_quater_amount;?>" />

                                                </div>

                                            </div>
                                            <div class="form-group py-2">
                                                <a href="<?=base_url('uploads/revenue_doc/').@$startup->revenue_doc;?>">Revenue
                                                    Document</a>
                                                <label for="">Revenue Document</label>
                                                <input type="file" name="revenue_doc" class="form-control" />
                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- End of Revenue Generated -->
                        <!-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Funding</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Bootstrapped ?</label>
                                                <label><input type="checkbox" id="is_bootstrapped" name="is_bootstrap"
                                                        <?php if($startup->is_bootstrap==1){echo "checked"; }?>
                                                        value="1" /> Yes
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-6" id="boot_amount">
                                            <div class="form-group">
                                                <label>Bootstrapped Amount</label>
                                                <input type="number" class="form-control" name="boot_amount"
                                                    value="<?=$startup->boot_amount;?>" pattern="[0-9]+" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group py-2">
                                                <label>Angle Seed Funding Raised</label>
                                                <label><input type="checkbox" id="angle_seed" name="is_get_seed_fund"
                                                        value="1"
                                                        <?php if($startup->is_get_seed_fund==1){echo "checked"; }?> />
                                                    if Yes
                                                </label>

                                            </div>
                                            <div id="angle">

                                                <div class="form-group py-2">
                                                    <label>Amount</label>
                                                    <input type="number" class="form-control" name="seed_amount"
                                                        value="<?=$startup->seed_amount;?>" pattern="[0-9]+" />

                                                </div>
                                                <div class="form-group py-2">
                                                    <label>Valuation</label>
                                                    <input type="text" class="form-control" name="seed_valuation"
                                                        value="<?=$startup->seed_valuation;?>" />

                                                </div>
                                                <div class="form-group py-2">
                                                    <label>Funding Date</label>
                                                    <input type="date" class="form-control" name="seed_date"
                                                        value="<?=$startup->seed_date;?>" />

                                                </div>
                                                <div class="form-group py-2">
                                                    <label>Equity Diluted</label>
                                                    <input type="text" class="form-control" name="seed_equity"
                                                        value="<?=$startup->seed_equity;?>" />

                                                </div>
                                            </div>
                                            <div class="form-group py-2">
                                                <label>Grant Recieved ?</label>
                                                <label><input type="checkbox" id="is_grant" name="is_recieved_grant"
                                                        value="1"
                                                        <?php if($startup->is_recieved_grant==1){echo "checked"; }?> />
                                                    if Yes
                                                </label>

                                            </div>

                                            <div id="grant">
                                                <div class="form-group py-2">
                                                    <label>Amount</label>
                                                    <input type="number" class="form-control" name="grant_amount"
                                                        value="<?=$startup->grant_amount;?>" pattern="[0-9]+" />

                                                </div>
                                                <div class="form-group py-2">
                                                    <label>Date</label>
                                                    <input type="date" class="form-control" name="grant_date"
                                                        value="<?=$startup->grant_date;?>" />

                                                </div>
                                                <div class="form-group py-2">
                                                    <label>Grant from</label>
                                                    <input type="text" class="form-control" name="grant_from"
                                                        value="<?=$startup->grant_from;?>" />

                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div> -->

                        <!-- End of Funding Details -->
                        <div class="col-md-12">
                            <div class="form-group py-2">

                                <input type="submit" class="btn btn-primary" value="Update" />
                            </div>
                        </div>

                </form>
            </div>
        </main>

        <?=include('common/footer.php');?>
        <script>
        $(document).ready(function() {
            $('#graduatedate').hide();
            $('#sts').val('<?=$startup->state; ?>').trigger("change");;

            $('#state [value="<?=$startup->city; ?>"]').attr('selected', 'true');

            $('#sector [value="<?=$startup->verticals_sectors; ?>"]').attr('selected', 'true');

            $('#last_year_type [value="<?=$startup->last_year_type; ?>"]').attr('selected', 'true');

            $('#last_month_type [value="<?=$startup->last_month_type; ?>"]').attr('selected', 'true');

            $('#last_quater_type [value="<?=$startup->last_quater_type; ?>"]').attr('selected', 'true');

            $('#month [value="<?=$startup->founded_month; ?>"]').attr('selected', 'true');

            $('#business_type [value="<?=$startup->type_of_business; ?>"]').attr('selected', 'true');



            $('#revenue_gen').hide();

            $('#is_revenue_gen').click(function() {
                var name = $(this).attr('name');

                if ($(this).hasClass('checked')) {

                    $(this).prop('checked', false);
                    $('#revenue_gen').hide();
                    $(this).removeClass('checked');

                } else {
                    $('input[name="' + name + '"]').removeClass('checked');
                    $(this).addClass('checked');
                    $('#revenue_gen').show();
                }
            });



            $('#angle').hide();

            $('#angle_seed').click(function() {
                var name = $(this).attr('name');

                if ($(this).hasClass('checked')) {

                    $(this).prop('checked', false);
                    $('#angle').hide();
                    $(this).removeClass('checked');

                } else {
                    $('input[name="' + name + '"]').removeClass('checked');
                    $(this).addClass('checked');
                    $('#angle').show();
                }
            });


            $('#grant').hide();

            $('#is_grant').click(function() {
                var name = $(this).attr('name');

                if ($(this).hasClass('checked')) {

                    $(this).prop('checked', false);
                    $('#grant').hide();
                    $(this).removeClass('checked');

                } else {
                    $('input[name="' + name + '"]').removeClass('checked');
                    $(this).addClass('checked');
                    $('#grant').show();
                }
            });

            $('#addfounder').on('click', function() {

                var founder = $('#inside_founder').html();

                $('#inside_founder').after(
                    '<div class="row" id="remove">' +
                    founder + "</div>");

            });

            $('#removefounder').click(function() {
                $('#remove').last().remove();
            });





            $('#is_bootstrapped').click(function() {
                var name = $(this).attr('name');

                if ($(this).hasClass('checked')) {

                    $(this).prop('checked', false);
                    $('#boot_amount').hide();
                    $(this).removeClass('checked');

                } else {
                    $('input[name="' + name + '"]').removeClass('checked');
                    $(this).addClass('checked');
                    $('#boot_amount').show();
                }
            });




        });
        </script>