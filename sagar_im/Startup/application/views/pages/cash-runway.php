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
                                        <h3 class="text-center text-white">Cash Runway</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Cash Runway</h3>
                                                <p><strong>Description: -</strong> Cash runway is the amount of time a startup has until it runs out of cash. A healthy cash runway is important because it gives the startup time to achieve its goals, such as launching a product, acquiring new customers, or expanding into new markets.</p>
<p><strong>Advantage: </strong></p>
<ul>
<li>Cash runway is a key metric for startups to track because it helps them understand how much time they have to achieve their goals before they need to raise more money or become profitable.</li>
</ul>
<p><strong>Example:</strong></p>
<p>A startup with a cash balance of Rs. 100000 and a burn rate of Rs.10000 per month has a cash runway of 10 months. This means that the startup has 10 months to achieve its goals before it runs out of cash.</p>
<p><strong>&nbsp;</strong></p>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateRunWay"
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
                                                        <label for="">Cash in Hand<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="cash_in_hand" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Burn Rate <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="burn_rate"
                                                            required />
                                                    </div>


                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="cac_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $burn = $this->db->limit(1)->order_by('id','desc')->get_where('cashrunway',array('startup_id'=>$startup->id,'status'=>1))->row();
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
                                                    <th>Cash in Hand</th>
                                                    <th>Burn Rate</th>
                                                    <th>Runway</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $burn = $this->db->order_by('id','desc')->get_where('cashrunway',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                $i=1;
                                                foreach($burn as $b)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$b->year;?></td>
                                                    <td><?=$b->month;?></td>
                                                    <td><?=number_format($b->cash_in_hand);?></td>
                                                    <td><?=number_format($b->burn_rate);?></td>
                                                    <td><?=number_format($b->runway);?></td>
                                                    <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delCashRunWay?id=<?=$b->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>
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