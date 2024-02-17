<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="<?=base_url('dashboard');?>">
        <img src="<?=base_url('assets/img/implus.png');?>" width="100px" />

    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="<?=base_url('assets/');?>img/user.png" class="mb-2" alt="Linda Miller" />
            <!-- <div class="fw-bold">JIC</div>
            <small>Jabalpur Smart City Limited</small> -->
        </div>

        <ul class="sidebar-nav">
            <?php
              $rcheck = $this->db->get_where('role_permission',array('id'=>$_SESSION['rolid']))->row(); 
            ?>


            <?php include('get_startup_count.php'); ?>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url();?>Dashboard">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <?php 
              if($rcheck->startup_data!=3 OR $rcheck->startup_data==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#startupdata" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-rocket"></i> <span class="align-middle">Startup
                        Data</span>
                </a>

                <ul id="startupdata" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>PendingApplication">Pending
                            Application <span class="sidebar-badge badge rounded-pill bg-primary">
                                <?=$pending ?></span></a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>AcceptedApplication">Accepted
                            Startup <span class="sidebar-badge badge rounded-pill bg-primary"> <?=$accept ?></span></a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>PhysicalStartup">Physical
                            Startup <span class="sidebar-badge badge rounded-pill bg-primary">
                                <?=$physical; ?></span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>GraduatedStartup">Physical
                            Graduated
                            <span class="sidebar-badge badge rounded-pill bg-primary">
                                <?=$physical_graduate; ?></span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>VirtualStartup">Virtual
                            Startup <span class="sidebar-badge badge rounded-pill bg-primary">
                                <?=$virtual; ?></span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>VirtualGraduate">Virtual
                            Graduate <span class="sidebar-badge badge rounded-pill bg-primary">
                                <?=$virtual_graduate; ?></span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>WomenStartup">Women Startup
                            <span class="sidebar-badge badge rounded-pill bg-primary"> <?=$women; ?></span></a></li>

                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>RejectedStartup">Rejected
                            Startup <span class="sidebar-badge badge rounded-pill bg-primary"> <?=$reject; ?></span></a>
                    </li>


                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>Dashboard/ViewStartupProfile">Startup
                            Profile </a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>StartupLoginHistory">Startup
                            Login History </a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>ArohiniRegistration">Arohini Registrations</a>
                    </li>

                </ul>
            </li>
            <?php 
              }
            ?>

            <!-- Funding -->
            <?php 
              if($rcheck->funding!=3 OR $rcheck->funding==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#funding" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-rupee"></i> <span class="align-middle">Funding</span>
                </a>
                <ul id="funding" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>Funding/Bootstrap">Bootstrap</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Funding/SeedFunding">Seed
                            Funding</a> </li>

                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Funding/VCFunding">VC
                            Funding</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Funding/AngelFunding">Angel
                            Funding</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <!-- Revenue -->
            <?php 
              if($rcheck->revenue!=3 OR $rcheck->revenue==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#revenue" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-rupee"></i> <span class="align-middle">Revenue</span>
                </a>
                <ul id="revenue" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Revenue">Monthly
                            Revenue</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <!-- Startup Exit -->
            <?php 
              if($rcheck->startup_exit!=3 OR $rcheck->startup_exit==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#startupexit" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-external-link-square"></i> <span
                        class="align-middle">Startup
                        Exit</span>
                </a>
                <ul id="startupexit" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ExitStartup">Graduate the
                            Startup</a>
                    </li>




                </ul>
            </li>
            <?php } ?>
            <!-- Startup Swapping -->
            <?php 
              if($rcheck->startup_swapping!=3 OR $rcheck->startup_swapping==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#startuptype" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-external-link-square"></i> <span
                        class="align-middle">Physical/Virtual Startup</span>
                </a>
                <ul id="startuptype" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ChangeStartupType">Update
                            Startup
                            Type</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <!-- Screening -->
            <?php 
              if($rcheck->startup_screening!=3 OR $rcheck->startup_screening==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#screening" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-eye"></i> <span class="align-middle">Startup
                        Screening</span>
                </a>
                <ul id="screening" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Screening">Add Member</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MemberList">Member List</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>Screening/ScheduleScreening">Schedule
                            Screening</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>SchedulingList">Screening
                            History</a>
                    </li>



                </ul>
            </li>
            <?php } ?>
            <!-- On Boarding -->
            <?php 
              if($rcheck->seat_onboarding!=3 OR $rcheck->seat_onboarding==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#seats" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-sign-in"></i> <span class="align-middle">Seats /
                        Onboarding</span>
                </a>
                <ul id="seats" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>OnBoarding">Allocate Seat</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>AllottedList">Allotted
                            List </a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>SeatMap">SeatMap</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <!-- Team -->
            <?php 
              if($rcheck->startup_team!=3 OR $rcheck->startup_team==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#team" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-group"></i> <span class="align-middle">Startup Team</span>
                </a>
                <ul id="team" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Team">Add Team
                            Member</a>
                    </li>




                </ul>
            </li>
            <?php } ?>
            <!-- Attendance -->

            <?php 
              if($rcheck->attendance!=3 OR $rcheck->attendance==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#attendance" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-calendar-check-o"></i> <span
                        class="align-middle">Attendance</span>
                </a>
                <ul id="attendance" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <!--<li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Attendance">Punch-->
                    <!--        Attendance</a>-->
                    <!--</li>-->
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Attendance">Upload
                            Attendance</a>
                    </li>


                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>Attendance/attendance_report">Attendance Report</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <!-- KRA -->
            <?php 
              if($rcheck->kra!=3 OR $rcheck->kra==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#kra" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-road"></i> <span class="align-middle">KRA</span>
                </a>
                <ul id="kra" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>KraModule">KRA Module</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>KraModule/KraModuleTask">KRA
                            Task
                            Backlog</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>SetKRA">Set KRA</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>KraReview">KRA Review</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <?php 
              if($rcheck->stage_upgrade!=3 OR $rcheck->stage_upgrade==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#stageupgrade" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-road"></i> <span class="align-middle">Stage Upgrade</span>
                </a>
                <ul id="stageupgrade" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>StageUpgrade">Upgrade Now</a>
                    </li>



                </ul>
            </li>
            <?php } ?>
            <!-- Document -->
            <?php 
              if($rcheck->startup_document!=3 OR $rcheck->startup_document==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#updates" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-upload"></i> <span class="align-middle">Startup
                        Documents</span>
                </a>
                <ul id="updates" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>UploadDocument">Upload
                            Document</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>UploadedList">Uploaded
                            List</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- Mentor Connect -->
            <?php 
              if($rcheck->mentor_connect!=3 OR $rcheck->mentor_connect==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#meeting" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-graduation-cap"></i> <span class="align-middle">Mentor
                        Connect</span>
                </a>
                <ul id="meeting" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MeetingRequest">Meeting
                            Request</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>NewMentorRequest">New Mentor
                            Request</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MeetingHistory">Meeting
                            History</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <!-- Mentor Data -->
            <?php 
              if($rcheck->mentor_data!=3 OR $rcheck->mentor_data==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#mentors" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-user"></i> <span class="align-middle">Mentors
                        Data</span>
                </a>
                <ul id="mentors" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Mentor">Add Mentor</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MentorList">Mentor List</a>
                    </li>
                </ul>
            </li>
            <?php } ?>

            <!-- Investor Data -->
            <?php 
              if($rcheck->investor_data!=3 OR $rcheck->investor_data==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#investor" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-coins"></i> <span class="align-middle">Investor
                        Data</span>
                </a>
                <ul id="investor" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Investor">Add Investor</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>InvestorList">Investor
                            List</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <!-- Partner Data -->
            <?php 
              if($rcheck->partner!=3 OR $rcheck->partner==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#partner" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-hands"></i> <span class="align-middle">Partners</span>
                </a>
                <ul id="partner" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Partner">New Partner</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>PartnerList">Partner List</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- MOU -->
            <?php 
              if($rcheck->mou!=3 OR $rcheck->mou==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#mou" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-hands"></i> <span class="align-middle">MoU's</span>
                </a>
                <ul id="mou" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MoU">New MoU</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MoUList">MoU List</a></li>

                </ul>
            </li>
            <?php } ?>
            <!-- Online COurse -->
            <?php 
              if($rcheck->online_courses!=3 OR $rcheck->online_courses==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#course" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-video"></i> <span class="align-middle">Online
                        Courses</span>
                </a>
                <ul id="course" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ManageCategory">Manage
                            Category</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ManageVideo">Manage Video</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ManageVideoList">Video
                            List</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- Tempalate Download -->
            <?php 
              if($rcheck->template_download!=3 OR $rcheck->template_download==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#template" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-file"></i> <span class="align-middle">Template
                        Download</span>
                </a>
                <ul id="template" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>TemplateCategory">Template
                            Category</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>TemplateList">Add
                            Template</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <!-- Startup Services -->
            <?php 
              if($rcheck->startup_servies!=3 OR $rcheck->startup_servies==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#services" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Startup
                        Services</span>
                </a>
                <ul id="services" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Services">Add New
                            Service</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>Services/ServiceRequest">Service
                            Request</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <!-- Jobs -->
            <?php 
              if($rcheck->job!=3 OR $rcheck->job==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#jobs" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Jobs</span>
                </a>
                <ul id="jobs" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <!-- <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>JobOpening">Add New Job
                            Listing</a>
                    </li> -->
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>JobOpeningList">Job
                            Listing</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>AppliedCandidate">Applied</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <!-- Co Founder -->
            <?php 
              if($rcheck->cofounder!=3 OR $rcheck->cofounder==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#cofounder" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Co-Founder
                        Request</span>
                </a>
                <ul id="cofounder" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>CoFounder">RequestList</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- Booking Request -->
            <?php 
              if($rcheck->booking_request!=3 OR $rcheck->booking_request==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#booking" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Booking
                        Request</span>
                </a>
                <ul id="booking" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Booking">Conference</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Booking/MediaRoom">Media
                            Room</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <!-- Events -->
            <?php 
              if($rcheck->events!=3 OR $rcheck->events==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#event" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Upcoming Events
                    </span>
                </a>
                <ul id="event" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Event">New Event</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Event/eventlist">Event
                            List</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <!-- Software Resources -->
            <?php 
              if($rcheck->resources!=3 OR $rcheck->resources==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#resource" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Software
                        Resource</span>
                </a>
                <ul id="resource" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Resources/Category">
                            Resource Category</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Resources">
                            Add Resource</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- Scheme Policy -->
            <?php 
              if($rcheck->scheme_policy!=3 OR $rcheck->scheme_policy==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#scheme" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Scheme /
                        Policy</span>
                </a>
                <ul id="scheme" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">

                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Scheme">
                            Scheme & Policy List</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- Complain Suggesion -->
            <?php 
              if($rcheck->complain_suggesion!=3 OR $rcheck->complain_suggesion==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#complain" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span
                        class="align-middle">Complaint/Suggestion</span>
                </a>
                <ul id="complain" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ComplaintList">Latest
                            Complaint/Suggestion</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- Role -->
            <?php 
              if($rcheck->user_role!=3 OR $rcheck->user_role==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#role" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-user"></i> <span class="align-middle">Users/Role</span>
                </a>
                <ul id="role" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Users/role">Create Role</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Users">User Permission</a>
                    </li>

                </ul>
            </li>
            <?php } ?>
            <!-- Setting -->
            <?php 
              if($rcheck->setting!=3 OR $rcheck->setting==1)
              {
            ?>
            <li class="sidebar-item">
                <a data-bs-target="#setting" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-gear"></i> <span class="align-middle">Basic
                        Setting</span>
                </a>
                <ul id="setting" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?=base_url();?>ChangePassword">
                            <i class="align-middle me-2 fas fa-fw fa-lock"></i> <span class="align-middle">Change
                                Password</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?=base_url();?>Home/logout">
                            <i class="align-middle me-2 fas fa-fw fa-lock"></i> <span class="align-middle">Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php } ?>



        </ul>
    </div>
</nav>