<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        ChangePassword
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Dashboard/ChangePassword" method="post">
                                    <div class="form-group mt-2">
                                        <label>Current Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control mt-2" name="current_password"
                                            placeholder="Enter Current Password" required />
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>New Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control mt-2" name="new_password"
                                            placeholder="Enter New Password" required />
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control mt-2" name="confirm_password"
                                            placeholder="Confirm Password" required />
                                    </div>
                                    <div class="form-group mt-2">
                                        <input type="submit" class="btn btn-primary" value="Change Password" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>