<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Complaint / Suggestion
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
                                            <th>Type</th>
                                            <th>Review</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Date/Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $web = $this->load->database('webpanel',TRUE);
                                          $com = $web->get_where('ccs')->result();
                                          $i=1;
                                          foreach($com as $c)
                                          { 
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$c->i_have_a;?></td>
                                            <td><?=$c->description;?></td>
                                            <td><?=$c->first_name." ".$c->last_name;?></td>
                                            <td><?=$c->phone;?></td>
                                            <td><?=$c->email;?></td>
                                            <td><?=$c->created_datetime;?></td>
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