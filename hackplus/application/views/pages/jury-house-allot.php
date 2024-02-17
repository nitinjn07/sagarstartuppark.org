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
                                <h1>Jury House Allot</h1>
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
                                        Jury House Allot
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section>
                <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add New Jury</h3>
                            </div>
                            <div class="card-body">
                                <?php 
                                  if(isset($_GET['id']))
                                  {

                                   $seat=  $this->db->get_where('jury_house_allot',array('id'=>$_GET['id']))->row();
                                    ?>
                                <form action="<?=base_url();?>Admin/UpdateJuryHouse" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group">
                                        <input type="hidden" name="juryhouseid" value="<?=$seat->id;?>" />
                                        <label for="">Jury Name</label>
                                        <select name="juryid" class="form-control bg-white">
                                            <option value="">Select Jury</option>
                                            <?php
                                              $jury = $this->db->get_where('jury',array('status'=>1))->result();
                                              foreach($jury as $j)
                                              { 
                                            ?>
                                            <option value="<?=$j->id;?>"
                                                <?php if($j->id==$seat->jury_id){ echo "selected"; } ?>>
                                                <?=$j->jury_name;?></option>
                                            <?php 
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select House</label>
                                        <select name="housename" class="form-control bg-white">
                                            <option value="">Select House</option>
                                            <option value="h1" <?php if($seat->house_no=='h1'){ echo "selected"; } ?>>
                                                House - 1</option>
                                            <option value="h2" <?php if($seat->house_no=='h2'){ echo "selected"; } ?>>
                                                House - 2</option>
                                            <option value="h3" <?php if($seat->house_no=='h3'){ echo "selected"; } ?>>
                                                House - 3</option>
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <input type="submit" class="btn btn-danger btn-block" name="juryname"
                                            value="Save" required />
                                    </div>

                                </form>
                                <?php
                                    
                                  }
                                  else 
                                  {
                                    ?>

                                <form action="<?=base_url();?>Admin/JuryAllotHouse" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="">Jury Name</label>
                                        <select name="juryid" class="form-control bg-white">
                                            <option value="">Select Jury</option>
                                            <?php
                                              $jury = $this->db->get_where('jury',array('status'=>1))->result();
                                              foreach($jury as $j)
                                              { 
                                            ?>
                                            <option value="<?=$j->id;?>"><?=$j->jury_name;?></option>
                                            <?php 
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Select House</label>
                                        <select name="housename" class="form-control bg-white">
                                            <option value="">Select House</option>
                                            <option value="h1">House - 1</option>
                                            <option value="h2">House - 2</option>
                                            <option value="h3">House - 3</option>
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <input type="submit" class="btn btn-danger btn-block" name="juryname"
                                            value="Save" required />
                                    </div>

                                </form>
                                <?php

                                  }

                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="card">
                            <div class="card-header">
                                <h3>List of Jury</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>SNo.</th>
                                        <th>Jury Code</th>
                                        <th>Jury Name</th>
                                        <th>House</th>

                                        <th>Action</th>

                                    </tr>
                                    <?php
                                      $jury = $this->db->get('jury_house_allot')->result();
                                      $i=1;
                                      foreach($jury as $j)
                                      { 

                                        $info = $this->db->get_where('jury',array('id'=>$j->jury_id))->row();
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><?=$info->jury_code;?></td>
                                        <td><?=$info->jury_name;?></td>
                                        <td><?=$j->house_no;?></td>

                                        <td><a href="<?=base_url();?>jury-house-allot?id=<?=$j->id;?>"><i
                                                    class="fa fa-edit btn btn-warning"></i></a>
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