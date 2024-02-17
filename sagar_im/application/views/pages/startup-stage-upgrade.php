<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Stage Upgrade
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?=base_url('StageUpgrade/upgradeStage');?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="" class="py-2">Startup *</label>
                                        <select name="startupid" class="form-control" id="startupid" required>
                                            <option value="">Select Startup</option>
                                            <?php
                                              $startup = $this->db->get_where('startup',array('startup_type'=>'Physical','is_graduate'=>0,'delstatus'=>1))->result(); 
                                              foreach($startup as $s)
                                              {
                                            ?>
                                            <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                            <?php
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Current Stage</label>
                                        <input type="text" name="current_stage" id="current_stage" readonly
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">New Stage to Upgrade *</label>
                                        <select name="upgrade_stage" class="form-control" required>
                                            <option value=""> Select New Stage </option>
                                            <?php 
                                          include('stages.php');
                                          foreach($stages as $id=>$name)
                                          {
                                       ?>
                                            <option value="<?=$name;?>"><?= str_replace("_"," ",$name);?></option>
                                            <?php
                                          }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Stage Upgradation Date *</label>
                                        <input type="date" name="upgrade_date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Document ( In PDF Formate ) *</label>
                                        <input type="file" name="upgrade_doc" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="py-2">Comment *</label>
                                        <textarea class="form-control" name="comment" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Upgrade Now" />
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-8">
                        <div class="card">

                            <div class="card-body">
                                <table id="datatables-buttons" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Startup Name</th>
                                            <th>Prev Stage</th>
                                            <th>New Stage</th>
                                            <th>Upgradation Date</th>
                                            <th>Comment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $stages = $this->db->get_where('stage_upgrade')->result(); 
                                          foreach($stages as $s)
                                          {
                                             $startup = $this->db->get_where('startup',array('id'=>$s->startupid))->row();
                                        ?>
                                        <tr>
                                            <td><?=$startup->startup_name;?></td>
                                            <td><?=$s->current_stage;?></td>
                                            <td><?=$s->upgrade_stage;?></td>
                                            <td><?=$s->upgrade_date;?></td>
                                            <td><a href="<?=base_url('uploads/upgrade_doc/').$s->upgrade_doc;?>"
                                                    target="_blank" class="btn btn-primary">Download</a>
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
        $('#startupid').on('change', function() {

            var id = $('#startupid').val();



            $.ajax({
                type: "GET",
                url: '<?=base_url();?>StageUpgrade/getStageDetail',
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#current_stage').val(data);
                }
            });

        });
        </script>
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