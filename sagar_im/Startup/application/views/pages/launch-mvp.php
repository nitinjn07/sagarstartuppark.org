<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Launch Your First MVP
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?=base_url();?>LaunchMVP/SaveMVP" method="post">
                                    <div class="row">


                                        <div class="form-group col-md-12 py-2">
                                            <label for="">Product Name <span class="text-danger">*</span></label>
                                            <input type="text" name="product_name" class="form-control" required>

                                        </div>
                                        <div class="form-group col-md-12 py-2">
                                            <label for="">Short Descripton <span class="text-danger">*</span></label>
                                            <input type="text" name="short_description" class="form-control" required>

                                        </div>
                                        <div class="form-group col-md-6 py-2">
                                            <label for="">MVP Testing Start Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="mvp_test_start_date" class="form-control" required>

                                        </div>
                                        <div class="form-group col-md-6 py-2">
                                            <label for="">MVP Testing End Date <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="mvp_test_end_date" class="form-control" required>

                                        </div>



                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h3 class="text-center">Most viable feature#1</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="f1_name" class="form-control" required>

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Short Description <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="f1_short_desc" class="form-control"
                                                            required>

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Feature #1 Steps to Test</label>


                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 1 <span class="text-danger">*</span></label>
                                                        <input type="text" name="f1_s1" class="form-control" required>

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 2 <span class="text-danger">*</span></label>
                                                        <input type="text" name="f1_s2" class="form-control" required>

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 3 <span class="text-danger">*</span></label>
                                                        <input type="text" name="f1_s3" class="form-control" required>

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 4 <span class="text-danger">*</span></label>
                                                        <input type="text" name="f1_s4" class="form-control" required>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h3 class="text-center">Most viable feature#2</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Name</label>
                                                        <input type="text" name="f2_name" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Short Description</label>
                                                        <input type="text" name="f2_short_desc" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Feature #2 Steps to Test</label>


                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 1</label>
                                                        <input type="text" name="f2_s1" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 2</label>
                                                        <input type="text" name="f2_s2" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 3</label>
                                                        <input type="text" name="f2_s3" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 4</label>
                                                        <input type="text" name="f2_s4" class="form-control">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h3 class="text-center">Most viable feature#3</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Name</label>
                                                        <input type="text" name="f3_name" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Short Description</label>
                                                        <input type="text" name="f3_short_desc" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Feature #3 Steps to Test</label>


                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 1</label>
                                                        <input type="text" name="f3_s1" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 2</label>
                                                        <input type="text" name="f3_s2" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 3</label>
                                                        <input type="text" name="f3_s3" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 4</label>
                                                        <input type="text" name="f3_s4" class="form-control">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h3 class="text-center">Most viable feature#4</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Name</label>
                                                        <input type="text" name="f4_name" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Short Description</label>
                                                        <input type="text" name="f4_short_desc" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-12 py-2">
                                                        <label for="">Feature #4 Steps to Test</label>


                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 1</label>
                                                        <input type="text" name="f4_s1" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 2</label>
                                                        <input type="text" name="f4_s2" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 3</label>
                                                        <input type="text" name="f4_s3" class="form-control">

                                                    </div>
                                                    <div class="form-group col-md-6 py-2">
                                                        <label for="">Step 4</label>
                                                        <input type="text" name="f4_s4" class="form-control">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 py-2">
                                            <label for="">Video Link (Not more than 1 minute)</label>
                                            <input type="text" name="video_link" class="form-control" required>

                                        </div>
                                        <div class="form-group col-md-12 text-center py-2">

                                            <input type="submit" class="btn btn-primary" />

                                        </div>


                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>