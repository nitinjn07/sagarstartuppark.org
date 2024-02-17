<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Schedule Screening
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">

                        <form action="<?=base_url();?>Screening/schedule" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Enter Title" required />
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <label>Schedule Date</label>
                                            <input type="date" class="form-control" name="schedule_date"
                                                placeholder="Enter Title" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6" class="table-responsive" style="height:600px; overflow:scroll;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-3 bg-primary p-1 text-white">Select Startups</h4>
                                            <table class="table">
                                                <tr>
                                                    <th>Checkbox</th>
                                                    <th>Startup Name</th>

                                                </tr>
                                                <?php 
                                            $startup = $this->db->get_where('startup',array('action'=>'accept','delstatus'=>1,'is_screened'=>0))->result();
                                            foreach($startup as $st)
                                            {
                                        ?>
                                                <tr>
                                                    <td><input type="checkbox" name="startup[]" value="<?=$st->id;?>" />
                                                    </td>
                                                    <td><?= $st->startup_name; ?></td>
                                                </tr>
                                                <?php 
                                            }
                                            ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-3 bg-primary p-1 text-white">Select Committee Member</h4>
                                            <table class="table">
                                                <tr>
                                                    <th>Checkbox</th>
                                                    <th>Member Name</th>

                                                </tr>
                                                <?php 
                                            $member = $this->db->get_where('screning_committe',array('action'=>'accept','status'=>1))->result();
                                            foreach($member as $mem)
                                            {
                                        ?>
                                                <tr>
                                                    <td><input type="checkbox" name="member[]" value="<?=$mem->id;?>" />
                                                    </td>
                                                    <td><?= $mem->name; ?></td>
                                                </tr>
                                                <?php 
                                            }
                                            ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <input type="submit" class="btn btn-primary btn-lg" />
                                </div>
                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>