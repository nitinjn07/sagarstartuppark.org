<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Upload Startup Document
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>UploadDocument/StartupUpload" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="mb-2 mt-3">Select Startup</label>
                                            <?php 
                                            $startup = $this->db->get_where('startup',array('action'=>'accept','is_screened'=>1))->result(); 

                                            
                                            ?>
                                            <select class="form-control" name="startupid">

                                                <option value="">Select Startup </option>
                                                <?php
                                            foreach($startup as $s)
                                            {                                            
                                            ?>
                                                <option value="<?=$s->id;?>"><?=$s->startup_name;?></option>

                                                <?php 
                                            }

                                            ?>

                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-2 mt-3">Elecator Pitch</label>
                                            <textarea class="form-control" name="elector_pitch"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">Startup Leagal Registration</label>
                                            <select class="form-control" name="legal_reg">
                                                <option value="">Select Registration Type</option>
                                                <option value="Private_Limited">Private Limited</option>
                                                <option value="Limited_Liability_Partnership">LLP</option>
                                                <option value="Partnership_Firm">Partnership Firm</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">Registration Number</label>
                                            <input type="text" class="form-control" name="reg_no" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">Upload COI</label>
                                            <input type="file" class="form-control" name="coi_file" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">Upload PAN</label>
                                            <input type="file" class="form-control" name="pan_file" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">DPIIT Number</label>
                                            <input type="text" class="form-control" name="dpiit_number" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">DPIIT Certificate</label>
                                            <input type="file" class="form-control" name="dpiit_file" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">MSME Certificate</label>
                                            <input type="file" class="form-control" name="msme_file" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-2 mt-3">Upload Incubation Aggreement</label>
                                            <input type="file" class="form-control" name="incubation_file" />
                                        </div>
                                        <div class="col-md-12 pt-3 text-center">
                                            <input type="submit" class="btn btn-primary" />
                                        </div>
                                    </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
    </div>
    </main>

    <?=include('common/footer.php');?>