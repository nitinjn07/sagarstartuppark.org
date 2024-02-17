<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Login History <?=date('d-m-Y');?>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">



                                <table id="datatables-buttons" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SNO.</th>
                                            <th>Startup Name</th>
                                            <th>Login Date</th>
                                            <th>Login Time</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $login = $this->db->get_where('startup_login_history',array('login_date'=>date('d-m-Y')))->result(); 
                                          $i=1;
                                          foreach($login as $l)
                                          {
                                             $startup = $this->db->get_where('startup',array('id'=>$l->startupid))->row();
                                        ?>
                                        <tr>
                                            <td><?=$i;?></td>
                                            <td><?=$startup->startup_name;?></td>
                                            <td><?=$l->login_date;?></td>
                                            <td><?= substr($l->login_time,8,10);?></td>

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
            datatablesButtons.buttons().container().appendTo(
                "#datatables-buttons_wrapper .col-md-6:eq(0)");
        });
        </script>