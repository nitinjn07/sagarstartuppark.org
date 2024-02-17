<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Screening Schedule List
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <table class="table" id="datatables-reponsive" width="100%">
                                    <thead>
                                        <tr>

                                            <th>SNo.</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Startups</th>
                                            <th>Screening By</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                           $i=1;
                           
                           foreach($schedule  as $as)
                           {
                        ?>
                                        <tr>
                                            <td><?=$i; ?></td>
                                            <td><?=$as->title;?></td>
                                            <td><?=$as->screening_date;?></td>
                                            <td><?php 
                                       $j=1;
                                       foreach(explode("|",$as->startup_id) as $s)
                                       {
                                         
                                       $stname = $this->db->get_where('startup',array('id'=>$s))->row();
                                       echo "<h2 class='pt-2 pb-2'>".@$stname->startup_name."</h2>";

                                       if(@$stname->is_screened==0)
                                       {
                                          echo "<label class='bg-danger p-1 text-white'> Screening Pending </label> <br/>";
                                       }
                                       else 
                                       {
                                          echo "<label class='bg-success p-1 text-white'>Screening Done </label> <br/>"; 
                                       }

                                       if(@$stname->action=='accept')
                                       {
                                          echo "<label class='bg-success p-1 text-white mt-2'> Application Accepted </label> <br/>";
                                       }
                                       else if(@$stname->action=='reject')
                                       {
                                          echo "<label class='bg-danger p-1 text-white mt-2'> Application Rejected </label> <br/>"; 
                                       }

                                       $j++;   
                                    }
                                   ?></td>
                                            <td><?php 
                                       $j=1;
                                       foreach(explode("|",$as->member_id) as $m)
                                       {
                                       
                                       $member = $this->db->get_where('screning_committe',array('id'=>$m))->row();
                                       echo $j.".".$member->name."<br/>";
                                       $j++;   
                                    }
                                   ?></td>


                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item"
                                                            href="<?=base_url();?>Screening/ScheduleFinalProcess?id=<?=$as->id;?>">Process
                                                            Screening</a>
                                                        <?php 
                                                          if($stname->is_screened==0)
                                                          {
                                                        ?>
                                                        <a class="dropdown-item"
                                                            onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-schedule/<?= $as->id; ?>')"
                                                            href="javascript:void(0);">Edit/Reschedule</a>
                                                        <a class="dropdown-item"
                                                            href="<?=base_url();?>Admin/deleteSchedule?id=<?=$as->id; ?>"
                                                            onclick="return confirm('Are you sure to delete');">Delete</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php 
                        $i++;
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