<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Upcoming Events
                    </h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">DOMESTIC</h4>
                            </div>
                            <div class="card-body text-center">
                                <a href="<?=base_url();?>Event/getEventDetails?type=domestic"
                                    class="btn btn-danger">Click here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">GLOBAL</h4>
                            </div>
                            <div class="card-body text-center">
                                <a href="<?=base_url();?>Event/getEventDetails?type=global" class="btn btn-danger">Click
                                    here</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">EVENT AT INCUBATION CENTER</h4>
                            </div>
                            <div class="card-body text-center">
                                <a href="<?=base_url();?>Event/getEventDetails?type=incubation"
                                    class="btn btn-danger">Click here</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </main>

        <?=include('common/footer.php');?>