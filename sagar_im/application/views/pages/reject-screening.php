<?=include('common/header.php');?>
<?=include('common/sidebar.php');?>
<div class="main">
    <?=include('common/topNav.php');?>
    <div class="main">
        <main class="content">
            <div class="container-fluid">
                <div class="header">
                    <h1 class="header-title">
                        Reject Screening
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-body">

                                <form action="<?=base_url();?>Screening/ScreeningProcessReject" method="post"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="startupid" value="<?=$_GET['startupid'];?>" />
                                    <input type="hidden" name="scheduleid" value="<?=$_GET['scheduleid'];?>" />

                                    <div class="form-group">
                                        <label>Write Reason for Rejection</label>
                                        <textarea class="form-control" name="remark"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Review Document</label>
                                        <input type="file" name="screening_doc" class="form-control" />
                                    </div>

                                    <div class="form-group mt-2 mb-2">
                                        <input type="submit" class="btn btn-primary" value="Submit Now" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <?=include('common/footer.php');?>