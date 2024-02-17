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
                                        <h3 class="text-center text-white">Average Revenue Per User</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Average Revenue Per User (ARPU)</h3>
                                                <p><strong>Description: - </strong>Average Revenue Per User (ARPU) is a key metric for startups, measuring how much average revenue each customer generates.</p>
<p><strong>Advantages of Average Revenue Per User (ARPU)</strong></p>
<ul>
<li><strong>Track growth potential on a per-customer level:</strong> By tracking how ARPU changes over time, startups can identify whether their customers are becoming more valuable or less valuable. This information can be used to inform marketing and sales strategies.</li>
<li><strong>Help model revenue generation capacity:</strong> By understanding how much revenue each customer generates startups can better predict their future revenue. This information can be used to make informed decisions about investment and expansion.</li>
<li><strong>Identify areas for improvement:</strong> If a startups ARPU is low, it may be a sign that they need to focus on increasing customer engagement or offering more value-added services.</li>
</ul>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateARPU" method="post">
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
                                                        <label for="">Total (Yearly) Revenue<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="total_revenue" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Total Number of Customer ( In Duration)<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="total_customer" required />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="arpu_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $arpu = $this->db->limit(1)->order_by('id','desc')->get_where('arpu',array('startup_id'=>$startup->id))->row();
                                                 if($arpu)
                                                 {
                                                     echo "<p>Last update:</p>";
                                                     echo "<h3>Last Year: ".$arpu->year."</h3>";
                                                     echo "<h1> Rs ".number_format($arpu->arpu)."<h1>";
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
                                                    <th>Total Revnue</th>
                                                    <th>Total Customer</th>
                                                    <th>ARPU</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $arpu = $this->db->order_by('id','desc')->get_where('arpu',array('startup_id'=>$startup->id,'status'=>1))->result();
                                           
                                                 $i=1;
                                                foreach($arpu as $a)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$a->year;?></td>
                                                    <td><?=number_format($a->total_revenue);?></td>
                                                    <td><?=number_format($a->total_customer);?></td>
                                                    <td><?=number_format($a->arpu);?></td>
                                                    <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delARPU?id=<?=$a->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>
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