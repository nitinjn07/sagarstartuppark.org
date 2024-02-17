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
                                <h1>Tshirt Details</h1>
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
                                        Tshirt Details
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
                                <h3>TShirts Details</h3>
                            </div>
                            <div class="card-body">
                                <h2> Team - Himalaya </h2>
                                <table class="table">

                                    <tr>
                                        <td>SNO</td>
                                        <td>Startup Name</td>
                                        <td>Mobile</td>
                                        <td>S </td>
                                        <td>M</td>
                                        <td>L</td>
                                        <td>XL</td>
                                        <td>XXL</td>

                                    </tr>
                                    <?php
                                      $t1 = $this->db->limit(15,0)->get_where('startups_reg',array('status'=>'approved'))->result();
                                      $s_total = 0;
                                      $m_total = 0;
                                      $l_total = 0;
                                      $xl_total = 0;
                                      $xxl_total = 0;
                                      $i=1;
                                      foreach($t1 as $t)
                                      {
                                        $s = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'S'))->num_rows();
                                        $m = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'M'))->num_rows();
                                        $l = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'L'))->num_rows();
                                        $xl = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'XL'))->num_rows();
                                        $xxl = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'XXL'))->num_rows();
                                             
                                        $total = $s+$m+$l+$xl+$xxl;

                                    ?>
                                    <tr <?php if($total==0){ echo "class='bg-info text-white'"; }?>>
                                        <td><?=$i;?></td>
                                        <td><?=$t->name;?></td>
                                        <td><?=$t->mobile;?></td>
                                        <td><?=$s;?></td>
                                        <td><?=$m;?></td>
                                        <td><?=$l;?></td>
                                        <td><?=$xl;?></td>
                                        <td><?=$xxl;?></td>
                                    </tr>
                                    <?php 
                                       
                                       $s_total = $s_total + $s;
                                       $m_total = $m_total + $m;
                                       $l_total = $l_total + $l;
                                       $xl_total = $xl_total + $xl;
                                       $xxl_total = $xxl_total + $xxl;
                                       $i++;
                                      }
                                    ?>
                                    <tr>
                                        <td colspan="3"> TOTAL </td>
                                        <td><?=$s_total;?></td>
                                        <td><?=$m_total;?></td>
                                        <td><?=$l_total;?></td>
                                        <td><?=$xl_total;?></td>
                                        <td><?=$xxl_total;?></td>
                                    </tr>
                                </table>


                                <h2> Team - Vindhya </h2>
                                <table class="table">

                                    <tr>
                                        <td>SNo.</td>
                                        <td>Startup Name</td>
                                        <td> Mobile Number </td>
                                        <td>S </td>
                                        <td>M</td>
                                        <td>L</td>
                                        <td>XL</td>
                                        <td>XXL</td>

                                    </tr>
                                    <?php
                                    $i=1;
  $t1 = $this->db->limit(50,16)->get_where('startups_reg',array('status'=>'approved'))->result();
  $s_total = 0;
  $m_total = 0;
  $l_total = 0;
  $xl_total = 0;
  $xxl_total = 0;

  foreach($t1 as $t)
  {
    $s = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'S'))->num_rows();
    $m = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'M'))->num_rows();
    $l = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'L'))->num_rows();
    $xl = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'XL'))->num_rows();
    $xxl = $this->db->get_where('team',array('startup_code'=>$t->startup_code,'tshirt_size'=>'XXL'))->num_rows();
         
    $total = $s+$m+$l+$xl+$xxl;

?>
                                    <tr <?php if($total==0){ echo "class='bg-info text-white'"; }?>>
                                        <td><?=$i;?></td>
                                        <td><?=$t->name;?></td>
                                        <td><?=$t->mobile;?></td>
                                        <td><?=$s;?></td>
                                        <td><?=$m;?></td>
                                        <td><?=$l;?></td>
                                        <td><?=$xl;?></td>
                                        <td><?=$xxl;?></td>
                                    </tr>
                                    <?php 
   
   $s_total = $s_total + $s;
   $m_total = $m_total + $m;
   $l_total = $l_total + $l;
   $xl_total = $xl_total + $xl;
   $xxl_total = $xxl_total + $xxl;
   $i++;
  }
?>
                                    <tr>
                                        <td colspan="3"> TOTAL </td>
                                        <td><?=$s_total;?></td>
                                        <td><?=$m_total;?></td>
                                        <td><?=$l_total;?></td>
                                        <td><?=$xl_total;?></td>
                                        <td><?=$xxl_total;?></td>
                                    </tr>
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