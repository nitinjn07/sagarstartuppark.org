<?php 
 $email = $_SESSION['username']; 
 $startup = $this->db->get_where('startup',array('email'=>$email))->row();
?>
<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="<?=base_url('dashboard');?>">
        <img src="<?=base_url('../assets/img/implus.png');?>" width="200px" />
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <?php 
               if($startup->logo!="")
               {
            ?>
            <img src="<?=base_url('../uploads/logo/').$startup->logo;?>" class="img-fluid rounded-circle mb-2"
                alt="<?=$startup->startup_name;?>" />
            <?php }else {
            ?>
            <img src="<?=base_url('assets/img/startuplogo.png'); ?>" class="img-fluid rounded-circle mb-2"
                alt="<?=$startup->startup_name;?>" />
            <?php
                    
                } ?>

            <h3><?=$startup->startup_name;?></h3>
        </div>

        <ul class="sidebar-nav">



            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url();?>Dashboard">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#auth1" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-user"></i> <span class="align-middle">Profile</span>
                </a>
                <ul id="auth1" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Dashboard/editProfile">Update
                            Profile</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>Dashboard/StartupProfile">View
                            Profile</a>
                    </li>




                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#services" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Services</span>
                </a>
                <ul id="services" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>ServiceDetails/Services">Startup Services
                        </a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ServiceRequestList">
                            Services Requested</a>
                    </li>





                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#attd" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-user"></i> <span class="align-middle">Attendance</span>
                </a>
                <ul id="attd" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Attendance">Attendance
                            Report</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#auth2" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-group text-dark"></i> <span class="align-middle">Team
                        Details</span>
                </a>
                <ul id="auth2" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Team">
                            Add Team Member</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>TeamList">
                            Team List</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#job" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-user text-info"></i> <span class="align-middle">Job
                        Posting</span>
                </a>
                <ul id="job" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>JobOpening">
                            New Job Posting</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>JobOpeningList">
                            Job Listing</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>AppliedCandidate">
                            Job Leads</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#mentor" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-handshake-o text-primary"></i> <span
                        class="align-middle">Mentor
                        Connect</span>
                </a>
                <ul id="mentor" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MentorConnect">
                            Schedule Meeting</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>MentorConnect/getMeetingList">
                            Meeting List</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>MentorConnect/MentorRequested">
                            New Mentor Requested</a>
                    </li>
                </ul>
            </li>


            <li class="sidebar-item">
                <a data-bs-target="#conference" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-video text-warning"></i> <span
                        class="align-middle">Conference Room
                        Booking</span>
                </a>
                <ul id="conference" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>ConferenceBookingRequest">
                            Request Booking</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>ConferenceBookingRequest/BookingHistory">
                            Booking History</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#media" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-video text-warning"></i> <span class="align-middle">Media
                        Room</span>
                </a>
                <ul id="media" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>MediaRoomBooking">
                            Request Booking</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link"
                            href="<?=base_url();?>MediaRoomBooking/MediaBookingList">
                            Booking History</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#jobposting" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Job Posting</span>
                </a>
                <ul id="jobposting" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>JobOpening">New Job Post</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>JobOpeningList">Posted
                            Joblist</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>JobApplicationList">
                            Job Application Recieved</a>
                    </li>


                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#mvp" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-rocket text-info"></i> <span class="align-middle">MVP
                        Launch</span>
                </a>
                <ul id="mvp" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>LaunchMVP">
                            New MVP</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>LaunchMVP/MVPList">
                            MVP List</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>LaunchMVP/UploadCustomer">
                            Upload Customer</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#resources" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list text-info"></i> <span class="align-middle">
                        Resources
                    </span>
                </a>
                <ul id="resources" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Resources/ResourcesList">
                            Resources List</a>
                    </li>


                </ul>
            </li>
            <li class="sidebar-item">
                <a href="<?=base_url();?>StartupMetrics" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-info text-danger"></i> <span class="align-middle">Startup
                        Metrics</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="<?=base_url();?>TemplateList" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-file text-success"></i> <span
                        class="align-middle">Downloadable Documents/Templates</span>
                </a>

            </li>
            <li class="sidebar-item">
                <a href="<?=base_url();?>VideoList" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-video text-dark"></i> <span class="align-middle">Startup
                        Sessions</span>
                </a>

            </li>
            <li class="sidebar-item">
                <a href="<?=base_url();?>CoFounderSearch" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-search text-warning"></i> <span
                        class="align-middle">Co-Founder
                        Search</span>
                </a>

            </li>
            <li class="sidebar-item">
                <a href="<?=base_url();?>Event" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-list text-danger"></i> <span class="align-middle">Upcoming
                        Events</span>
                </a>

            </li>
            <li class="sidebar-item">
                <a href="<?=base_url();?>ComplaintAndSuggestion" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-list text-danger"></i> <span
                        class="align-middle">Complaint/Suggestion</span>
                </a>

            </li>
            <li class="sidebar-item">
                <a data-bs-target="#publicprofile" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Public Profile</span>
                </a>
                <ul id="publicprofile" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>StartupPublic">Public
                            Profile</a>
                    </li>



                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#scheme" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Schemes/Policy</span>
                </a>
                <ul id="scheme" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="<?=base_url();?>Scheme">Scheme
                            List</a>
                    </li>



                </ul>
            </li>
            <li class="sidebar-item">
                <?php
              
                $username = $_SESSION['username'];
                $password = $startup->mobile;
                $u = base64_encode($username);
                $p = base64_encode($password);
                ?>
                <a href="<?=base_url('../../');?>business_model?uid=<?=$u;?>&&auth=<?=$p;?>"
                    class="sidebar-link collapsed bg-warning text-white" target="_blank">
                    <i class="align-middle me-2 fas fa-fw fa-list"></i> <span class="align-middle">Business Model</span>
                </a>

            </li>

            <li class="sidebar-item">
                <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle me-2 fas fa-fw fa-gear"></i> <span class="align-middle">Basic
                        Setting</span>
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?=base_url();?>Dashboard/password">
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



        </ul>
    </div>
</nav>