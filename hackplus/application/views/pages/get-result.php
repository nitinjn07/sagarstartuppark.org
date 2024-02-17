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
                                <h1>Final Result</h1>
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
                                        Final Result
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <section>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Final Results</h3>
                            </div>
                            <div class="card-body">
                                <iframe id="txtArea1" style="display:none"></iframe>
                                <button id="btnExport" class="btn btn-success mb-3" onclick="fnExcelReport();"> EXPORT
                                </button>

                                <table id="mytable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>Startup Name</th>
                                            <th>House Name</th>
                                            <th>Seat No</th>
                                            <th>Total Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                      $i=1;
                                      $startups = $this->db->get_where('startups_reg',array('status'=>'approved'))->result();
                                      foreach($startups as $s)
                                      {
                                         $r = $this->db->get_where('seat_allocation',array('startup_id'=>$s->id))->num_rows();
                                         if($r>0)
                                         {
                                            $house = $this->db->get_where('seat_allocation',array('startup_id'=>$s->id))->row();
                                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$s->name;?></td>
                                            <td><?=$house->house_name;?></td>
                                            <td><?=$house->seat_no;?></td>
                                            <td>

                                                <?php 
                                            
                                             $p=0;
                                             $s=0;
                                             $t=0;
                                             $v=0;
                                             $sus=0;
                                             $f=0;
                                             $skill=0;

                                             

                                             

                                             $res = $this->db->get_where('startup_marking',array('startup_id'=>$house->startup_id))->result();
                                             foreach($res as $r)
                                             {
                                                  $p = $p + $r->problem;
                                                  $s = $s + $r->solution;
                                                  $t = $t + $r->technology;
                                                  $v = $v + $r->validation;
                                                  $sus = $sus + $r->sustainability;
                                                  $f = $f + $r->feasibility;
                                                  $skill = $skill + $r->skills;

                                                  
                                                  
                                                
                                             }

                                             $total_marks = $p + $s + $t + $v + $sus + $f + $skill;               

                                             echo $total_marks;
                                           ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php 
                                         }
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