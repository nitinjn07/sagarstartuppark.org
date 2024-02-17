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
                                <h1>Add Jury</h1>
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
                                        Add jury
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
                                <h3>Add New Jury </h3>
                            </div>
                            <div class="card-body">
                                <form action="<?=base_url();?>Admin/addJury" method="post"
                                    enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="">Jury Name</label>
                                        <input type="text" class="form-control bg-white" name="jury_name"
                                            placeholder="Jury Name" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jury Profile</label>
                                        <input type="text" class="form-control bg-white" name="jury_profile"
                                            placeholder="Jury Profile" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jury Email</label>
                                        <input type="text" class="form-control bg-white" name="jury_email"
                                            placeholder="Jury Email" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jury Mobile</label>
                                        <input type="text" class="form-control bg-white" name="jury_mobile"
                                            placeholder="Jury Mobile" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">LinkedIn</label>
                                        <input type="text" class="form-control bg-white" name="jury_linkedin"
                                            placeholder="LinkedIn URL" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <input type="file" class="form-control bg-white" name="juryphoto" required />
                                    </div>
                                    <div class="form-group">

                                        <input type="submit" class="btn btn-danger btn-block" name="juryname"
                                            value="Save" required />
                                    </div>

                                </form>
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
                                        <th>Photo</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>LinkedIn</th>
                                        <th>Jury Profile</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php
                                      $jury = $this->db->get_where('jury',array('status'=>1))->result();
                                      $i=1;
                                      foreach($jury as $j)
                                      { 
                                    ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td><img src="<?=base_url('uploads/').$j->jury_photo;?>" width="50px"
                                                height="50px" /></td>
                                        <td><?=$j->jury_code;?></td>
                                        <td><?=$j->jury_name;?></td>
                                        <td><?=$j->jury_email;?></td>
                                        <td><?=$j->jury_mobile;?></td>
                                        <td><a href="<?=$j->jury_linkedin;?>" target="_blank"><i
                                                    class="fa fa-linkedin"></i></a></td>
                                        <td>
                                            <?=$j->jury_profile;?>
                                        </td>
                                        <td><a href="<?=base_url();?>Admin/DeleteJury?id=<?=$j->id;?>"><i
                                                    class="fa fa-trash btn btn-danger"></i></a>
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