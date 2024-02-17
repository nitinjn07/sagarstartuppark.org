<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Arohini Listing
                    </h1>
                </div>
                <div class="row">

                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Location</th>
                                            <th>Idea</th>
                                            <th>Registration Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $web = $this->load->database('webpanel', TRUE);
                                          $data = $web->get('arohini')->result();
                                          $i=1;
                                           foreach($data as $j)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$i;?></td>
                                           
                                            <td><?=$j->name;?></td>
                                             <td><?=$j->email;?></td>
                                              <td><?=$j->mobile;?></td>
                                               <td><?=$j->city_name;?></td>
                                               <td><?=$j->startup_idea;?></td>
                                                <td><?=$j->created_datetime;?></td>
                                            
                                            


                                            

                                        </tr>
                                        <?php 
                                         $i++;
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