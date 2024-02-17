<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Co-Founder Request
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
                                            <th>Why Need</th>
                                            <th>What Skills</th>
                                            <th>Skills in Co-Founder</th>
                                            <th>Working Hours</th>
                                            <th>RequestStatus</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cfr = $this->db->get_where('co-founder',array('delstatus'=>1))->result();
                                                 $i=1;
                                           
                                           foreach($cfr as $r)
                                           {
                                            $s = $this->db->get_where('startup',array('id'=>$r->startup_id))->row();
                                        ?>
                                        <tr>

                                            <td><?=$i;?></td>
                                            <td><?=$r->startup_id;?></td>
                                            <td><?=$r->why_need;?></td>
                                            <td><?=$r->skills_looking;?></td>
                                            <td><?=$r->skills_founder;?></td>
                                            <td><?=$r->working_hours;?></td>
                                            <td>
                                                <?php 
                                                 if($r->request_status=='pending')
                                                 {
                                                    echo "<label class='badge bg-warning'>Pending</label>";
                                                 }
                                                 if($r->request_status=='accept')
                                                 {
                                                    echo "<label class='badge bg-success'>Accepted</label>";
                                                 }
                                                 if($r->request_status=='reject')
                                                 {
                                                    echo "<label class='badge bg-danger'>Rejected</label>";
                                                 }
                                                 if($r->request_status=='hold')
                                                 {
                                                    echo "<label class='badge bg-primary'>On Hold</label>";
                                                 }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?=base_url();?>CoFounder/Accept?rid=<?=$r->id?>"
                                                    class="btn btn-success">Accept</a>
                                                <a href="<?=base_url();?>CoFounder/Reject?rid=<?=$r->id?>"
                                                    class="btn btn-danger">Reject</a>
                                                <a href="<?=base_url();?>CoFounder/Hold?rid=<?=$r->id?>"
                                                    class="btn btn-primary">Hold</a>
                                            </td>



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