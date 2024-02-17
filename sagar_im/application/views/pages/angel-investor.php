<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Angel Investor
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Funding/SaveAngelInvestor" method="post">
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
                                        <label for="">How much amount you get?</label>
                                        <input type="number" name="amount" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Investor Name</label>
                                        <input type="text" name="investor_name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Investor Background</label>
                                        <input type="text" name="investor_background" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pre Money Valuation</label>
                                        <input type="number" name="pre_money" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Post Money Valuation</label>
                                        <input type="number" name="post_money" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Date</label>
                                        <input type="date" name="investing_date" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Save Now" />
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8 ">
                        <div class="card">
                            <div class="card-body table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Startup Name</th>
                                            <th>Investor Name</th>
                                            <th>Investor Background</th>
                                            <th>Amount</th>
                                            <th>PreMoneyValuation</th>
                                            <th>PostMoneyValuation</th>
                                            <th>Investing Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          $ai = $this->db->get('angel_investor')->result();
                                          $i=1;
                                          foreach($ai as $a)
                                          {
                                             $st = $this->db->get_where('startup',array('id'=>$a->startup_id))->row();
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$st->startup_name;?></td>
                                            <td><?=$a->investor_name;?></td>
                                            <td><?=$a->investor_background;?></td>
                                            <td><?=$a->amount;?></td>
                                            <th><?=$a->pre_money;?></th>
                                            <th><?=$a->post_money;?></th>
                                            <td><?=$a->investing_date;?></td>
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