<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Users & Role
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-5">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                 if(isset($_GET['id']))
                                 {
                                    $role= $this->db->get_where('role_permission',array('id'=>$_GET['id']))->row();
                                 ?>
                                <!-- Edit Form -->

                                <form action="<?=base_url();?>Users/UpdateRole" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="rolid" value="<?=$role->id;?>" />
                                        <label for="" class="py-2">Role Name</label>
                                        <input type="text" class="form-control" value="<?=$role->role_name;?>"
                                            name="role_name" placeholder="Role Name" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="py-2">Allow Permissions</label>
                                        <table class="table">
                                            <tr>
                                                <th>Module Name</th>
                                                <th>Permission</th>

                                            </tr>
                                            <tr>
                                                <td>Startup Data</td>
                                                <td>
                                                    <input type="radio" value='1' name='startup_module'
                                                        <?php if($role->startup_data==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='startup_module'
                                                        <?php if($role->startup_data==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='startup_module'
                                                        <?php if($role->startup_data==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Funding</td>
                                                <td>
                                                    <input type="radio" value='1' name='funding'
                                                        <?php if($role->funding==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='funding'
                                                        <?php if($role->funding==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='funding'
                                                        <?php if($role->funding==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Revenue</td>
                                                <td>
                                                    <input type="radio" value='1' name='revenue'
                                                        <?php if($role->revenue==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='revenue'
                                                        <?php if($role->revenue==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='revenue'
                                                        <?php if($role->revenue==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Exit</td>
                                                <td>
                                                    <input type="radio" value='1' name='startup_exit'
                                                        <?php if($role->startup_exit==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='startup_exit'
                                                        <?php if($role->startup_exit==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='startup_exit'
                                                        <?php if($role->startup_exit==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Swapping (Physical/Virtual)</td>
                                                <td>
                                                    <input type="radio" value='1' name='swapping'
                                                        <?php if($role->startup_swapping==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='swapping'
                                                        <?php if($role->startup_swapping==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='swapping'
                                                        <?php if($role->startup_swapping==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Screening</td>
                                                <td>
                                                    <input type="radio" value='1' name='screening'
                                                        <?php if($role->startup_screening==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='screening'
                                                        <?php if($role->startup_screening==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='screening'
                                                        <?php if($role->startup_screening==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Seat Onboarding</td>
                                                <td>
                                                    <input type="radio" value='1' name='onboarding'
                                                        <?php if($role->seat_onboarding==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='onboarding'
                                                        <?php if($role->seat_onboarding==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='onboarding'
                                                        <?php if($role->seat_onboarding==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Team</td>
                                                <td>
                                                    <input type="radio" value='1' name='team'
                                                        <?php if($role->startup_team==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='team'
                                                        <?php if($role->startup_team==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='team'
                                                        <?php if($role->startup_team==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Attendance</td>
                                                <td>
                                                    <input type="radio" value='1' name='attendance'
                                                        <?php if($role->attendance==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='attendance'
                                                        <?php if($role->attendance==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='attendance'
                                                        <?php if($role->attendance==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KRA</td>
                                                <td>
                                                    <input type="radio" value='1' name='kra'
                                                        <?php if($role->kra==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='kra'
                                                        <?php if($role->kra==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='kra'
                                                        <?php if($role->kra==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Stage Upgrade</td>
                                                <td>
                                                    <input type="radio" value='1' name='stage_upgrade'
                                                        <?php if($role->stage_upgrade==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='stage_upgrade'
                                                        <?php if($role->stage_upgrade==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='stage_upgrade'
                                                        <?php if($role->stage_upgrade==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Document</td>
                                                <td>
                                                    <input type="radio" value='1' name='startup_document'
                                                        <?php if($role->startup_document==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='startup_document'
                                                        <?php if($role->startup_document==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='startup_document'
                                                        <?php if($role->startup_document==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mentor Data</td>
                                                <td>
                                                    <input type="radio" value='1' name='mentor_data'
                                                        <?php if($role->mentor_data==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='mentor_data'
                                                        <?php if($role->mentor_data==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='mentor_data'
                                                        <?php if($role->mentor_data==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mentor Connect</td>
                                                <td>
                                                    <input type="radio" value='1' name='mentor_connect'
                                                        <?php if($role->mentor_connect==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='mentor_connect'
                                                        <?php if($role->mentor_connect==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='mentor_connect'
                                                        <?php if($role->mentor_connect==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Investor Data</td>
                                                <td>
                                                    <input type="radio" value='1' name='investor'
                                                        <?php if($role->investor_data==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='investor'
                                                        <?php if($role->investor_data==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='investor'
                                                        <?php if($role->investor_data==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Partners</td>
                                                <td>
                                                    <input type="radio" value='1' name='partner'
                                                        <?php if($role->partner==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='partner'
                                                        <?php if($role->partner==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='partner'
                                                        <?php if($role->partner==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>MoU</td>
                                                <td>
                                                    <input type="radio" value='1' name='mou'
                                                        <?php if($role->mou==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='mou'
                                                        <?php if($role->mou==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='mou'
                                                        <?php if($role->mou==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Online Courses</td>
                                                <td>
                                                    <input type="radio" value='1' name='courses'
                                                        <?php if($role->online_courses==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='courses'
                                                        <?php if($role->online_courses==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='courses'
                                                        <?php if($role->online_courses==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Template Download</td>
                                                <td>
                                                    <input type="radio" value='1' name='template'
                                                        <?php if($role->template_download==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='template'
                                                        <?php if($role->template_download==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='template'
                                                        <?php if($role->template_download==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Services</td>
                                                <td>
                                                    <input type="radio" value='1' name='services'
                                                        <?php if($role->startup_servies==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='services'
                                                        <?php if($role->startup_servies==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='services'
                                                        <?php if($role->startup_servies==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>Jobs</td>
                                                <td>
                                                    <input type="radio" value='1' name='jobs'
                                                        <?php if($role->job==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='jobs'
                                                        <?php if($role->job==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='jobs'
                                                        <?php if($role->job==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Co-Founder</td>
                                                <td>
                                                    <input type="radio" value='1' name='cofounder'
                                                        <?php if($role->cofounder==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='cofounder'
                                                        <?php if($role->cofounder==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='cofounder'
                                                        <?php if($role->cofounder==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Booking Request</td>
                                                <td>
                                                    <input type="radio" value='1' name='booking'
                                                        <?php if($role->booking_request==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='booking'
                                                        <?php if($role->booking_request==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='booking'
                                                        <?php if($role->booking_request==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Events</td>
                                                <td>
                                                    <input type="radio" value='1' name='events'
                                                        <?php if($role->events==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='events'
                                                        <?php if($role->events==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='events'
                                                        <?php if($role->events==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Resources</td>
                                                <td>
                                                    <input type="radio" value='1' name='resources'
                                                        <?php if($role->resources==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='resources'
                                                        <?php if($role->resources==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='resources'
                                                        <?php if($role->resources==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scheme /Policy</td>
                                                <td>
                                                    <input type="radio" value='1' name='schemepolicy'
                                                        <?php if($role->scheme_policy==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='schemepolicy'
                                                        <?php if($role->scheme_policy==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='schemepolicy'
                                                        <?php if($role->scheme_policy==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Complain/Suggestion</td>
                                                <td>
                                                    <input type="radio" value='1' name='complain'
                                                        <?php if($role->complain_suggesion==1){echo "checked";}?> />
                                                    Readonly
                                                    <input type="radio" value='2' name='complain'
                                                        <?php if($role->complain_suggesion==2){echo "checked";}?> />
                                                    Read/Write
                                                    <input type="radio" value='3' name='complain'
                                                        <?php if($role->complain_suggesion==3){echo "checked";}?> />
                                                    Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>UserRole</td>
                                                <td>
                                                    <input type="radio" value='1' name='userrole'
                                                        <?php if($role->user_role==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='userrole'
                                                        <?php if($role->user_role==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='userrole'
                                                        <?php if($role->user_role==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Setting</td>
                                                <td>
                                                    <input type="radio" value='1' name='setting'
                                                        <?php if($role->setting==1){echo "checked";}?> /> Readonly
                                                    <input type="radio" value='2' name='setting'
                                                        <?php if($role->setting==2){echo "checked";}?> /> Read/Write
                                                    <input type="radio" value='3' name='setting'
                                                        <?php if($role->setting==3){echo "checked";}?> /> Hide
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" class="btn btn-primary" value="Update" />
                                    </div>






                                </form>
                                <!-- End of Edit Form -->

                                <?php

                                 }
                                 else 
                                 { 
                                ?>
                                <form action="<?=base_url();?>Users/SaveRole" method="post">
                                    <div class="form-group">
                                        <label for="" class="py-2">Role Name</label>
                                        <input type="text" class="form-control" name="role_name" placeholder="Role Name"
                                            required />
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="py-2">Allow Permissions</label>
                                        <table class="table">
                                            <tr>
                                                <th>Module Name</th>
                                                <th>Permission</th>

                                            </tr>
                                            <tr>
                                                <td>Startup Data</td>
                                                <td>
                                                    <input type="radio" value='1' name='startup_module' /> Readonly
                                                    <input type="radio" value='2' name='startup_module' /> Read/Write
                                                    <input type="radio" value='3' name='startup_module' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Funding</td>
                                                <td>
                                                    <input type="radio" value='1' name='funding' /> Readonly
                                                    <input type="radio" value='2' name='funding' /> Read/Write
                                                    <input type="radio" value='3' name='funding' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Revenue</td>
                                                <td>
                                                    <input type="radio" value='1' name='revenue' /> Readonly
                                                    <input type="radio" value='2' name='revenue' /> Read/Write
                                                    <input type="radio" value='3' name='revenue' /> Hide
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Startup Exit</td>
                                                <td>
                                                    <input type="radio" value='1' name='startup_exit' /> Readonly
                                                    <input type="radio" value='2' name='startup_exit' /> Read/Write
                                                    <input type="radio" value='3' name='startup_exit' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Swapping (Physical/Virtual)</td>
                                                <td>
                                                    <input type="radio" value='1' name='swapping' /> Readonly
                                                    <input type="radio" value='2' name='swapping' /> Read/Write
                                                    <input type="radio" value='3' name='swapping' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Screening</td>
                                                <td>
                                                    <input type="radio" value='1' name='screening' /> Readonly
                                                    <input type="radio" value='2' name='screening' /> Read/Write
                                                    <input type="radio" value='3' name='screening' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Seat Onboarding</td>
                                                <td>
                                                    <input type="radio" value='1' name='onboarding' /> Readonly
                                                    <input type="radio" value='2' name='onboarding' /> Read/Write
                                                    <input type="radio" value='3' name='onboarding' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Team</td>
                                                <td>
                                                    <input type="radio" value='1' name='team' /> Readonly
                                                    <input type="radio" value='2' name='team' /> Read/Write
                                                    <input type="radio" value='3' name='team' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Attendance</td>
                                                <td>
                                                    <input type="radio" value='1' name='attendance' /> Readonly
                                                    <input type="radio" value='2' name='attendance' /> Read/Write
                                                    <input type="radio" value='3' name='attendance' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KRA</td>
                                                <td>
                                                    <input type="radio" value='1' name='kra' /> Readonly
                                                    <input type="radio" value='2' name='kra' /> Read/Write
                                                    <input type="radio" value='3' name='kra' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Stage Upgrade</td>
                                                <td>
                                                    <input type="radio" value='1' name='stage_upgrade' /> Readonly
                                                    <input type="radio" value='2' name='stage_upgrade' /> Read/Write
                                                    <input type="radio" value='3' name='stage_upgrade' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Document</td>
                                                <td>
                                                    <input type="radio" value='1' name='startup_document' /> Readonly
                                                    <input type="radio" value='2' name='startup_document' /> Read/Write
                                                    <input type="radio" value='3' name='startup_document' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mentor Data</td>
                                                <td>
                                                    <input type="radio" value='1' name='mentor_data' /> Readonly
                                                    <input type="radio" value='2' name='mentor_data' /> Read/Write
                                                    <input type="radio" value='3' name='mentor_data' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mentor Connect</td>
                                                <td>
                                                    <input type="radio" value='1' name='mentor_connect' /> Readonly
                                                    <input type="radio" value='2' name='mentor_connect' /> Read/Write
                                                    <input type="radio" value='3' name='mentor_connect' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Investor Data</td>
                                                <td>
                                                    <input type="radio" value='1' name='investor' /> Readonly
                                                    <input type="radio" value='2' name='investor' /> Read/Write
                                                    <input type="radio" value='3' name='investor' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Partners</td>
                                                <td>
                                                    <input type="radio" value='1' name='partner' /> Readonly
                                                    <input type="radio" value='2' name='partner' /> Read/Write
                                                    <input type="radio" value='3' name='partner' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>MoU</td>
                                                <td>
                                                    <input type="radio" value='1' name='mou' /> Readonly
                                                    <input type="radio" value='2' name='mou' /> Read/Write
                                                    <input type="radio" value='3' name='mou' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Online Courses</td>
                                                <td>
                                                    <input type="radio" value='1' name='courses' /> Readonly
                                                    <input type="radio" value='2' name='courses' /> Read/Write
                                                    <input type="radio" value='3' name='courses' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Template Download</td>
                                                <td>
                                                    <input type="radio" value='1' name='template' /> Readonly
                                                    <input type="radio" value='2' name='template' /> Read/Write
                                                    <input type="radio" value='3' name='template' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Startup Services</td>
                                                <td>
                                                    <input type="radio" value='1' name='services' /> Readonly
                                                    <input type="radio" value='2' name='services' /> Read/Write
                                                    <input type="radio" value='3' name='services' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Partners</td>
                                                <td>
                                                    <input type="radio" value='1' name='partner' /> Readonly
                                                    <input type="radio" value='2' name='partner' /> Read/Write
                                                    <input type="radio" value='3' name='partner' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>MOU</td>
                                                <td>
                                                    <input type="radio" value='1' name='mou' /> Readonly
                                                    <input type="radio" value='2' name='mou' /> Read/Write
                                                    <input type="radio" value='3' name='mou' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jobs</td>
                                                <td>
                                                    <input type="radio" value='1' name='jobs' /> Readonly
                                                    <input type="radio" value='2' name='jobs' /> Read/Write
                                                    <input type="radio" value='3' name='jobs' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Co-Founder</td>
                                                <td>
                                                    <input type="radio" value='1' name='cofounder' /> Readonly
                                                    <input type="radio" value='2' name='cofounder' /> Read/Write
                                                    <input type="radio" value='3' name='cofounder' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Booking Request</td>
                                                <td>
                                                    <input type="radio" value='1' name='booking' /> Readonly
                                                    <input type="radio" value='2' name='booking' /> Read/Write
                                                    <input type="radio" value='3' name='booking' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Events</td>
                                                <td>
                                                    <input type="radio" value='1' name='events' /> Readonly
                                                    <input type="radio" value='2' name='events' /> Read/Write
                                                    <input type="radio" value='3' name='events' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Resources</td>
                                                <td>
                                                    <input type="radio" value='1' name='resources' /> Readonly
                                                    <input type="radio" value='2' name='resources' /> Read/Write
                                                    <input type="radio" value='3' name='resources' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Scheme /Policy</td>
                                                <td>
                                                    <input type="radio" value='1' name='schemepolicy' /> Readonly
                                                    <input type="radio" value='2' name='schemepolicy' /> Read/Write
                                                    <input type="radio" value='3' name='schemepolicy' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Complain/Suggestion</td>
                                                <td>
                                                    <input type="radio" value='1' name='complain' /> Readonly
                                                    <input type="radio" value='2' name='complain' /> Read/Write
                                                    <input type="radio" value='3' name='complain' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>UserRole</td>
                                                <td>
                                                    <input type="radio" value='1' name='userrole' /> Readonly
                                                    <input type="radio" value='2' name='userrole' /> Read/Write
                                                    <input type="radio" value='3' name='userrole' /> Hide
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Setting</td>
                                                <td>
                                                    <input type="radio" value='1' name='setting' /> Readonly
                                                    <input type="radio" value='2' name='setting' /> Read/Write
                                                    <input type="radio" value='3' name='setting' /> Hide
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" class="btn btn-primary" />
                                    </div>






                                </form>
                                <?php 
                                 }
                                 ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Role Name</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php
                                 $i=1;
                                 $role = $this->db->get_where('role_permission')->result(); 
                                 foreach($role as $r)
                                 {
                                ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$r->role_name;?></td>
                                            <td>
                                                <a href="<?=base_url();?>Users/role?id=<?=$r->id;?>"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            </td>

                                        </tr>
                                        <?php 
                                        $i++;
                                 }
                                 ?>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>