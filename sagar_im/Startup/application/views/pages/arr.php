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
                                        <h3 class="text-center text-white">Annual Recurring Revenue</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                
<h3>Annual Recurring Revenue (ARR)</h3>

<p><strong>Description: -</strong> Annual recurring revenue (ARR) is the yearly amount of revenue a company is expected to make in the next year from your customers who pay on a recurring basis on its Products, services or contracts.</p>
<p><strong>Here are the advantages of Annual recurring revenue (ARR):</strong></p>
<ul>
<li><strong>Predictable revenue stream:</strong> ARR is a predictable revenue stream because it is based on recurring payments from customers. This makes it easier for businesses to plan for the future and make investments.</li>
<li><strong>Easier to value a company:</strong> Investors use ARR to value companies because it is a good measure of a company's recurring revenue base. This information can help investors to determine how much a company is worth and whether or not it is a good investment.</li>
<li><strong>Easier to raise capital:</strong> Companies with high ARR are generally more attractive to investors because they are seen as being more stable and less risky. This makes it easier for these companies to raise capital to fund growth.</li>
</ul>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateARR" method="post">
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
                                                        <label for="">MRR ( Monthly Recurring Revenue) - Click here (<a
                                                                href="<?=base_url();?>StartupMatrix/mrr">MRR</a>) <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control my-2" name="mrr"
                                                            required />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="arr_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $arr = $this->db->limit(1)->order_by('id','desc')->get_where('arr',array('startup_id'=>$startup->id))->row();
                                                 if($arr)
                                                 {
                                                     echo "<p>Last Update:</p>";
                                                     echo "<h3>Last Year: ".$arr->year."</h3>";
                                                     echo "<h1> Rs ".number_format($arr->arr)."<h1>";
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
                                                    <th>MRR</th>
                                                    <th>ARR</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                 $arr = $this->db->order_by('id','desc')->get_where('arr',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                
                                                 $i=1;
                                                foreach($arr as $a)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$a->year;?></td>
                                                    <td><?=number_format($a->mrr);?></td>
                                                    <td><?=number_format($a->arr);?></td>
                                                    <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delARR?id=<?=$a->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>

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