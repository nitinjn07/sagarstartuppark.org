<?php include('header.php'); ?>
<div class="content-wrapper">
    
  <section class="content-header">
    
  </section>

  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Manage Logo</h3>
      </div>
      
       
      <form action="<?= base_url(); ?>Logo/photo_uploads" method="post" enctype="multipart/form-data">
      
        <div class="card-body">

          <?php $logo = $this->db->get_where('logo', array('id'=>1))->row(); ?>
         
         <div class="col-md-12">
              
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                     <label>LOGO</label>
                     <input type="file" name="logoimg" class="form-control" onchange="readURL(this);">
                   </div>
                </div>

                <div class="col-md-8">
                    <img src="<?= base_url().$logo->path; ?>" class="img img-thumbnail" id="blah" width="auto" style="height: 150px;" />
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-md-4">
                  <div class="form-group">
                     <label>Fevicon Icon</label>
                     <input type="file" name="fevicon" class="form-control" onchange="readURL1(this);">
                   </div>
                </div>

                <div class="col-md-8">
                    <img src="<?= base_url().$logo->fevicon; ?>" class="img img-thumbnail" id="blah1" width="auto" style="height: 150px;" />
                </div>
              </div>

              <div class="col-md-8">
                 <div class="form-group">
                    <label>Alt Tag</label>
                   <input type="text" name="alt" class="form-control" value="<?= $logo->alt; ?>">
                 </div>
               </div>
          </div>

        </div>

        <div class="card-footer">
          
           <div class="form-group">
             <input type="submit" class="btn btn-primary" value="Upload Logo">
           </div>

        </div>
         
      </form>
     
    </div>

  </section>
  
</div>
<?php include('footer.php'); ?>


<script type="text/javascript">
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah1').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script> 