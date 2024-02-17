<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Free Software Resource List
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
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                     $res = $this->db->get_where('resouces',array('delstatus'=>1))->result(); 
                     $i=1;
                     foreach($res as $r)
                     {
                    ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$r->type;?></td>
                                            <td><?=$r->title;?></td>
                                            <td><?=$r->description;?></td>
                                            <td><a href="<?=$r->link;?>" target="_blank" class="btn btn-success">Click
                                                    Here</a></td>

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