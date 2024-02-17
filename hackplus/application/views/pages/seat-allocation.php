<?php  include('header.php'); ?>
<!-- Content_right -->
<div class="container_full">

    <?php  include('sidemenu.php'); ?>

    <div class="content_wrapper">
        <div class="container-fluid">
            <div class="page_breadc">

                <div class="page-heading">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6">
                            <div class="page-breadcrumb">
                                <h1>Seat & House Allocation</h1>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-md-end d-md-flex">
                            <div class="breadcrumb_nav">
                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a class="parent-item" href="#">Home</a>
                                        <i class="fa fa-angle-right"></i>
                                    </li>
                                    <li class="active">
                                        Seat & House Allocation
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Seat & House Allocation</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                  if(isset($_GET['id']))
                                  {
                                     $seat = $this->db->get_where('seat_allocation',array('id'=>$_GET['id']))->row();
                                    ?>
                                <form action="<?=base_url();?>Admin/UpdateSeat" method="post"
                                    enctype="multipart/form-data">


                                    <div class="form-group">
                                        <input type="hidden" name="seatid" value="<?=$seat->id;?>" />
                                        <label for="">Select House</label>
                                        <select name="house" class="form-control bg-white">
                                            <option value="">Select House</option>
                                            <?php
                                             $rs = $this->db->get_where('seat_allocation',array('house_name'=>'h1'));
                                             if($rs->num_rows()<=15)
                                             { 
                                            ?>
                                            <option value="h1" <?php if($seat->house_name=='h1'){echo "selected";} ?>>
                                                House 1 (Himalaya)</option>
                                            <?php 
                                             }
                                            ?>
                                            <?php
                                             $rs = $this->db->get_where('seat_allocation',array('house_name'=>'h2'));
                                             if($rs->num_rows()<=21)
                                             { 
                                            ?>
                                            <option value="h2" <?php if($seat->house_name=='h2'){echo "selected";} ?>>
                                                House 2 ( Vindhya )</option>
                                            <?php 
                                             }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Seat No</label>
                                        <select name="seat" class="form-control bg-white">
                                            <option value="">Select Seat</option>
                                            <?php
                                             for($i=1; $i<=36; $i++)
                                             { 
                                                $rs = $this->db->get_where('seat_allocation',array('seat_no'=>$i));
                                                
                                            ?>
                                            <option value="<?=$i;?>" <?php if($seat->seat_no==$i){echo "selected";} ?>>
                                                <?=$i;?></option>
                                            <?php
                                                
                                             } 
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <input type="submit" class="btn btn-danger btn-block" name="juryname"
                                            value="Allocate" required />
                                    </div>

                                </form>

                                <?php

                                  } 
                                  else 
                                  {
                                ?>
                                <form action="<?=base_url();?>Admin/SeatAllocation" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Select Startup</label>
                                        <select name="sid" class="form-control bg-white">
                                            <option value="">Select Startup</option>
                                            <?php
                                               $startup = $this->db->get_where('startups_reg',array('status'=>'approved'))->result(); 
                                              foreach($startup as $s)
                                              {
                                                $rs = $this->db->get_where('seat_allocation',array('startup_id'=>$s->id));
                                                if($rs->num_rows()==0)
                                                {
                                            ?>
                                            <option value="<?=$s->id;?>"><?=$s->name;?></option>
                                            <?php
                                                } 
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select House</label>
                                        <select name="house" class="form-control bg-white">
                                            <option value="">Select House</option>
                                            <?php
                                             $rs = $this->db->get_where('seat_allocation',array('house_name'=>'h1'));
                                             if($rs->num_rows()<=15)
                                             { 
                                            ?>
                                            <option value="h1">House 1 ( Himalaya )</option>
                                            <?php 
                                             }
                                            ?>
                                            <?php
                                             $rs = $this->db->get_where('seat_allocation',array('house_name'=>'h2'));
                                             if($rs->num_rows()<=21)
                                             { 
                                            ?>
                                            <option value="h2">House 2 ( Vindhya )</option>
                                            <?php 
                                             }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Seat No</label>
                                        <select name="seat" class="form-control bg-white">
                                            <option value="">Select Seat</option>
                                            <?php
                                             for($i=1; $i<=36; $i++)
                                             { 
                                                $rs = $this->db->get_where('seat_allocation',array('seat_no'=>$i));
                                                if($rs->num_rows()==0)
                                                {
                                            ?>
                                            <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php
                                                }
                                             } 
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <input type="submit" class="btn btn-danger btn-block" name="juryname"
                                            value="Allocate" required />
                                    </div>

                                </form>
                                <?php

                                  }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Allocation List
                                </h3>

                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="bs4-table">
                                    <tr>
                                        <th>Sno</th>
                                        <th>Startup Code</th>
                                        <th>Startup Name</th>
                                        <th>House Name</th>
                                        <th>Seat Number</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                      $i=1;
                                      $seats = $this->db->get('seat_allocation')->result();
                                      foreach($seats as $s)
                                      {
                                        $st = $this->db->get_where('startups_reg',array('id'=>$s->startup_id))->row();
                                       
                                        $ppt=$this->db->get_where("final_ppt",array('startup_code'=>$st->startup_code))->row();
                                    
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$st->startup_code;?></td>
                                        <td><?=$st->name;?></td>
                                        <td><?=$s->house_name;?></td>
                                        <td><?=$s->seat_no;?></td>
                                        <td><a href="<?=base_url();?>seat-allocation?id=<?=$s->id;?>"><i
                                                    class="fa fa-edit"></i></a>
                                                    
                                                    <?php
                                                      if(!empty($ppt->ppt_file))
                                                      {
                                                    ?>
                                                    <a href="<?=base_url();?>startup/uploads/ppt/<?=@$ppt->ppt_file;?>" download><i class="fa fa-download"></i></a>
                                                    <?php 
                                                      }
                                                     ?>
                                                    </td>
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



            </section>

        </div>
    </div>

</div>
<!-- Content_right_End -->
<?php include('footer.php'); ?>