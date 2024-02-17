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
                                        <h3 class="text-center text-white">Customer Retention Rate</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Retention Rate</h3>
                                                <p><strong>Description: - </strong>Retention rate is a metric that measures how many customers keep using your product or service. It is important for startups to track retention rate because it helps them to understand how many customers are happy with their product or service and to identify areas where they can improve.</p>
<p><strong>Advantages of tracking retention rate:</strong></p>
<ul>
<li>Helps startups to identify areas where they can improve the customer experience</li>
<li>Allows startups to benchmark their performance against other startups in the same industry</li>
<li>Helps startups to track their progress over time and identify areas for improvement</li>
</ul>
<p><strong>Example:</strong></p>
<p>If a startup has 100 customers at the beginning of a month and 90 customers at the end of the month, its retention rate would be 90%.</p>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="" method="post">

                                                    <div class="form-group">
                                                        <label for="">Ending Customers<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="end_cust"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">New Customers<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="new_cust"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Beginnig Customers<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="beg_customer" required />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="cr_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                  extract($_POST);
                                                  if(isset($_POST['cr_btn']))
                                                  {
                                                     
                                                     
                                                     $cr = ((int)$end_cust-(int)$new_cust)/(int)$beg_customer;
                                                    
                                                 ?>
                                                <h2>Customer Retention Rate</h2>
                                                <h1><?=$cr;?></h1>

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