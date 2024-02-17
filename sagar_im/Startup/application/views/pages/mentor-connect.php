<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Mentor Connect
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">



                        <div class="row">

                            <div class="col-md-6 pt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?=base_url();?>MentorConnect/connectMeetingStepOne"
                                            method="post">
                                            <h3 class="text-center">FIND MENTOR INDUSTRY WISE</h3>

                                            <?php 
                                              $id = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
                                              ?>
                                            <input type="hidden" name="sid" value="<?=$id->id?>">

                                            <div class="form-group mb-2 mt-2">
                                                <label class="py-3">Select Industry <b class="text-danger"></b></label>
                                                <select class="form-select" name="industry" id="industry" required>
                                                    <option>Select Industry</option>
                                                    <option value="legal_expert">Legal Expert</option>
                                                    <option value="finance_expert">Finance Expert</option>
                                                    <option value="account_expert">Account Expert</option>
                                                    <option value="marketing_expert">Marketing Expert</option>
                                                    <option value="it_expert">IT Expert</option>
                                                    <option value="digital_marketing_expert">Digital Marketing
                                                        Expert</option>
                                                    <option value="business_strategy_expert">Business Strategy
                                                        Expert</option>

                                                    <option value="startup_expert">Startup Expert</option>

                                                    <option value="softskill_expert">Soft Skill Expert
                                                    </option>

                                                </select>
                                            </div>


                                            <div class='row' id="mentor_info">
                                            </div>

                                        </form>


                                    </div>




                                </div>



                            </div>
                            <div class="col-md-6 pt-5">

                                <div class="card">
                                    <div class="card-header">

                                    </div>
                                    <div class="card-body">
                                        <h3 class="text-center">IF MENTOR NOT FOUND</h3>
                                        <p class="text-center">New Mentor Request Form</p>

                                        <form action="<?=base_url().'MentorConnect/NewRequest';?>" method="post">

                                            <div class="form-group">
                                                <label for="" class="py-1">In Which Category you are finding mentor
                                                    ?</label>
                                                <input type="text" placeholder="Categorgy Name" class="form-control"
                                                    name="category" />
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="py-1">Describe Your Problem</label>
                                                <textarea name="problem" placeholder="Write your problem"
                                                    class="form-control"></textarea>
                                            </div>
                                            <div class="form-group py-3">
                                                <input type="submit" class="btn btn-primary" value="Submit Request" />
                                            </div>
                                        </form>

                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </main>

        <?php include('common/footer.php');?>
        <script>
        <?php
             $dates = $this->db->Query('select * from mentor_connect where status="accept"')->result();
             $info = '["';
             $i=0;
             foreach($dates as $d)
             {  
                 if($i+1==1)
                 {
                 $info .=$d->meeting_date.'"';
                 $i++;

                 }
                 else 
                 {
                    $info .=',"'.$d->meeting_date.'"';
                    $i++;
                 }
             }
             $info .="]";




              

        ?>
        var disabledDates = <?=$info;?>;
        $('#datepicker').datepicker({
            beforeShowDay: function(date) {
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                return [disabledDates.indexOf(string) == -1]
            }
        });
        </script>


        <script>
        $(document).ready(function() {
            $('#industry').on('change', function() {

                var industry = $('#industry').val();

                var response = '';
                $.ajax({
                    type: "POST",
                    url: "<?=base_url();?>MentorConnect/getMentor",
                    data: {
                        'category': industry
                    },
                    success: function(text) {
                        response = text;

                        $('#mentor_info').html(response);


                    }
                });


            });
        });
        </script>