<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Physical Startup
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Startup Name</th>

                                            <th>Product/Services</th>
                                            <th>City</th>
                                            <th>On Boarding</th>
                                            <th>Tentative Graduate</th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page+1;
                                           
                                           foreach($startups as $st)
                                           {
                                            $onboard = $this->db->get_where('onboard_seat',array('startupid'=>$st->id))->row();
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td><a href='<?=base_url('/Dashboard/ViewStartupProfile?sid='.$st->id);?>'
                                                    target="_blank"><?=$st->startup_name;?></a>
                                            </td>


                                            <td><?=$st->product_service_summary;?></td>
                                            <td><?=$st->city;?></td>
                                            <td>
                                                <?php  
                                                
                                                if($onboard->on_board_date)
                                                {
                                                    echo date("d-m-Y",strtotime(@$onboard->on_board_date));

                                                }
                                                else 
                                                {
                                                    echo "NA";
                                                }
                                            
                                              ?>
                                            </td>
                                            <td>
                                                <?php 
                                                  if($onboard->on_board_date)
                                                  {
                                                      echo date("d-m-Y",strtotime(@$onboard->graduate_date));
  
                                                  }
                                                  else 
                                                  {
                                                    echo "NA";
                                                  }
                                                ?>
                                            </td>


                                            <td>
                                                <a class="btn btn-warning"
                                                    href="<?= base_url(); ?>AcceptedApplication/EditStartup?id=<?= $st->id; ?>"><i
                                                        class="fa fa-edit"></i></a>
                                            </td>

                                        </tr>
                                        <?php 
                                         $j++;
                                           }
                                        ?>

                                    </tbody>
                                </table>
                                <p id="pagination"><?php echo $links; ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables with Buttons
            var datatablesButtons = $("#datatables-buttons").DataTable({
                responsive: true,
                buttons: ["copy", "print"],
                fixedHeader: true,
                bPaginate: false,
                bInfo: false
            });
            datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)");
        });
        </script>