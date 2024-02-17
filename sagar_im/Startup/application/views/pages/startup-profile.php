<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Profile
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#basic_profile">Basic
                                            Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#screening_details">Screening
                                            Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#incubation_details">Incubation
                                            Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#product_service">Product &
                                            Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#founder_details">Founder
                                            Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab"
                                            href="#incorporation_details">Incorporation Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#revenue_details">Revenue
                                            /Funding</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#startup_team">Team </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#documents">Documents </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#startup_kra">KRA </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#attendance">Attendance </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="basic_profile">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?php 
                                                    if($startup->logo!="")
                                                    {
                                                    ?>
                                                <img src="<?=base_url('../uploads/logo/').$startup->logo;?>"
                                                    class="img-fluid rounded-circle mb-2"
                                                    alt="<?=$startup->startup_name;?>" width="100px" />
                                                <?php }else {
                                                    ?>
                                                <img src="<?=base_url('assets/img/startuplogo.png'); ?>"
                                                    class="img-fluid rounded-circle mb-2"
                                                    alt="<?=$startup->startup_name;?>" width="1010px" />
                                                <?php

                                                    } ?>

                                            </div>
                                            <div class="col-lg-8 pt-4">
                                                <h3><?=$startup->startup_name;?></h3>
                                                <table class="table">
                                                    <tr>
                                                        <td>Startup Name</td>
                                                        <td><?php 
                                                        if($startup->startup_name){ echo $startup->startup_name;}else { echo "Not Found";}  ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Product & Services</td>
                                                        <td><?php if($startup->product_service_summary!=""){ echo $startup->product_service_summary;} else { echo "Not Found"; }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Startup Type</td>
                                                        <td><?php if($startup->startup_type){echo $startup->startup_type;}else { echo "Not Found"; }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stage (At the time of Joining )</td>
                                                        <td><?php if($startup->stage){ echo strtoupper(str_replace("_"," ",$startup->im_stage));}else { echo "Not Found"; }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><?php if($startup->email){echo strtolower($startup->email); }else { echo "Not Found"; } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Location</td>
                                                        <td><?php if($startup->state){ echo $startup->city."/".$startup->state; } else { echo "Not Found"; } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td><?php if($startup->mobile){ echo $startup->mobile;} else { echo "Not Found"; }?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Founded In</td>
                                                        <td><?=$startup->founded_month."/".$startup->founded_year;?>
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="screening_details">
                                        <div class="col-md-6 pt-5 shadow">
                                            <h3>Screening Details:</h3>
                                            <?php 
                                             $screening_status = $this->db->get_where('screening_status',array('startup_id'=>$startup->id))->row();
                                              if(@$screening_status)
                                              {
                                            ?>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Current Stage</td>
                                                    <td><?php if($startup->stage){ echo str_replace("_"," ",$startup->stage); }else { echo "Not Found"; } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Startup Type</td>
                                                    <td><?php if($screening_status->startup_type){echo $screening_status->startup_type;} else { echo "Not Found"; }?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Incubation Period</td>
                                                    <td><?php if($screening_status->incubation_period) { echo $screening_status->incubation_period; } else { echo "Not Found"; } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Screening Remark</td>
                                                    <td><?php if($screening_status->screening_remark){ echo $screening_status->screening_remark;} else { echo "Not Found"; } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Screening Status</td>
                                                    <td><?php if($screening_status->screening_status){ echo $screening_status->screening_status; } else { echo "Not Found"; }?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Screening Document</td>
                                                    <td>
                                                        <?php
                                                          if($screening_status->screening_doc)
                                                          {
                                                        ?>
                                                        <a
                                                            href="<?=base_url('../uploads/screening_doc/').$screening_status->screening_doc;?>"><i
                                                                class="fa fa-download"></i></a>
                                                        <?php 
                                                          }
                                                          else {
                                                           echo "No Document";
                                                          }
                                                        ?>
                                                    </td>
                                                </tr>

                                            </table>
                                            <?php 
                                              }
                                              ?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="incubation_details">
                                        <div class="col-md-6 pt-5 shadow">
                                            <h3>Incubation Details:</h3>
                                            <p>Joining Month/Year :
                                                <?php if($startup->incubation_joining_month){ echo $startup->incubation_joining_month;} else { echo "<label class='text-danger'>Not Found</label>"; }?>
                                            </p>
                                            <p>Floor No: :
                                                <?php 
                                                  $startup->id;
                                        
                                        $seat=$this->db->get_where('onboard_seat',array('startupid'=>$startup->id));
                                      
                                                if($seat->row()->wing){echo $seat->row()->wing;} else { echo "<label class='text-danger'>Not Found</label>"; }?>
                                            </p>
                                            <p>Seat No : <?php 
                                        
                                            if($seat->num_rows() > 0){
                                                echo str_replace("|",",",$seat->row()->seat_no);
                                            }else 
                                            {
                                              echo "<label class='text-danger'>Not Found</label>";  
                                            } ?>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="tab-pane pt-3 fade" id="product_service">
                                        <h3>Product & Services</h3>
                                        <p><?php if($startup->product_service_summary){ echo $startup->product_service_summary;} else { echo "Not Found"; }?>
                                        </p>
                                    </div>
                                    <div class="tab-pane pt-3 fade" id="founder_details">
                                        <h3>Founder Details</h3>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>SNo.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Gender</th>
                                                <th>Background</th>
                                                <th>Education</th>
                                            </tr>

                                            <?php
                                            $i=1;
                                            $founder1 = $this->db->get_where('founders',array('startup_id'=>$startup->id,'delstatus'=>1))->result();
                                            foreach($founder1 as $f1)
                                            { 
                                          ?>

                                            <tr>
                                                <td><?=$i;?></td>
                                                <td><?=$f1->founderName;?></td>
                                                <td><?=$f1->founderEmail;?></td>
                                                <td><?=$f1->founderMobile;?></td>
                                                <td><?=$f1->founderGender;?></td>
                                                <td><?=$f1->founderBackground;?></td>
                                                <td><?=$f1->founderEducation;?></td>
                                            </tr>
                                            <?php 
                                              $i++;
                                              }
                                            ?>
                                        </table>
                                    </div>
                                    <div class="tab-pane pt-3 fade" id="incorporation_details">
                                        <h3>Incorporation Details</h3>

                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Sectors</td>
                                                <td><?= strtoupper(str_replace("_"," ",$startup->verticals_sectors));?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Company Type</td>
                                                <td><?=$startup->companyType;?></td>
                                            </tr>
                                            <tr>
                                                <td>Is DPIIT Recognized ?</td>
                                                <td><?php if($startup->is_dpiit_recog==1){ echo "Yes"; }else { echo "No"; }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Is DPIIT Registered ?</td>
                                                <td><?php if($startup->is_dpiit_reg==1){ echo "Yes"; }else { echo "No"; }?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane pt-3 fade" id="revenue_details">
                                        <h3>Revenue Details:</h3>
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>

                                                    <th>Source</th>
                                                    <th>Amount</th>
                                                    <th>Invest Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                          $bootstrap = $this->db->get_where('bootstrap',array('startup_id'=>$startup->id))->result();
                                          $i=1;
                                          foreach($bootstrap as $b)
                                          {
                                             
                                        ?>
                                                <tr>
                                                    <td><?=$i;?></td>

                                                    <td><?=$b->purpose;?></td>
                                                    <td><?=$b->amount;?></td>
                                                    <td><?=$b->invest_date;?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>

                                        <h4>Seed Fund</h4>

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>

                                                    <th>Seed Fund Amount</th>
                                                    <th>Seed Fund By</th>
                                                    <th>Pre Money Valuation</th>
                                                    <th>Post Money Valuation</th>
                                                    <th>Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                          $seed = $this->db->get('seed_funding',array('startup_id'=>$startup->id))->result();
                                          $i=1;
                                          foreach($seed as $s)
                                          {
                                             
                                        ?>
                                                <tr>
                                                    <td><?=$i;?></td>

                                                    <td><?=$s->seed_amount;?></td>
                                                    <td><?=$s->seed_provided_by;?></td>
                                                    <td><?=$s->pre_money;?></td>
                                                    <td><?=$s->post_money;?></td>
                                                    <td><?=$s->seed_date;?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>

                                        <h4>VC Funding</h4>

                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>

                                                    <th>VC Amount</th>
                                                    <th>VC Name</th>
                                                    <th>Pre Money Valuation</th>
                                                    <th>Post Money Valuation</th>
                                                    <th>VC Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                          $vc = $this->db->get('vc_funding',array('startup_id'=>$startup->id))->result();
                                          $i=1;
                                          foreach($vc as $v)
                                          {
                                            
                                        ?>
                                                <tr>
                                                    <td><?=$i;?></td>

                                                    <td><?=$v->vc_amount;?></td>
                                                    <td><?=$v->vc_name;?></td>
                                                    <td><?=$v->pre_money;?></td>
                                                    <td><?=$v->post_money;?></td>
                                                    <td><?=$v->vc_date;?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>

                                        <h4>Angel Funding</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>

                                                    <th>Investor Name</th>
                                                    <th>Investor Background</th>
                                                    <th>Amount</th>
                                                    <th>PreMoneyValuation</th>
                                                    <th>PostMoneyValuation</th>
                                                    <th>Investing Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                          $ai = $this->db->get('angel_investor',array('startup_id'=>$startup->id))->result();
                                          $i=1;
                                          foreach($ai as $a)
                                          {
                                             
                                        ?>
                                                <tr>
                                                    <td><?=$i;?></td>

                                                    <td><?=$a->investor_name;?></td>
                                                    <td><?=$a->investor_background;?></td>
                                                    <td><?=$a->amount;?></td>
                                                    <th><?=$a->pre_money;?></th>
                                                    <th><?=$a->post_money;?></th>
                                                    <td><?=$a->investing_date;?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>


                                        <hr />

                                        <h3>Revenue Details</h3>
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>

                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Revenue</th>
                                                    <th>Net Profit</th>
                                                    <th>Net Expense</th>
                                                    <th>New Customer Reach</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                          $rev = $this->db->get('startup_revenue',array('startup_id'=>$startup->id))->result();
                                          $i=1;
                                          foreach($rev as $r)
                                          {
                                            
                                        ?>
                                                <tr>
                                                    <td><?=$i;?></td>

                                                    <td><?=$r->year;?></td>
                                                    <td><?=$r->month;?></td>
                                                    <td><?=$r->total_revenue;?></td>
                                                    <th><?=$r->net_profit;?></th>
                                                    <th><?=$r->net_expenses;?></th>
                                                    <td><?=$r->new_customer;?></td>
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                        </table>

                                    </div>


                                    <div class="tab-pane pt-3 fade" id="startup_team">
                                        <h3>Team</h3>

                                        <div class="row">
                                            <?php 
                                      $teams = $this->db->get_where('team_member',array('startup_id'=>$startup->id,'delstatus'=>1))->result();
                                      foreach($teams as $t)
                                      {
                                     ?>

                                            <div class="col-md-3 text-center">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <img src="<?=base_url('uploads/team/').$t->profile;?>"
                                                            class="rounded-circle" width="100px" height="100px" />
                                                    </div>
                                                    <div class="card-body">
                                                        <h3><?=$t->name;?> ( <?=$t->role; ?> )</h3>
                                                        <p><i class="fa fa-phone"> </i> <?=$t->contact;?> <i
                                                                class="fa fa-envelope"> </i> <?=$t->email;?></p>

                                                        <p><b>Seat No:</b> <?=$t->seat_no;?></p>


                                                    </div>
                                                </div>

                                            </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                    <div class="tab-pane pt-3 fade" id="documents">
                                        <h3>Uploaded Documents</h3>
                                        <?php
                                          $upload = $this->db->get_where('startupupload',array('startupid'=>$startup->id))->row(); 
                                          if($upload)
                                          {
                                        ?>

                                        <table class="table table-bordered">
                                            <tr>
                                                <td>COI</td>
                                                <td>
                                                    <?php
                                                      if($upload->coi_files)
                                                      { 
                                                    ?>
                                                    <a href="<?=base_url('../').$upload->coi_files;?>"
                                                        class="btn btn-primary" target="_blank"><i
                                                            class="fa fa-download"></i></a>
                                                    <?php 
                                                      }else 
                                                      {
                                                        echo "Not Found";
                                                      }
                                                      ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>PAN</td>
                                                <td>
                                                    <?php 
                                                      if($upload->pan_files)
                                                      {
                                                    ?>
                                                    <a href="<?=base_url('../').$upload->pan_files;?>"
                                                        class="btn btn-primary" target="_blank"><i
                                                            class="fa fa-download"></i></a>
                                                    <?php 
                                                      }
                                                      else 
                                                      {
                                                         echo "Not Found";
                                                      }
                                                      ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>DPIIT Certificate</td>
                                                <td>
                                                    <?php
                                                     if($upload->dpiit_files)
                                                     { 
                                                    ?>
                                                    <a href="<?=base_url('../').$upload->dpiit_files;?>"
                                                        class="btn btn-primary" target="_blank"><i
                                                            class="fa fa-download"></i></a>
                                                    <?php 
                                                     }
                                                     else 
                                                     {
                                                       echo "Not Found";
                                                     }
                                                     ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>MSME Registration</td>
                                                <td>
                                                    <?php 
                                                     if($upload->msme_files)
                                                     {
                                                    ?>
                                                    <a href="<?=base_url('../').$upload->msme_files;?>"
                                                        class="btn btn-primary" target="_blank"><i
                                                            class="fa fa-download"></i></a>
                                                    <?php 
                                                     }
                                                     else 
                                                     {
                                                        echo "Not Found";
                                                     }
                                                     ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Incubation Document</td>
                                                <td>
                                                    <?php 
                                                      if($upload->incubation_files)
                                                      {
                                                    ?>
                                                    <a href="<?=base_url('../').$upload->incubation_files;?>"
                                                        class="btn btn-primary" target="_blank"><i
                                                            class="fa fa-download"></i></a>
                                                    <?php 
                                                      }
                                                      else 
                                                      {
                                                        echo "Not Found";
                                                      }
                                                      ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php
                                          }
                                          else 
                                          {
                                            echo "<p>No Data Available</p>";
                                          } 
                                        ?>


                                    </div>
                                    <div class="tab-pane fade" id="startup_kra">
                                        <?php 
                                              
                                          
                                          $sid = $startup->id;

                                          
                                          $startup = $this->db->Query('select * from startup where id='.$sid)->row();
                                          $kra_round = $this->db->Query('select * from set_kra where startupid='.$sid)->result();
                                          foreach($kra_round as $kra)
                                          {
                                          ?>

                                        <table class="table table-bordered">
                                            <tr>
                                                <td colspan="2">
                                                    <h1><?=@$startup->startup_name;?></h1>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h4><?=@$kra->title;?></h4>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>Current Stage</td>
                                                <td><?= strtoupper(str_replace("_"," ",@$startup->stage));?></td>
                                            </tr>
                                            <tr>
                                                <td>Start Date</td>
                                                <td><?=@$kra->start_date;?></td>
                                            </tr>
                                            <tr>
                                                <td>End Date</td>
                                                <td><?=@$kra->end_date;?></td>
                                            </tr>
                                            <tr>
                                                <td>Review Date</td>
                                                <td><?=@$kra->review_date;?></td>
                                            </tr>
                                            <tr>
                                                <td>Remark</td>
                                                <td><?=@$kra->remark;?></td>
                                            </tr>
                                            <tr>
                                                <td>Reviewed Date</td>
                                                <td><?=@$kra->reviewed_date;?></td>
                                            </tr>
                                            <tr>
                                                <td>Reviewer Comment</td>
                                                <td><?=@$kra->review_comment;?></td>
                                            </tr>
                                            <tr>
                                                <td>Review By</td>
                                                <td><?=@$kra->review_by;?></td>
                                            </tr>
                                        </table>
                                        <h2 class="mt-4 mb-3">Task Assigned</h2>
                                        <table class="table">
                                            <tr class="bg-dark text-white">
                                                <th>Module Name</th>
                                                <th>Task Name</th>
                                                <th>Task Priority</th>

                                            </tr>
                                            <?php 
                                        $task = $this->db->Query("select * from kra_module_task where startupid='.$startupid->id.'")->result();
                                        
                                        
                                          foreach($task as $t)
                                          {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?=
                                                      $this->db->get_where('kra_module',array('id'=>$t->moduleid))->row()->module_name;
                                                    ?>
                                                </td>
                                                <td><?=@$t->task_name;?></td>
                                                <td><?=@$t->task_priority;?></td>


                                            </tr>


                                            <?php
                                          }     
                                        ?>
                                        </table>
                                        <?php 
                                          }
                                         ?>



                                    </div>
                                    <div class="tab-pane pt-3 fade" id="attendance">



                                        <?php 
                                if(isset($_POST['filter_attd']))
                                {
                                $month = $_POST['month'];
                                $year = $_POST['year'];
                                
                                $start_date = "01-".$month."-".$year;
                                $start_time = strtotime($start_date);
                                
                                $end_time = strtotime("+1 month", $start_time);
                                
                                for($i=$start_time; $i<$end_time; $i+=86400)
                                {
                                   $current_month[] = date('d-m-Y', $i);
                                }
                            }
                            else 
                            {
                                $month = date('m');
                                $year = date('Y');
                                
                                $start_date = "01-".$month."-".$year;
                                $start_time = strtotime($start_date);
                                
                                $end_time = strtotime("+1 month", $start_time);
                                
                                for($i=$start_time; $i<$end_time; $i+=86400)
                                {
                                   $current_month[] = date('d-m-Y', $i);
                                } 
                            }
                                
                                ?>

                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tblexport">
                                                <tr>
                                                    <th>Employee Name</th>
                                                    <?php
                          foreach($current_month as $cm)
                          { 
                        ?>
                                                    <th><?=$cm;?></th>
                                                    <?php
                          } 
                        ?>
                                                </tr>
                                                <?php
                     $s = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
                     
                    ?>
                                                <tr>
                                                    <td><?=$s->startup_name;?></td>
                                                    <?php
                          foreach($current_month as $cm)
                          { 
                              $status = $this->db->get_where('startup_attendance',array('startup_id'=>$s->id,'attd_date'=>$cm))->row();
                              if($status)
                              {
                                  if($status->status=="P")
                                  {
                                       $color = "green";
                                       $txt ="white";
                                  }
                                  if($status->status=="A")
                                  {
                                       $color = "red";
                                       $txt ="white";
                                  }
                             
                                  
                        ?>
                                                    <td style="color:<?=$txt;?>; background:<?=$color;?>;">
                                                        <?=$status->status;?>
                                                    </td>
                                                    <?php 
                                  
                                }
                                else {
                         ?>
                                                    <td style="background:skyblue;"> NA </td>
                                                    <?php
                                }
                          }
                        ?>
                                                </tr>




                                            </table>
                                        </div>



                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
        </main>

        <?=include('common/footer.php');?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables with Buttons
            var datatablesButtons = $("#datatables-buttons").DataTable({
                responsive: true,
                buttons: ["copy", "print"],
                fixedHeader: true,
                bPaginate: false,
                bInfo: false
            });
            datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
        });
        </script>