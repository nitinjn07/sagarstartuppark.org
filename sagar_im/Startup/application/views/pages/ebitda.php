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
                                        <h3 class="text-center text-white">EBITDA</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>EBITDA</h3>
                                                <p><strong>Description: -</strong> EBITDA is a measure of how much money a startup is making before it pays interest, taxes, and other expenses. It is a key metric used by investors and lenders to assess a startup&rsquo;s financial health and growth potential.</p>
<p><strong>Here are some better advantages of EBITDA for startups:</strong></p>
<p>&nbsp;</p>
<ul>
<li>EBITDA gives investors and lenders a better picture of how much cash the startup is generating from its operations. This is important because startups often need to reinvest cash back into their businesses to grow.</li>
<li>Investors and lenders often use EBITDA multiples to value startups.&nbsp;</li>
<li>EBITDA is a good way to compare startups across different industries and stages of growth.</li>
<li>By tracking EBITDA over time, startups can see how their profitability is improving or declining. This can help startups to identify areas where they need to improve their operations.</li>
</ul>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="<?=base_url();?>StartupMetrics/updateEbitda"
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
                                                        <label for="">Net Income<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="netincome"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Intrest <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="interest"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tax<span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2" name="tax"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Depreciation<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="depreciation" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Amortization<span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control my-2"
                                                            name="amortization" required />
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary my-2"
                                                            value="Calculate Now" name="cac_btn" />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6 text-center py-4">
                                                <?php
                                                 
                                                 $ebitda = $this->db->limit(1)->order_by('id','desc')->get_where('ebitda',array('startup_id'=>$startup->id))->row();
                                                 if($ebitda)
                                                 {
                                                    echo  "<p>Last Update:</p>";
                                                     echo "<h3>Last Year: ".$ebitda->year."</h3>";
                                                     echo "<h1> Rs ".number_format(round($ebitda->ebitda))."<h1>";
                                                 }
                                                  
                                                 ?>
                                                <a href="<?=base_url();?>StartupMetrics" class="btn btn-warning">Go
                                                    Back</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SNo.</th>
                                                <th>Year</th>
                                                <th>Net Income</th>
                                                <th>Interest</th>
                                                <th>Tax</th>
                                                <th>Depreciation</th>
                                                <th>Amortization</th>
                                                <th>EBITDA</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $ebitda = $this->db->order_by('id','desc')->get_where('ebitda',array('startup_id'=>$startup->id,'status'=>1))->result();
                                                $i=1;
                                                foreach($ebitda as $e)
                                                {
                                                ?>
                                            <tr>
                                                <td><?=$i;?></td>
                                                <td><?=$e->year;?></td>

                                                <td><?=number_format($e->netincome);?></td>
                                                <td><?=number_format($e->interest);?></td>
                                                <td><?=number_format($e->tax);?></td>
                                                <td><?=number_format($e->depreciation);?></td>
                                                <td><?=number_format($e->amortization);?></td>
                                                <td><?=number_format($e->ebitda);?></td>
                                                <td><a class="btn btn-danger" href="<?=base_url();?>StartupMetrics/delEBITDA?id=<?=$e->id;?>" onclick="return confirm('Are you sure to delete ?');"><i class='fa fa-trash'></i></a></td>
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
    </main>

    <?=include('common/footer.php');?>