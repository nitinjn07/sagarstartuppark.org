<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Job Application List
                    </h1>
                </div>
                <div class="row">

                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table id="datatables" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Apply For</th>
                                            <th>Startup Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>State/City</th>
                                            <th>Address</th>
                                            <th>ZipCode</th>
                                            <th>TotalExperience</th>
                                            <th>Last Company</th>
                                            <th>Higher Qualification</th>
                                            <th>Current CTC</th>

                                            <th>Action</th>
                                        </tr>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          $i=1;
                                          foreach($startup as $s)
                                          {

                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$s->applyfor;?></td>
                                            <td><?php 
                                              $st = $this->db->get_where('startup',array('id'=>$s->startupid))->row();
                                              echo @$st->startup_name;
                                            ?></td>
                                            <td><?=$s->Name;?></td>
                                            <td><?=$s->Email;?></td>
                                            <td><?=$s->Mobile;?></td>
                                            <td><?=$s->State."/".$s->City;?></td>
                                            <td><?=$s->Address;?></td>
                                            <td><?=$s->zipcode;?></td>
                                            <td><?=$s->Total_Experience;?></td>
                                            <td><?=$s->Last_Company_Name;?></td>
                                            <td><?=$s->Higher_Qualification;?></td>
                                            <td><?=$s->Current_CTC;?></td>
                                            <td><a href="<?=base_url();?>JobApplication/deleteJobApplication?delid=<?=$s->id;?>"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php 
                                          $i++;
                                          }
                                        ?>
                                    </thead>
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