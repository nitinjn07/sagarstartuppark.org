<style>
/* Checkbox element, when checked */
input[type="checkbox"]:checked {
    box-shadow: 0 0 0 3px hotpink;
}
</style>
<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        On Boarding & Seat Allocation
                    </h1>
                </div>
                <form action="<?=base_url();?>OnBoarding/seatallocate" method="post" enctype="multipart/form-data"
                    id="seatbook">
                    <div class="row">

                        <div class="col-xxl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group mb-2 mt-2">
                                        <label>Select Startup</label>
                                        <select class="form-control" name="startupid">
                                            <option value="">Select Startup</option>
                                            <?php 
                                               $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1,'delstatus'=>1,'is_graduate'=>0,'startup_type'=>'Physical'))->result();
                                               foreach($startup as $s)
                                               {
                                                   $seat = $this->db->get_where('onboard_seat',array('startupid'=>$s->id));
                                                   if($seat->num_rows()==0)
                                                   {
                                            ?>
                                            <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                            <?php 
                                               }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>On Board Date</label>
                                        <input type="date" name="on_board_date" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tentative Graduate Date</label>
                                        <input type="date" name="graduate_date" class="form-control" />
                                    </div>
                                    <div class="form-group mb-2 mt-2">
                                        <label>Wing</label>
                                        <select class="form-control" name="wing" id="wing">
                                            <option value="">Select Wing</option>
                                            <option value="F1">Floor 1
                                                (1-16)</option>
                                            <option value="F2">Floor 2 
                                                (17-64)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <p class='text-danger'> * Red box already allocated </p>
                                    <h3>Select Seat No.</h3>
                                    <?php
                                    $w1a =0;
                                    $w1r = 0;

                                    $w2a =0;
                                    $w2r = 0;
                                    
                                      for($i=1; $i<=64; $i++)
                                      {
                                     ?>
                                    <label class="m-2"
                                        <?php if($i>0 && $i<=16) { echo "style='background:rgba(0,0,255,0.4); padding:4px; color:white; border-radius:10px;'; id='A'"; } else { echo "style='background:rgba(0,255,0,0.4); padding:4px; color:white; border-radius:10px;'; id='B'";} ?>>
                                        <?=$i.":";?>
                                        <input type="checkbox" class='checkbox_check' name="seat[]" value="<?=$i;?>" <?php 
                                           $seat = $this->db->get('onboard_seat')->result();
                                           
                                           foreach($seat as $s)
                                           {
                                            $seat = explode("|",$s->seat_no);
                                            $startup= $this->db->get_where('startup',array('id'=>$s->startupid))->row();
                                            
                                            
                                            if(in_array($i,$seat)){ echo "checked disabled"; 
                                              if($i>0 && $i<=16)
                                              {
                                                $w1a++;
                                                
                                              }
                                              else 
                                              {
                                                $w2a++;
                                              }
                                            }                                      
                                            
                                          
                                           

                                        }
                                        ?> />
                                        <img src="<?=base_url('assets/img/seat1.png');?>" width="20px" />
                                    </label>
                                    <?php
                                      } 
                                    ?>


                                    <div id="A">

                                        <p class="bg-dark text-white p-2 rounded-3"> Allocated Seats: <?=$w1a;?> |
                                            Remaing
                                            Seats:
                                            <?= 16-$w1a;?></p>


                                    </div>
                                    <div id="B">

                                        <p class="bg-dark text-white p-2 rounded-3"> Allocated Seats: <?=$w2a;?> |
                                            Remaing Seats: <?= 48-$w2a;?> </p>



                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
        </main>

        <?=include('common/footer.php');?>
        <script>
        $("#seatbook").validate({
            rules: {
                "seat[]": {
                    required: true,
                    minlength: 1
                },
                "startupid": {
                    required: true
                }

            },
            messages: {
                "seat[]": "<label class='text-danger'>Select<label>"
            }
        });
        </script>
        <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        </script>
        <style>
        .hidden {
            display: none;
        }
        </style>
        <script>
        $('*#B').addClass('hidden');
        $('*#A').addClass('hidden');

        $('#wing').on("change", function() {

            var w = $('#wing').val();

            if (w == 'F1') {
                $('*#B').addClass('hidden');
                $('*#A').removeClass('hidden');
            }
            if (w == 'F2') {
                $('*#A').addClass('hidden');
                $('*#B').removeClass('hidden');
            }





        });
        </script>