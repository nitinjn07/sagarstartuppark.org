<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Add Team Member
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?= base_url();?>Team/addTeam" enctype="multipart/form-data"
                                    method="post">

                                    <div class="form-group">
                                        <label>Select Startup</label>
                                        <select name="startupid" id="startupid" class="form-control" required>
                                            <option value="">Select Startup</option>
                                            <?php
                                              $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1))->result(); 
                                              foreach($startup as $s)
                                              {
                                            ?>
                                            <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>
                                            <?php 
                                              }
                                              ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Select Seat No</label>
                                        <select id="seatno" name="seatno" class="form-control" required>
                                            <option value="">Select Seat No</option>

                                        </select>

                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Contact <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="contact" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Intern <span class="text-danger">*</span></label>
                                        <label><input type="radio" name="intern" value="1" required /> Yes</label>
                                        <label><input type="radio" name="intern" value="0" required /> No</label>

                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Part Time <span class="text-danger">*</span></label>
                                        <label><input type="radio" name="parttime" value="1" required /> Yes</label>
                                        <label><input type="radio" name="parttime" value="0" required /> No</label>

                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label>Role <span class="text-danger">*</span></label>
                                        <input type="text" name="role" class="form-control" required />
                                    </div>
                                    <div class="form-group mt-2 mb-2">
                                        <label> Profile Photo <span class="text-danger">*</span></label>
                                        <input type="file" name="profile" />
                                    </div>
                                    <div class=" form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Add Team">
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
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Member Name</th>
                                            <th>Startup Name</th>
                                            <th>Job Type</th>
                                            <th>Role</th>
                                            <th>SeatNo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                          $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
                                          @$j=$page + 1;
                                           
                                           foreach($team as $t)
                                           {
                                        ?>
                                        <tr>

                                            <td><?=$j;?></td>
                                            <td><img src='<?=base_url('uploads/team/').@$t->profile;?>' width="50px"
                                                    height="50px" />
                                            </td>
                                            <td><a href="javascript:void(0)"
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-team-member/<?= $t->id; ?>')"><?=@$t->name;?></a>
                                            </td>
                                            <td>
                                                <?php 
                                               $n= $this->db->get_where('startup',array('id'=>$t->startup_id))->row();
                                              
                                            ?>
                                                <a href='#'
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/view-startup/<?= @$n->id; ?>')"><?=@$n->startup_name;?></a>

                                            </td>
                                            <td><?php if($t->intern==1){ echo "Internship /"; };?>
                                                <?php if($t->part_time==1){ echo "Part Time"; };?></td>
                                            <td><?=$t->role;?></td>
                                            <td><?=$t->seat_no;?></td>
                                            <td>
                                                <a href="javascript:void(0)"
                                                    onclick="showAjaxModal('<?=base_url(); ?>Popup/index/edit-team-member/<?= $t->id; ?>')"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                                <a href="<?=base_url();?>Team/deleteTeam?startupid=<?=$t->startup_id; ?>&&id=<?=$t->id; ?>?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete');"><i
                                                        class="fa fa-trash"></i></a>
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
        $('#startupid').on('change', function() {

            var id = $('#startupid').val();
            $.ajax({
                method: "GET",
                url: '<?=base_url();?>Team/getSeat',
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#seatno').html(data);
                }
            });



        });
        </script>