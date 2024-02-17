<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Event List
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
                                            <th>Event Name</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Type</th>
                                            <th>Link</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         $events = $this->db->get('events')->result();
                                         $j=1;
                                         foreach($events as $e)
                                         {
                                        ?>
                                        <tr>
                                            <td><?=$j;?></td>
                                            <td><?=$e->event_title;?></td>
                                            <td><?= date('d-m-Y @ H:i', strtotime($e->start_evt));?></td>
                                            <td><?= date('d-m-Y @ H:i', strtotime($e->end_evt));?></td>
                                            <td><?=$e->event_type;?></td>
                                            <td><a href="<?=$e->event_link;?>" target="_blank"
                                                    class="btn btn-success"><i class="fa fa-globe"></i></a></td>
                                            <td><?=$e->event_tags;?></td>
                                            <td><?php 
                                              if($e->event_status=='pending')
                                              {
                                                echo "<label class='badge bg-warning'>Pending</label>";
                                              }
                                              if($e->event_status=='publish')
                                              {
                                                echo "<label class='badge bg-success'>Publish</label>";
                                              }
                                              if($e->event_status=='unpublish')
                                              {
                                                echo "<label class='badge bg-danger'>Unpublish</label>";
                                              }
                                            ?></td>
                                            <td>
                                                <a href="<?=base_url();?>Event/publish?eid=<?=$e->id;?>"
                                                    class="btn btn-success">Publish</a>
                                                <a href="<?=base_url();?>Event/unpublish?eid=<?=$e->id;?>"
                                                    class="btn btn-danger">UnPublish</a>
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