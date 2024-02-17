<?php 
  $onboard = $this->db->get_where('onboard_seat',array('startupid'=>$param))->row();
?>
<style>
input[type="checkbox"]:checked {
    box-shadow: 0 0 0 3px hotpink;
}
</style>
<div class="row">
    <div class="col-md-12">
        <form action="<?=base_url();?>OnBoarding/UpdateSeatAllocate" method="post" enctype="multipart/form-data"
            id="seatbook">
            <div class="row">

                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" value="<?=$onboard->startupid;?>" name="startupid" />
                            <div class="form-group mb-2 mt-2">
                                <label>Select Startup</label>
                                <select class="form-control" name="startupid">
                                    <option value="">Select Startup</option>
                                    <?php 
                                               $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1,'delstatus'=>1))->result();
                                               foreach($startup as $s)
                                               {
                                            ?>
                                    <option value="<?=$s->id;?>"
                                        <?php if($s->id==$onboard->startupid){ echo "selected"; } else { echo "disabled";}; ?>>
                                        <?=$s->startup_name;?>
                                    </option>
                                    <?php 
                                               }
                                            ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>On Board Date</label>
                                <input type="date" name="on_board_date" class="form-control"
                                    value="<?=$onboard->on_board_date;?>" />
                            </div>
                            <div class="form-group">
                                <label>Tentative Graduate Date</label>
                                <input type="date" name="graduate_date" class="form-control"
                                    value="<?=$onboard->graduate_date;?>" />
                            </div>
                            <div class="form-group mb-2 mt-2">
                                <label>Wing</label>
                                <select class="form-control" name="wing" id="wing">
                                    <option value="">Select Wing</option>
                                    <option value="F1" <?php if($onboard->wing=='F1'){echo "selected"; }?>>Floor 1
                                        (1-16)
                                    </option>
                                    <option value="F2" <?php if($onboard->wing=='F2'){echo "selected"; }?>>Floor 2 
                                        (17-64)
                                    </option>
                                </select>
                            </div>






                        </div>
                    </div>
                </div>
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <p class='text-danger'> * Red box already allocated </p>
                            <h3>Select Seat No.</h3>
                            <?php
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
                                            
                                            if(in_array($i,$seat)){  }

                                            if(in_array($i,$seat)){ 

                                                if($s->startupid!=$param)
                                                {
                                                    echo "checked disabled";
                                                }
                                            }
                                            if(in_array($i,$seat)){ 

                                                if($s->startupid==$param)
                                                {
                                                    echo "checked";
                                                }
                                            }
                                            
                                            
                                             
                                            
                                           }
                                        ?> />
                                <img src="<?=base_url('assets/img/seat1.png');?>" width="20px" />
                            </label>
                            <?php
                                      } 
                                    ?>



                        </div>
                        <div class="col-md-12 text-center">
                            <input type="submit" class="btn btn-primary btn-lg" value="Update" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<style>
.hidden {
    display: none;
}
</style>
<script>
<?php 
  if($onboard->wing=='F1')
  {
    echo "$('*#B').addClass('hidden');";
  }
  else if($onboard->wing=='F2')
  {
    echo "$('*#A').addClass('hidden');";
  }
  else 
  {
    echo "$('*#A').removeClass('hidden');";
    echo "$('*#B').removeClass('hidden');";
  }
?>
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