<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Scheme / Policy
                    </h1>
                </div>
                <div class="row">

                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?=base_url();?>Resources/ResourcesList">Go Back</a>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered" id="datatables-buttons">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Policy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                     $res = $this->db->get_where('scheme',array('delstatus'=>1))->result(); 
                     $i=1;
                     foreach($res as $r)
                     {
                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$r->title;?></td>
                                            <td><?=$r->description;?></td>

                                            <td><a href="<?=base_url('../uploads/scheme/').$r->document;?>"
                                                    target="_blank" class="btn btn-success">Click Here</a></td>

                                        </tr>
                                        <?php 
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