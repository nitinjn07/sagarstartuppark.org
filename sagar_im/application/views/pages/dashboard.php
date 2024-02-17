<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Spark Incubation Center Dashboard
                </h1>
                <p class="header-subtitle">Reports Updated Till : <?=date('d-m-Y');?></p>
            </div>

            <div class="row">


                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title"><a
                                                        href='<?=base_url();?>PendingApplication'>Pending
                                                        Applications</a></h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?=$this->db->get_where('startup',array('action'=>'pending','delstatus'=>1))->num_rows();?>
                                        </h1>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title"><a href='<?=base_url();?>WomenStartup'>Women
                                                        Founders</a></h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?=$this->db->get_where('startup',array('action'=>'accept','delstatus'=>1,'is_screened'=>1,'is_graduate'=>0,'is_women'=>1))->num_rows();?>
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title"><a
                                                        href='<?=base_url();?>PhysicalStartup'>Physically Incubated</a>
                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?=$this->db->get_where('startup',array('action'=>'accept','delstatus'=>1,'is_screened'=>1,'startup_type'=>'Physical','is_graduate'=>0))->num_rows();?>
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title"><a
                                                        href='<?=base_url();?>GraduatedStartup'>Graduated Startups</a>
                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?=$this->db->Query('SELECT * FROM startup WHERE is_graduate=1 && delstatus=1 && startup_type IN ("Physical","Virtual")')->num_rows();?>
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title"><a
                                                        href='<?=base_url();?>VirtualStartup'>Virtually Incubated</a>
                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?=$this->db->get_where('startup',array('action'=>'accept','delstatus'=>1,'is_screened'=>1,'startup_type'=>'Virtual','is_graduate'=>0))->num_rows();?>
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">
                                                    Attendance % in Headcount
                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                               $team_member = $this->db->get_where('team_member',array('delstatus'=>1))->num_rows();
                                              
                                               if($team_member)
                                               {
                                               $total = $team_member;                                              

                                               $member = $this->db->get_where('team_member',array('delstatus'=>1))->result();
                                                $sum=0;
                                               foreach($member as $m)
                                               {
                                                   $rs = $this->db->get_where('startup_attendance',array('seatno'=>$m->seat_no,'attd_date'=>date('d-m-Y',strtotime("-1 days")),'status'=>'P'))->num_rows();
                                                   if($rs>0)
                                                   {
                                                   $sum++;
                                                   }

                                               
                                                }

                                                echo floor(($sum/$total)*100);


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
                                                <h5 class="card-title">
                                                    Attendance % in Number of Startup
                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                              $startup=$this->db->get_where('startup',array('delstatus'=>1,'startup_type'=>'Physical','is_graduate'=>0))->result(); 
                                              $total_startup=$this->db->get_where('startup',array('delstatus'=>1,'startup_type'=>'Physical','is_graduate'=>0))->num_rows();
                                              if($total_startup)
                                              {
                                              $check=0;
                                              foreach($startup as $s)
                                              {
                                               
                                                  $no = $this->db->get_where('startup_attendance',array('attd_date'=>date('d-m-Y',strtotime("-1 days")),'startup_id'=>$s->id,'status'=>'P'))->num_rows();
                                                  if($no>0)
                                                  {
                                                    $check++;
                                                  }
                                                }
                                            echo ceil(($check /$total_startup)*100);
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
                                                <h5 class="card-title">
                                                    <a href="<?=base_url();?>StartupLoginHistory">Startup Day Logged In
                                                        Today</a>
                                                    <?php
                                                  
                                                   
                                                   
                                                   
                                                    $pre =$this->db->get_where('startup_login_history',array('login_date'=>date('d-m-Y')))->num_rows();
                                                 
                                                   
                                                    
                                                  
                                                    ?>
                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                             echo @$pre;
                                             
                                             
                                          
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
                                                <h5 class="card-title">
                                                    <a href="<?=base_url();?>MentorList" target="_blank"> Total
                                                        Mentors</a>

                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                             echo @$this->db->get_where('mentor',array('delstatus'=>1,'action'=>'accepted'))->num_rows();
                                          
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
                                                <h5 class="card-title">
                                                    <a href="<?=base_url();?>JobOpeningList" target="_blank"> Total
                                                        Job Created</a>

                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                             echo @$this->db->get_where('job_listing',array('delstatus'=>1))->num_rows();
                                          
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
                                                <h5 class="card-title">
                                                    <a href="<?=base_url();?>SetKRA#kralist" target="_blank">Total KRA
                                                        Created</a>

                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                             echo @$this->db->get_where('set_kra',array('delstatus'=>1))->num_rows();
                                          
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
                                                <h5 class="card-title">
                                                    <a href="<?=base_url();?>MeetingRequest" target="_blank">Total
                                                        Pending -Meeting Request</a>

                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                             echo @$this->db->get_where('mentor_connect',array('status'=>'pending'))->num_rows();
                                          
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
                                                <h5 class="card-title">
                                                    <a href="<?=base_url();?>JobOpeningList" target="_blank">Total Job
                                                        Listed</a>

                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                             echo @$this->db->get_where('job_listing',array('status'=>'approved'))->num_rows();
                                          
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
                                                <h5 class="card-title">
                                                    <a href="<?=base_url();?>KraModule/KraModuleTask"
                                                        target="_blank">Product Backlog Created</a>

                                                </h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar">
                                                    <div class="avatar-title rounded-circle bg-primary-dark">
                                                        <i class="fa fa-rocket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="display-5 mt-1 mb-3">
                                            <?php
                                             echo @$this->db->Query('select distinct(startupid) from kra_module_task')->num_rows();
                                          
                                            ?>


                                        </h1>

                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Startup Graph Stage wise</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="align-self-center chart chart-lg">
                                            <canvas id="chartjs-dashboard-bar"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Startup Graph Sector wise</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart chart-xs">
                                            <canvas id="chartjs-dashboard-pie"></canvas>
                                        </div>
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fas fa-circle text-primary fa-fw"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Healthcare">
                                                            Healthcare
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$health;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle text-warning fa-fw"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Agriculture">
                                                            Agriculture
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$agri;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle text-danger fa-fw"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Information_Technology">
                                                            Information Technology
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$it;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle text-info fa-fw"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Citizen_Services">
                                                            Citizen Services
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$cs;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle text-success fa-fw"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Social_welfare_and_development">
                                                            Social welfare and development
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$sw;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle text-primary fa-fw"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Transportation">
                                                            Transportation
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$trans;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle fa-fw" style="color:purple;"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Legal_Services">
                                                            Legal Services
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$legal;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle  fa-fw" style="color:brown;"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Technical_Services">
                                                            Technical Services
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$technical;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle  fa-fw" style="color:indigo;"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Marketing_and_Advertising">
                                                            Marketing and Advertising
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$marketing;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle  fa-fw" style="color:cyan;"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Food_and_Beverage">
                                                            Food and Beverage
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$food;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle  fa-fw" style="color:magenta;"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Commercial">
                                                            Commercial
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$commercial;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle  fa-fw" style="color:pink;"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Import_and_Export">
                                                            Import and Export
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$import;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle  fa-fw" style="color:grape;"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=HR_Services">
                                                            HR Services
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$hr;?></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-circle text-muted fa-fw"></i>
                                                        <a
                                                            href="<?= base_url(); ?>SectorWiseStartup?verticals_sectors=Other">
                                                            Other
                                                        </a>
                                                    </td>
                                                    <td class="text-end"><?= @$others;?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                            </div>
                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-header">
                                        <h3>Top Startup Revenue -<?=date('d-m-Y');?></h3>
                                    </div>
                                    <div class="card-body">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>Startup Name</th>
                                                    <th>Total Revenue</th>
                                                    <th>Net Profit</th>
                                                    <th>Net Expense</th>
                                                    <th>New Customer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                  $startup=$this->db->get_where('startup',array('delstatus'=>1,'startup_type'=>'Physical','is_graduate'=>0))->result(); 
                                                  $i=1;
                                                   
                                                  foreach($startup as $s)
                                                  {
                                                     $total = $this->db->get_where('startup_revenue',array('startup_id'=>$s->id))->result();
                                                     $total_revenue = 0;
                                                     $total_profit = 0;
                                                     $total_exp=0;
                                                     $total_customer=0;
                                                     foreach($total as $t)
                                                     {
                                                         $total_revenue=$total_revenue+ (int)$t->total_revenue;
                                                         $total_profit =$total_profit+ (int)$t->net_profit;
                                                         $total_exp = $total_exp+ (int)$t->net_expenses;
                                                         $total_customer =$total_customer+ (int)$t->new_customer;
                                                     }
                                                     
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$s->startup_name;?></td>
                                                    <td><?= "".number_format($total_revenue);?></td>
                                                    <td><?= "".number_format($total_profit);?></td>
                                                    <td><?= "₹".number_format($total_exp);?></td>
                                                    <td><?=$total_customer;?></td>
                                                </tr>
                                                <?php 
                                                     
                                                $i++;
                                                  }
                                                ?>
                                            </tbody>
                                        </table>

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