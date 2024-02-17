<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Meeting List
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th>Id</th>
                                            <th>Meeting Date</th>
                                            <th>Meeting Start</th>
                                            <th>Meeting End</th>
                                            <th>Meeting Purpose</th>
                                            <th>Mentor Name</th>
                                            <th>Status</th>
                                            <th>Response</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($meeting as $m)
                                            {
                                      ?>
                                        <tr>
                                            <td><?=$m->id; ?></td>
                                            <td><?=date("d-m-Y",strtotime($m->meeting_date)); ?></td>
                                            <td><?=$m->meeting_start; ?></td>
                                            <td><?=$m->meeting_end; ?></td>
                                            <td><?=$m->meeting_purpose; ?></td>
                                            <td>
                                                <?php
                                                  $id = $m->mentorid; 
                                                  $mentor = $this->db->get_where('mentor',array('id'=>$id))->row();
                                                  echo $mentor->name;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                     $s = $m->status;   
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
                                                $s = $m->status;
                                                if($s=="rejected")
                                                {
                                                    echo "<td>".$m->reject_details."</td>";
                                                }
                                                if($s=="pending")
                                                {
                                                    echo "<td>Pending</td>";
                                                }
                                                if($s=="accepted")
                                                {
                                                    echo "<td>".$m->accept_details."</td>";
                                                }
                                           ?>

                                            <td>

                                                <?php $link = $this->db->get_where('meeting_details', array('mid'=>$m->id)); if($link->num_rows() > 0){ ?>

                                                <a href="<?= $link->row()->link; ?>" class="btn btn-primary"
                                                    target="_blank">
                                                    Join
                                                </a>

                                                <?php } ?>

                                            </td>
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