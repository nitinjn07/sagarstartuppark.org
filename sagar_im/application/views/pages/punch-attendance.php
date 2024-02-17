<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Attendance
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Startup Daily Attendance</h2>
                            </div>
                            <div class="card-body">
                                <form action="<?=base_url();?>Attendance/PresentStartup" method="post">
                                    <div class="row">
                                        <div class='col-md-12'>
                                            <input type="submit" class="btn btn-primary btn-lg px-3 py-2"
                                                value="PUNCH" />
                                        </div>
                                        <?php
                                             
                                      for($i=1; $i<=83; $i++)
                                      {
                                        $check_attd = $this->db->get_where('startup_attendance',array('seat_no'=>$i,'attd_date'=>date('d-m-Y'),'status'=>'P'));
                                        if($i==1)
                                        {
                                            echo '<div class="col-lg-12 pt-4"> <h3> WING A</h3> <br /></div>';
                                        } 
                                        if($i==46)
                                        {
                                            echo '<div class="col-lg-12 pt-4"> <h3> WING B</h3> <br /></div>';
                                        }
                                     ?>
                                        <div class="col-lg-3 mx-1 my-2" <?php if($i>0 && $i<=45) { 
                                                    if($check_attd->num_rows()>0)
                                                    {
                                                        echo "style='background:brown; padding:3px; color:white; border-radius:10px;'; id='A'"; 
                                                    }
                                                    else 
                                                    {
                                                    echo "style='background:rgba(0,0,255,0.4); padding:4px; color:white; border-radius:10px;'; id='A'"; 
                                                    }
                                                } else { 

                                                    if($check_attd->num_rows()>0)
                                                    {
                                                    
                                                    echo "style='background:brown; padding:4px; color:white; border-radius:10px;'; id='B' disabled";
                                                    }
                                                    else 
                                                    {
                                                        echo "style='background:rgba(0,255,0,0.4); padding:4px; color:black; border-radius:10px;'; id='B'";
                                                    }
                                                    } ?>>
                                            <label class="m-2 p-2">


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

                                                <input type="checkbox" class='checkbox_check' name="seat[]"
                                                    value="<?=$i;?>" <?php 
                                           $seat = $this->db->get('onboard_seat')->result();
                                           foreach($seat as $s)
                                           {
                                            $seat = explode("|",$s->seat_no);
                                            $startup= $this->db->get_where('startup',array('id'=>$s->startupid))->row();
                                            
                                            if(in_array($i,$seat)){ echo "title='".@$startup->startup_name."'"; }
                                            
                                             
                                           }
                                        ?> />

                                                <?php 
                                              if($check_attd->num_rows()>0)
                                              {
                                                echo "<label class='text-danger'>PUNCHED<label>";
                                              }
                                              else 
                                              {

                                              
                                            ?>

                                                <img src="<?=base_url('assets/img/seat1.png');?>" width="20px" />
                                                <?php 
                                              }
                                            ?>
                                            </label>
                                        </div>

                                        <?php
                                      } 
                                    ?>
                                        <div class='col-md-12 text-center'>
                                            <input type="submit" class="btn btn-primary btn-lg m-5" value="PUNCH" />
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>