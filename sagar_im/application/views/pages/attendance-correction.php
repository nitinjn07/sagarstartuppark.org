<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Attendance Correction
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">

                            <div class="card-body">



                                <form action="<?=base_url();?>Attendance/updateAttendance" method="post">

                                    <div class="form-group">
                                        <label>Startup Name</label>
                                        <select name="startupid" class="form-control">
                                            <option value="">Select Startup</option>
                                            <?php
          $startup = $this->db->get_where('startup',array('startup_type'=>'Physical','is_screened'=>1,'action'=>'accept','is_graduate'=>0))->result();
          foreach($startup as $s)
          {
        ?>
                                            <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                            <?php
          }
        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" name="attd_date" />
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="A">A</option>
                                            <option value="P">P</option>
                                        </select>
                                    </div>
                                    <div class="form-group pt-2">

                                        <input type="submit" class="btn btn-warning" />
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>