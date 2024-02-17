<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Bootstrap
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Funding/SaveBootstrap" method="post">
                                    <div class="form-group">
                                        <label for="">Select Startup <span class="text-danger">*</span></label>
                                        <select name="startup_id" class="form-control" required>
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
                                        <label for="">Amount you bootstrapped ? <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="amount" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Source of Money <span class="text-danger">*</span></label>
                                        <input type="text" name="purpose" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Date <span class="text-danger">*</span></label>
                                        <input type="date" name="invest_date" class="form-control" required />
                                    </div>
                                    <div class="form-group my-2">
                                        <input type="submit" class="btn btn-primary" value="Save Now" />
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Startup Name</th>
                                            <th>Purpose</th>
                                            <th>Amount</th>
                                            <th>Invest Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          $bootstrap = $this->db->get_where('bootstrap')->result();
                                          $i=1;
                                          foreach($bootstrap as $b)
                                          {
                                             $s = $this->db->get_where('startup',array('id'=>$b->startup_id))->row();
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$s->startup_name;?></td>
                                            <td><?=$b->purpose;?></td>
                                            <td><?=$b->amount;?></td>
                                            <td><?=$b->invest_date;?></td>
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