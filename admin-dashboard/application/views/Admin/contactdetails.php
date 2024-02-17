<?php include('header.php'); ?>
<div class="content-wrapper">
  
  <section class="content-header">
    
  </section>


  <section class="content">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Contact Details</h3>
      </div>
      
      <div class="card-body">
         <div class="col-md-12">
             <form action="<?=base_url();?>ContactDetails/UpdateContact" method="post">
                 
                 <div class="row">
                   
                   <div class="col-sm-6">
                     
                     <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="3"><?=$contact->address;?></textarea>
                     </div>
                     <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" class="form-control" name="phone" value="<?=$contact->phone;?>"/>
                     </div>
                     <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website" value="<?=$contact->website;?>"/>
                     </div>

                   </div>

                   <div class="col-sm-6">

                     <div class="form-group">
                        <label>Fax</label>
                        <input type="text" class="form-control" name="fax" value="<?=$contact->fax;?>"/>
                     </div>
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" name="email" value="<?=$contact->email;?>"/>
                     </div>
                     <div class="form-group">
                        <label>Copyright</label>
                        <textarea name="copyright" class="form-control" rows="3"><?=$contact->copyright;?></textarea>
                     </div>

                   </div>

                 </div>
                
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                 </div>
             </form>
         </div>
      </div>
    
    </div>
    
  </section>

</div>
<?php include('footer.php'); ?>

