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
                                            <div class="col-md-12">
                                            
<h3><strong>Monthly Recurring Revenue (MRR)</strong></h3>

<p><strong>Description: </strong>-&nbsp; Monthly recurring revenue (MRR) is the predictable income you earn each month your customers who pay on a recurring basis on your products or services. It's a key metric for businesses to track growth and forecast future revenue.</p>
<p><strong>Here are the advantages of monthly recurring revenue (MRR):</strong></p>
<ul>
<li><strong>Predictability:</strong> MRR provides a predictable stream of income, which can help businesses with budgeting and forecasting.</li>
<li><strong>Growth:</strong> MRR can help businesses grow faster, as it allows them to reinvest in their business and acquire new customers.</li>
<li><strong>Attractiveness to investors:</strong> MRR can make businesses more attractive to investors, as it shows that the business has a sustainable revenue model.</li>
</ul>
<p><strong>Here is an example of monthly recurring revenue (MRR):</strong></p>
<p>You run a company that charges a monthly subscription fee of Rs.100 would have an MRR of Rs. 100,000 if it had 1,000 customers.</p>
                                            
                                            
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/UpdateMRR" method="post">
                                                    <div class="form-group">
                                                        <label for="">Year <span class="text-danger">*</span></label>
                                                        <select name="year" class="form-control">
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
                                                        <label for="">No of Active Accounts <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="no_of_active_account" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">ARPA ( Average Revenue Per Account) - Monthly
                                                            Billing <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="arpa"
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
                                                 
                                                $mrr = $this->db->limit(1)->order_by('id','desc')->get_where('mrr',array('startup_id'=>$startup->id))->row();
                                                if($mrr)
                                                {
                                                    echo "<p>Last Update:</p>";
                                                    echo "<h3>Last Year: ".$mrr->year." Last Month: ".$mrr->month."</h3>";
                                                    echo "<h1> Rs ".number_format($mrr->mrr)."<h1>";
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
                                                    <th>No of Active Account</th>
                                                    <th>ARPA</th>
                                                    <th>MRR</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $mrr = $this->db->order_by('id','desc')->get_where('mrr',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                $i=1;
                                                foreach($mrr as $m)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$m->year;?></td>
                                                    <td><?=$m->month;?></td>
                                                    <td><?=number_format($m->no_of_accounts);?></td>
                                                    <td><?=number_format($m->apra);?></td>
                                                    <td><?=number_format($m->mrr);?></td>
                                                    <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delMRR?id=<?=$m->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>
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