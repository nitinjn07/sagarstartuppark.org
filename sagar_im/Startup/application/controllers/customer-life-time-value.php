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
                                        <h3 class="text-center text-white">Monthly Recurring Revenue</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="" method="post">

                                                    <div class="form-group">
                                                        <label for="">No of Active Accounts <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control my-2"
                                                            name="no_of_active_account" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">ARPA ( Average Revenue Per Account) - Monthly
                                                            Billing <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control my-2" name="arpa"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="mrr_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                  extract($_POST);
                                                  if(isset($_POST['mrr_btn']))
                                                  {
                                                     $data = array('no_of_active_account'=>$no_of_active_account,'arpa'=>$arpa);
                                                     
                                                     $mrr = $no_of_active_account * $arpa;
                                                    
                                                 ?>
                                                <h2>Mpnthly Recurring Revenue</h2>
                                                <h1><?=$mrr;?></h1>

                                                <?php
                                                  } 
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="<?=base_url();?>StartupMatrix" class="btn btn-warning">Go Back</a>
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