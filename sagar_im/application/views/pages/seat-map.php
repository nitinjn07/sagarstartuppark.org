<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Seat Map
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <h3>Select Seat No.</h3>
                                <button onclick="CreatePDFfromHTML();" class="btn btn-danger">Save as PDF </button>

                                <div class="row html-content">
                                    <?php
                                      for($i=1; $i<=64; $i++)
                                      {
                                     ?>
                                    <div class="col-md-2 col-sm-4 col-xs-6 col-lg-2">
                                        <label class="m-2 p-2"
                                            <?php if($i>0 && $i<=16) { echo "style='background:rgba(0,0,255,0.4); padding:4px; color:black; border-radius:10px;'; id='A'"; } else { echo "style='background:rgba(0,255,0,0.4); padding:4px; color:black; border-radius:10px;'; id='B'";} ?>>


                                            <p><?php 
                                           $seat = $this->db->get('onboard_seat')->result();
                                           foreach($seat as $s)
                                           {
                                            $seat = explode("|",$s->seat_no);
                                            $startup= $this->db->get_where('startup',array('id'=>$s->startupid))->row();
                                            
                                            if(in_array($i,$seat)){ echo @$startup->startup_name; }
                                         
                                             
                                           }
                                        ?></p>
                                            <?=$i.":";?>

                                            <input type="checkbox" class='checkbox_check' name="seat[]" value="<?=$i;?>" <?php 
                                           $seat = $this->db->get('onboard_seat')->result();
                                           foreach($seat as $s)
                                           {
                                            $seat = explode("|",$s->seat_no);
                                            $startup= $this->db->get_where('startup',array('id'=>$s->startupid))->row();
                                            
                                            if(in_array($i,$seat)){ echo "checked disabled title='".@$startup->startup_name."'"; }
                                            
                                             
                                           }
                                        ?> />


                                            <img src="<?=base_url('assets/img/seat1.png');?>" width="20px" />
                                        </label>
                                    </div>

                                    <?php
                                      } 
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>