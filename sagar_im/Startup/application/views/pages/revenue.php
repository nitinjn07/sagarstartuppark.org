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
                                        <h3 class="text-center text-white">Revenue</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Revenue (Gross and Net)</h3>
                                                <p><strong>Description: - </strong>Revenue is the income that a startup generates from its sales and services. There are two main types of revenue: gross revenue and net revenue.</p>
<p><strong>Gross revenue</strong> is the total amount of money a startup makes before any expenses are deducted, while <strong>net revenue </strong>is the total amount of money a startup makes after all expenses have been deducted.</p>
<ul>
<li>Gross revenue = Total sales</li>
<li>Net revenue = Total sales - Expenses</li>
</ul>
<p><strong>Advantages of revenue for startups:</strong></p>
<ul>
<li>Revenue is a key indicator of a startups success.</li>
<li>Revenue can be used to fund growth and expansion.</li>
<li>Revenue can be used to attract investors and partners.</li>
</ul>
<p><strong>Example:</strong></p>
<p>A startup company sells a product for Rs.100. The cost of goods sold is Rs. 50. The startup company's gross revenue is Rs.100. The startup company's net revenue is Rs.50.</p>
<p>&nbsp;</p>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateRevenue"
                                                    method="post">
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
                                                        <label for="">No of Goods Sold <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="no_of_goods_sold" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sales Price
                                                            Billing <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="sale_price"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="revenue_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $rev = $this->db->limit(1)->order_by('id','desc')->get_where('revenue',array('startup_id'=>$startup->id))->row();
                                                 if($rev)
                                                 {
                                                     echo "<p>Last Updated..</p>";
                                                     echo "<h3>Last Year: ".$rev->year." Last Month: ".$rev->month."</h3>";
                                                     echo "<h1> Rs ".$rev->revenue."<h1>";
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
                                                    <th>No of Goods Sold</th>
                                                    <th>Sales Price Billing</th>
                                                    <th>Revenue</th>
                                                    <td>Action</td>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $rev = $this->db->order_by('id','desc')->get_where('revenue',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                
                                                $i=1;
                                                foreach($rev as $r)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$r->year;?></td>
                                                    <td><?=$r->month;?></td>
                                                    <td><?=number_format($r->goods_sold);?></td>
                                                    <td><?=number_format($r->sale_price);?></td>
                                                    <td><?=number_format($r->revenue);?></td>
                                                    <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delRevenue?id=<?=$r->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>
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