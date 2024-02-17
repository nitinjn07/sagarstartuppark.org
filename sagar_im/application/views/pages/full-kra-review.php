<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Sprint Review
                    </h1>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <form action="<?=base_url();?>KraReview/FinalKraReview" method="post">
                                    <div class="form-group">
                                        <label class="py-2">Select Startup</label>
                                        <select name="startupid" id="startup" class="form-control" required>
                                            <option value="">Select Startup</option>
                                            <?php
                                              $startup = $this->db->get_where('startup',array('delstatus'=>1,'is_screened'=>1,'startup_type'=>'Physical'))->result();
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
                                        <label class="py-2">Select KRA</label>
                                        <select name="kraid" id="krainfo" class="form-control" required>
                                            <option value="">Select KRA</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea name="review_comment" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="py-2">Review By</label>
                                        <select class="form-control" name="review_by">
                                            <option value="">Select </option>
                                            <?php
                                              $member=$this->db->get_where('screning_committe',array('action'=>'accept'))->result(); 
                                              foreach($member as $m)
                                              {
                                            ?>
                                            <option value="<?=$m->id;?>"><?=$m->name;?></option>
                                            <?php 
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="py-2">KRA Status</label>
                                        <select name="kra_status" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="closed">Closed</option>
                                            <option value="open">Open</option>
                                        </select>
                                    </div>
                                    <div class="form-group py-3">
                                        <input type="submit" class="btn btn-primary btn-lg" value="Save" />
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3>KRA Information</h3>
                            </div>
                            <div class="card-body" id="info">

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

        <script>
        $(document).ready(function() {
            $('#startup').on('change', function() {

                var id = $('#startup').val();

                $.ajax({
                    data: {
                        id: id
                    },
                    url: "<?=base_url();?>KraReview/getKraDetails",
                    type: 'GET',
                    success: function(data) {
                        $('#krainfo').html(data);
                    }
                });

            });


        });
        $(document).ready(function() {
            $('#krainfo').on('change', function() {

                var id = $('#krainfo').val();

                $.ajax({
                    data: {
                        id: id
                    },
                    url: "<?=base_url();?>KraReview/getKraTask",
                    type: 'GET',
                    success: function(data) {

                        $('#info').html(data).trigger('change');
                    }
                });





            });
        });
        </script>