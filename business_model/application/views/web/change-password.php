<?php include('header.php'); ?>
<div class="content-wrapper">


    <div class="row" id="report">

        <div class="col-md-5">
            <div class="card">
                <div class="card-body">

                    <div class="col-md-12">
                        <?php include('alert.php'); ?>
                    </div>

                    <h3 class="pt-2">Change Password</h3>
                    <form action="<?=base_url();?>Upload/ChangePassword" method="post" enctype="multipart/form-data"
                        class="mt-4">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" class="form-control" placeholder="Current Password"
                                name="current_password" />
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" placeholder="New Password"
                                name="new_password" />
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password"
                                name="confirm_password" />
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Change Password" />
                        </div>
                    </form>

                </div>
            </div>
        </div>



    </div>

</div>
<?php include('footer.php'); ?>