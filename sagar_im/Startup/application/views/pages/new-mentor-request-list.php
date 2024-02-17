<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        New Mentor Requested
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
                                            <th>Finding Mentor in Category</th>
                                            <th>Problem which dicuss</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $s = $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
                                           $req = $this->db->get_where('new_mentor_request',array('startup_id'=>$s->id))->result(); 
                                           $i=1;
                                           foreach($req as $r)
                                           {
                                        ?>

                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$r->category;?></td>
                                            <td><?=$r->problem;?></td>
                                            <td><?=$r->status;?></td>

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