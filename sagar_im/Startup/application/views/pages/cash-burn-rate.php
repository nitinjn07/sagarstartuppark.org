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
                                        <h3 class="text-center text-white">Cash Burn Rate</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Burn Rate</h3>
                                                <p><strong>Description: -</strong> Burn rate is how much cash a startup spends each month. It is important because it tells startups how long they have to become profitable before running out of money.</p>
<p><strong>Advantages:</strong></p>
<ul>
<li>Helps you track your spending and make informed decisions about where to put your money.</li>
<li>Can be used to calculate your runway, which is how long you have to become profitable before running out of cash.</li>
</ul>
<p><strong>Example: </strong>A startup with a burn rate of Rs.100,00 per month and Rs. 100000 in cash reserves has a runway of 10 months. This means that the startup has 10 months to become profitable before running out of money.</p>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateCashBurn"
                                                    method="post">
                                                    <div class="form-group">
                                                        <label for="">Year <span class="text-danger">*</span></label>
                                                        <select name="year" class="form-control my-2">
                                                            <option value="">Select Year</option>
                                                            <?php
                                                              for($i=2023; $i>=2000; $i--)
                                                              {
                                                             ?>
                                                            <option value="<?=$i;?>"><?=$i;?></option>
                                                            <?php
                                                              } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Month <span class="text-danger">*</span></label>
                                                        <select name="month" class="form-control">
                                                            <option value="">Select Year</option>
                                                            <option value="JAN">JAN</option>
                                                            <option value="FEB">FEB</option>
                                                            <option value="MAR">MAR</option>
                                                            <option value="APR">APR</option>
                                                            <option value="MAY">MAY</option>
                                                            <option value="JUN">JUN</option>
                                                            <option value="JUL">JUL</option>
                                                            <option value="AUG">AUG</option>
                                                            <option value="SEP">SEP</option>
                                                            <option value="OCT">OCT</option>
                                                            <option value="NOV">NOV</option>
                                                            <option value="DEC">DEC</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Total Monthly Cash Sale<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="cash_sale"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Total Montly Cash Expense <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="cash_expense" required />
                                                    </div>


                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="cac_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $burn = $this->db->limit(1)->order_by('id','desc')->get_where('burn_rate',array('startup_id'=>$startup->id,'status'=>1))->row();
                                                 if($burn)
                                                 {
                                                    echo "<p>Last Update:</p>";
                                                    echo "<h3>Year: ".$burn->year."</h3>";
                                                     echo "<h3>Last Month: ".$burn->month."</h3>";
                                                     echo "<h1> Rs ".number_format(round($burn->burn_rate))."<h1>";
                                                 }
                                                  
                                                 ?>
                                                <a href="<?=base_url();?>StartupMetrics" class="btn btn-warning">Go
                                                    Back</a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer text-center">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Cash Sale</th>
                                                    <th>Cash Exp</th>
                                                    <th>Burn Rate</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $burn = $this->db->order_by('id','desc')->get_where('burn_rate',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                 
                                                $i=1;
                                                foreach($burn as $b)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$b->year;?></td>
                                                    <td><?=$b->month;?></td>
                                                    <td><?=number_format($b->cash_sale);?></td>
                                                    <td><?=number_format($b->cash_exp);?></td>
                                                    <td><?=number_format($b->burn_rate);?></td>
                                                    <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delBurnRate?id=<?=$b->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>
                                                </tr>
                                                <?php 
                                                $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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