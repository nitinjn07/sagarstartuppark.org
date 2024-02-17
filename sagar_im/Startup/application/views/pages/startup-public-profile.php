<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Startup Public Profile
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $rs = $this->db->get_where('public_profile',array('startupid'=>$startup->id))->num_rows();
                                 if($rs==0)
                                 {
                                ?>

                                <form action="<?=base_url();?>StartupPublic/savePublicProfile" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-12 py-2">
                                            <label>LOGO Update from profile section</label>
                                            <br />
                                            <?php 
                                              if($startup->logo)
                                              {
                                            ?>
                                            <img src="<?=base_url('../uploads/logo/').$startup->logo;?>" width="100px"
                                                height="100px" style="border-radius:100%; border:2px solid blue;" />
                                            <?php
                                              }
                                              else 
                                              {
                                             ?>
                                            LOGO UPDATE FROM PROFILE SECTION
                                            <?php
                                              }
                                            ?>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Startup Name</label>
                                            <input type="text" class="form-control" name="startup_name"
                                                value="<?=$startup->startup_name;?>" readonly />
                                            <input type="hidden" name="startupid" value="<?=$startup->id;?>" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Founder Name</label>
                                            <input type="text" placeholder="Founder Name" class="form-control"
                                                name="founder_name" required />
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Short Description <span class="text-danger"> *</span></label>
                                            <textarea name="short_description" class="form-control"
                                                placeholder="Short Description" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Service/Product Description<span class="text-danger">
                                                    *</span></label>
                                            <textarea name="product_services" placeholder="Service or Product Details"
                                                class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Your Message to Peer Startups ( Max 100 Character)<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <textarea name="msg_peer_startup" class="form-control"
                                                placeholder="Message to Peer Startups" required
                                                maxlength="100"></textarea>
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Any other information you want to share ? ( Max 100
                                                Character)</label>
                                            <textarea name="msg_to_share" placeholder="Message to Others"
                                                class="form-control" maxlength="100" required></textarea>
                                        </div>

                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Important Links</label>

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Website</label>
                                            <input type="url" name="website" class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Facebook Link</label>
                                            <input type="url" name="facebook" class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Linkedin </label>
                                            <input type="url" name="linkedin" class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Instagram </label>
                                            <input type="url" name="instagram" class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Youtube </label>
                                            <input type="url" name="youtube" class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Twitter</label>
                                            <input type="url" name="twitter" class="form-control" />

                                        </div>
                                        <div class="form-group col-md-12 py-2 text-center">
                                            <input type="submit" class="btn btn-primary" value="Save Profile" />
                                        </div>
                                    </div>
                                </form>
                                <?php 
                                 }
                                 else 
                                 {
                                    $pub = $this->db->get_where('public_profile',array('startupid'=>$startup->id))->row();
                                
                                 ?>
                                <form action="<?=base_url();?>StartupPublic/savePublicProfile" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-12 py-2">
                                            <label>LOGO </label>
                                            <br />
                                            <img src="<?=base_url('../uploads/logo/').$startup->logo;?>" width="100px"
                                                height="100px" style="border-radius:100%; border:2px solid blue;" />
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Startup Name</label>
                                            <input type="text" class="form-control" name="startup_name"
                                                value="<?=$startup->startup_name;?>" readonly />
                                            <input type="hidden" name="startupid" value="<?=$startup->id;?>" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Founder Name</label>
                                            <input type="text" placeholder="Founder Name" class="form-control"
                                                name="founder_name" value="<?=$pub->founder_name;?>" required />
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Short Description <span class="text-danger"> *</span></label>
                                            <textarea name="short_description" class="form-control"
                                                placeholder="Short Description"
                                                required><?=$pub->short_description;?></textarea>
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Service/Product Description<span class="text-danger">
                                                    *</span></label>
                                            <textarea name="product_services" placeholder="Service or Product Details"
                                                class="form-control" required><?=$pub->product_services;?></textarea>
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Your Message to Peer Startups ( Max 100 Character)<span
                                                    class="text-danger">
                                                    *</span></label>
                                            <textarea name="msg_peer_startup" class="form-control"
                                                placeholder="Message to Peer Startups" required
                                                maxlength="100"><?=$pub->msg_peer_startup;?></textarea>
                                        </div>
                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Any other information you want to share ? ( Max 100
                                                Character)</label>
                                            <textarea name="msg_to_share" placeholder="Message to Others"
                                                class="form-control" maxlength="100"
                                                required><?=$pub->msg_to_share;?></textarea>
                                        </div>

                                        <div class="form-group col-md-12 py-1">
                                            <label for="">Important Links</label>

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Website</label>
                                            <input type="url" value="<?=$pub->website;?>" name="website"
                                                class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Facebook Link</label>
                                            <input type="url" value="<?=$pub->facebook;?>" name="facebook"
                                                class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Linkedin </label>
                                            <input type="url" value="<?=$pub->linkedin;?>" name="linkedin"
                                                class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Instagram </label>
                                            <input type="url" value="<?=$pub->instagram;?>" name="instagram"
                                                class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Youtube </label>
                                            <input type="url" value="<?=$pub->youtube;?>" name="youtube"
                                                class="form-control" />

                                        </div>
                                        <div class="form-group col-md-6 py-1">
                                            <label for="">Twitter</label>
                                            <input type="url" value="<?=$pub->twitter;?>" name="twitter"
                                                class="form-control" />

                                        </div>
                                        <div class="form-group col-md-12 py-2 text-center">
                                            <input type="submit" class="btn btn-primary" value="Save Profile" />
                                        </div>
                                    </div>
                                </form>
                                <?php  
                                 }
                                 ?>

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