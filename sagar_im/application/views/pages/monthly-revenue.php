<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Monthly Revenue
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Revenue/SaveRevenue" method="post">
                                    <div class="form-group">
                                        <label for="">Select Startup</label>
                                        <select name="startup_id" class="form-control">
                                            <option value="">Select Startup</option>
                                            <?php
                                           $startup = $this->db->get_where('startup',array('startup_type'=>'Physical','is_graduate'=>0,'delstatus'=>1))->result(); 
                                           foreach($startup as $s)
                                           {
                                        ?>
                                            <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                            <?php 
                                           }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Year</label>
                                        <select name="year" class="form-control">
                                            <option value="">Select Year</option>
                                            <?php
                                              for($i=date('Y');$i>=date('Y')-50; $i--)
                                              { 
                                            ?>
                                            <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php 
                                              }
                                            ?>

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Month Name</label>
                                        <select name="month" class="form-control">
                                            <option value="">Select Month</option>
                                            <?php
                                            $months = array(
                                                "JAN", "FEB", "MAR", "APR", "MAY", "JUN",
                                                "JULY", "AUG", "SEP", "OCT", "NOV", "DEC"
                                            ); 
                                            foreach($months as $m)
                                            {
                                            ?>
                                            <option value="<?=$m;?>"><?=$m;?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Total Revenue</label>
                                        <input type="number" name="total_revenue" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Net Profit</label>
                                        <input type="number" name="net_profit" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Net Expense</label>
                                        <input type="number" name="net_expenses" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Customer Reach</label>
                                        <input type="number" name="new_customer" class="form-control" />
                                    </div>


                                    <div class="form-group pt-2">
                                        <input type="submit" class="btn btn-primary" value="Save Now" />
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 ">
                        <div class="card">
                            <div class="card-body table-responsive">

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Startup Name</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Revenue</th>
                                            <th>Net Profit</th>
                                            <th>Net Expense</th>
                                            <th>New Customer Reach</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          $rev = $this->db->get('startup_revenue')->result();
                                          $i=1;
                                          foreach($rev as $r)
                                          {
                                             $st = $this->db->get_where('startup',array('id'=>$r->startup_id))->row();
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$st->startup_name;?></td>
                                            <td><?=$r->year;?></td>
                                            <td><?=$r->month;?></td>
                                            <td><?=$r->total_revenue;?></td>
                                            <th><?=$r->net_profit;?></th>
                                            <th><?=$r->net_expenses;?></th>
                                            <td><?=$r->new_customer;?></td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>