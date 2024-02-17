<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <main class="content">
        <div class="container-fluid">

            <div class="header">
                <h1 class="header-title">
                    Change your password
                </h1>
                <p class="header-subtitle">Remember your current password to change this</p>
            </div>

            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="card">

                        <div class="card-body">

                            <form action="<?=base_url();?>ChangePassword/Change" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password"
                                        placeholder="Current Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="new_password"
                                        placeholder="New Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password"
                                        placeholder="Confirm Password">
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>

    <?=include('common/footer.php');?>