<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Meeting History
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
                                            <th>Mentor Name</th>
                                            <th>Meeting Date</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Meeting Purpose</th>

                                            <th>Status</th>
                                            <th>Response</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $j=$page + 1;
                                           
                                           foreach($meeting as $p)
                                           {
                                              $s = $this->db->get_where('startup',array('id'=>$p->startupid))->row();
                                              $m = $this->db->get_where('mentor',array('id'=>$p->mentorid))->row();
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-startup/<?= $p->startupid; ?>')"><?=$s->startup_name;?></a>
                                            </td>
                                            <td>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-mentor/<?= $p->startupid; ?>')"><?=$m->name;?></a>
                                            </td>

                                            <td><?=$p->meeting_date;?></td>
                                            <td><?=$p->meeting_start;?></td>
                                            <td><?=$p->meeting_end;?></td>
                                            <td><?=$p->meeting_purpose;?></td>

                                            <td>
                                                <?php
                                                     $s = $p->status;   
                                                     if($s=="rejected")
                                                     {
                                                         echo "<label class='bg bg-danger p-2 text-white'>Rejected</label>";
                                                     }
                                                     if($s=="pending")
                                                     {
                                                         echo "<label class='bg bg-warning p-2 text-white'>Pending</label>";
                                                     }
                                                     if($s=="accepted")
                                                     {
                                                         echo "<label class='bg bg-success p-2 text-white'>Accepted</label>";
                                                     }
                                                ?>
                                            </td>
                                            <?php 
                                                if($s=="rejected")
                                                {
                                                    echo "<td>".$p->reject_details."</td>";
                                                }
                                                if($s=="pending")
                                                {
                                                    echo "<td>Pending</td>";
                                                }
                                                if($s=="accepted")
                                                {
                                                    echo "<td>".$p->accept_details."</td>";
                                                }
                                           ?>


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