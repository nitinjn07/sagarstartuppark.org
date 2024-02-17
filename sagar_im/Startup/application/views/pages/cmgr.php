<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <main class="content" style="z-index: 10">
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row mt-5">

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-warning">
                                        <h3 class="text-center text-white">Compounded Monthly Growth Rate</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Compounded Monthly Growth Rate (CMGR)</h3>
                                                <p><strong>Description: -&nbsp; </strong>Compounded Monthly Growth Rate (CMGR) is a metric that measures the average monthly growth rate of a startup over a period of time. It is a good way to track long-term growth trends and identify areas where the company is seeing steady or inconsistent growth.</p>
<p><strong>Here are some advantages of CMGR:</strong></p>
<ul>
<li>It is a more accurate measure of growth than month-over-month (MoM) growth rate, as it takes into account the compounding effect of growth over time.</li>
<li>It can be used to benchmark the growth of a startup against other companies in the same industry.</li>
<li>It can help startups identify areas where they need to improve.</li>
</ul>
<p><strong>Here is an example:</strong></p>
<ul>
<li>A startup has a CMGR of 10%. This means that its revenue is growing by 10% each month. So, if the startup's revenue is $100 in January, it will be $110 in February, $121 in March, and so on.</li>
</ul>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="" method="post">

                                                    <div class="form-group">
                                                        <label for="">Initial Investment <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control my-2" name="start_invest"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ending Investment<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control my-2" name="end_invest"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Number of Month<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control my-2" name="no_of_month"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="cmgr_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                  extract($_POST);
                                                  if(isset($_POST['cmgr_btn']))
                                                  {
                                                     
                                                     $cmgr = pow(($start_invest/$end_invest),1/$no_of_month)-1;
                                                    
                                                 ?>
                                                <h2>Compounded Monthly Growth Rate</h2>
                                                <h1><?=$cmgr;?></h1>

                                                <?php
                                                  } 
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="<?=base_url();?>StartupMetrics" class="btn btn-warning">Go Back</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <?=include('common/footer.php');?>