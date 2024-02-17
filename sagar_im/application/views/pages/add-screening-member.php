<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Screening Member
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?= base_url();?>Screening/CreateScreeningTeam" method="post"
                                    id="screening_committee">
                                    <div class="form-group">
                                        <label class="pt-2 pb-2">Member Name <span
                                                class='text-danger'>(*)</span></label>
                                        <input type="text" class="form-control pb-2" name="name"
                                            placeholder="Enter Member Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="pt-2 pb-2">Member Email <span
                                                class='text-danger'>(*)</span></label>
                                        <input type="text" class="form-control pb-2" name="email"
                                            placeholder="Enter Member Email" required" />
                                    </div>
                                    <div class=" form-group">
                                        <label class="pt-2 pb-2">Member Contact <span
                                                class='text-danger'>(*)</span></label>
                                        <input type="text" class="form-control pb-2" name="contact"
                                            placeholder="Enter Member Contact" required />
                                    </div>
                                    <div class=" form-group">
                                        <label class="pt-2 pb-2">Designation <span
                                                class='text-danger'>(*)</span></label>
                                        <input type="text" class="form-control pb-2" name="designation"
                                            placeholder="Enter Member Designation" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>