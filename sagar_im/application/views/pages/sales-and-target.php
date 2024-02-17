<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Sales & Target </h1>
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Startup Name</th>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Target Sale</th>
                                            <th>Net Sale</th>
                                            <th>Update Datetime</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $j=1;
                                          $sales = $this->db->order_by('id','desc')->get('sales_target')->result();
                                          foreach($sales as $s)
                                          {
                                              
                                          
                                        ?>
                                        <tr>

                                            
                                              <td><?=$j;?></td>
                                              <td><?php 
                                                   $startup=$this->db->get_where('startup',array('id'=>$s->startup_id))->row();
                                                   echo $startup->startup_name;
                                              ?></td>
                                              <td><?=$s->year;?></td>
                                              <td><?=$s->month;?></td>
                                              <td><?="₹ ".number_format($s->target_sale);?></td>
                                              <td><?="₹ ".number_format($s->net_sale);?></td>
                                              <td><?=$s->created_datetime;?></td>

                                        </tr>
                                        <?php 
                                         $j++;
                                          }
                                        
                                        ?>

                                    </tbody>
                                </table>
                                
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