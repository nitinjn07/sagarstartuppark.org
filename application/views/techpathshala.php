<?php include 'header.php';?>
<script src="<?=base_url();?>assets/js/cities.js"></script>
     <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');" alt="Top Incubation Center in India">
            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
            <div class="container" style="height: 100px ;margin-bottom:80px;">
                <div class="row align-items-stretch justify-content-center small-screen">
                    <div class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center flex-column">
                       
                        <h4 class="text-white alt-font font-weight-500 w-55 md-w-65 sm-w-80 center-col xs-w-100 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom mt-5">Registration For Techpathshala</h4>
                         <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home" style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Techpathshala</h1>
                    </div>
                  
                </div>
            </div>
        </section>

     <div class="container">
      <div class="row">
   <form action="<?=base_url();?>Techpathshala/savedata" method="post" style="padding-top: 10px;" id="form">          
<div class="col-md-12 row mt-5"  style="border:5px solid grey; border-radius: 20px; box-shadow: 2px 2px 10px grey;">

  <div class="col-md-6" style=" padding-top:40px;">
    <div class="col-sm-12">
            <div class="form-group">
              <label for=""> Student Name <span class="red">*</span></label>
              <input type="text" class="form-control" id="Name" name="name" required>
            </div>
      </div>
      <div class="col-sm-12">
            <div class="form-group">
              <label for="">Gender <span class="red">*</span></label>
              <select class="form-control" name="gender" required>
                  <option value="">Select Gender </option>
                  <option value="male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Others</option>
               
                
              </select>
            </div>
          </div>

           
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Email <span class="red" >*</span></label>
              <input type="email" class="form-control" name="email" data-dj-validator="email,*" id="email" style="margin-bottom: 10px;" required>
               <span id="email_result"></span>
            </div>
           
            
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>School/College Name<span class="red">*</span> </label>
              <textarea name="college" class="form-control" rows="2" required ></textarea>
            </div>
          </div>
  </div>
  <div class="col-md-6" style=" padding-top:40px;">
           <div class="col-sm-12">
            <div class="form-group">
              <label for="Mobilenumber">Mobile <span class="red">*</span></label>
              <input type="text" name="mobile" class="form-control" data-dj-validator="dig,1,10" required>
            </div>
          </div>
    <div class="col-sm-12">
            <div class="form-group">
              <label class="control-label">State<span class="red">*</span></label>
                 <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="state" class="form-control" required></select>
              
            </div>
          </div>

          <div class="col-sm-12">
            <div class="form-group">
              <label for="">City <span class="red">*</span></label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <select id ="state" class="form-control" name="city" required></select>
                            <script language="javascript">print_state("sts");</script>
            </div>
         </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="">Startup Name, if any</label>
              <input type="text" class="form-control"   name="startup" >
            </div>
        </div>
        
       
            
    </div>
    <div class="col-sm-12">
      <input type="checkbox" name="term" value="true" data-dj-validator-group="group" data-dj-validator="check">
        &nbsp; I confirm that this information I provide here is true and this data can be shared with mentors and tutors.<span class="red">*</span></div>
        <div class="col-md-12 " align="center">
    </div>
    
 
<div class="col-sm-12" style="padding-left: 20px; padding-top: 10px;">
<div class="form-group">
<div class="g-recaptcha"
       data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" data-dj-validator-group="group" data-dj-validator="check" ></div>
</div>
</div>
     <div class="col-md-12 " align="center">
        <div class="effect-1">
          <input type="submit" name="techform" class="btn btn-danger " value="Submit" id="validate" disabled>
        </div>
      </div>

</div>
</form>
</div>
</div>
</div>


        <!-- start section -->
       
        <!-- end section -->
<?php include 'footer.php';?>

<script>
 
 $(document).ready(function(){

     $('#email').change(function(){

         var email = $('#email').val();

         if(email != '')
         {
             $.ajax({

                 url: '<?= base_url(); ?>Techpathshala/check_email_avalibility',
                 method: 'POST',
                 data: {email:email},
                 success:function(response)
                 {
                     $('#email_result').html(response);
                 }

             });
         }

     });

 })

</script>