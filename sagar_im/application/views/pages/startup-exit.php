<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Left / Graduate / Terminate
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">

                            <div class="card-body">

                                <form action="<?=base_url();?>ExitStartup/exitStartups" method="post">

                                    <div class="form-group">
                                        <label>Startup Name <span class="text-danger"> *</span></label>
                                        <select name="startupid" class="form-control" required>
                                            <option value="">Select Startup</option>
                                            <?php
                                            $startup = $this->db->get_where('startup',array('is_screened'=>1,'action'=>'accept','is_graduate'=>0,'delstatus'=>1))->result();
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
                                        <label>Exit Status <span class="text-danger"> *</span></label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="">Select Status</option>
                                            <option value="graduate">Graduate</option>
                                            <option value="terminate">Terminate</option>
                                            <option value="left">Left</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date <span class="text-danger"> *</span></label>
                                        <input type="date" name="exit_date" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Comment <span class="text-danger"> *</span></label>
                                        <input type="text" name="reason" class="form-control" required />
                                    </div>
                                    <div class="form-group" id="stage">
                                        <label>Stage <span class="text-danger"> *</span></label>
                                        <select class="form-control" name="stage">
                                            <option>Select Stage</option>
                                            <option value="concept_ideation">
                                                Concept
                                                Ideation</option>
                                            <option value="customer_discovery">
                                                Customer
                                                Discovery</option>
                                            <option value="idea_validation">
                                                Idea
                                                Validation</option>
                                            <option value="minimum_viable_product">
                                                MVP</option>
                                            <option value="product_market_fit">
                                                Product Market
                                                Fit</option>
                                            <option value="growth_establishment_and_scale_up">
                                                Growth
                                                Establishment and
                                                Scale up</option>
                                            <option value="maturity_and_possible_exit">
                                                Maturity and
                                                Possible Exit
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group pt-2">
                                        <input type="submit" class="btn btn-warning" />
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>SNo.</th>
                                        <th>Startup Name</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Reason</th>
                                        <th>Stage</th>
                                    </tr>

                                    <?php
                              $startup_exit = $this->db->get('exit_startup')->result(); 
                            $i=1;
                              foreach($startup_exit as $se)
                            {
                                $startup = $this->db->get_where('startup',array('id'=>$se->startupid))->row();
                          ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$startup->startup_name;?></td>
                                        <td><?=$se->status;?></td>
                                        <td><?=$se->date;?></td>
                                        <td><?=$se->reason;?></td>
                                        <td><?=$se->stage;?></td>
                                    </tr>

                                    <?php
                            $i++;
                                
                            }
                              
                             
                              ?>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>

        <script>
        $(document).ready(function() {


            $('#terminate').hide();
            $('#stage').hide();

            $('#status').on('change', function() {

                var status = $('#status').val();


                if (status == 'graduate') {

                    $('#terminate').hide();
                    $('#stage').hide();
                }
                if (status == 'terminate') {

                    $('#terminate').show();
                    $('#stage').hide();
                }
                if (status == 'left') {

                    $('#terminate').hide();
                    $('#stage').show();
                }

            });


        });
        </script>