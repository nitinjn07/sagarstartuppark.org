<?php include 'header.php';?>


   
    <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');">
            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
            <div class="container" style="height: 100px ;margin-bottom:80px;">
                <div class="row align-items-stretch justify-content-center small-screen">
                     <div class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">
                        
                        <h3 class="text-white text-left">Registration Status Report</h3>
                         <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home" style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Dashboard</h1>
                        <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
                    </div>
                  
                </div>
            </div>
        </section>
         <div class="container">
            <div class="row" id="sagardashboard">
            
            
            
           
             <div class="col-md-4 mt-4">
              
              <div class="card bg-primary">
                  <div class="card-heading p-3">
                      
                       <h4 class="text-white text-center">Total Startups</h4>
                      
                  </div>
                  <div class="card-body">
                      
                      <h4 class="text-white text-center">
                          <?php 
                        
                        echo $this->db->count_all_results('startup')."+";
                      ?>
                      </h4>
                      
                  </div>
                  <div class="card-footer">
                      
                  </div>
              </div>
              </div>
           
             <div class="col-md-4 mt-4">
              
              <div class="card bg-success">
                  <div class="card-heading p-3">
                      
                       <h4 class="text-white text-center">Total Mentors</h4>
                      
                  </div>
                  <div class="card-body">
                      
                      <h4 class="text-white text-center">
                          <?php 
                        
                        echo $this->db->where('delstatus',1)->count_all_results('mentor')."+";
                      ?>
                      </h4>
                      
                  </div>
                  <div class="card-footer">
                      
                  </div>
              </div>
              </div>
             <div class="col-md-4 mt-4">
              
              <div class="card bg-warning">
                  <div class="card-heading p-3">
                      
                       <h4 class="text-white text-center">Total Investor</h4>
                      
                  </div>
                  <div class="card-body">
                      
                      <h4 class="text-white text-center">
                          <?php 
                        
                        echo $this->db->count_all_results('investor')."+";
                      ?>
                      </h4>
                      
                  </div>
                  <div class="card-footer">
                      
                  </div>
              </div>
              </div>
             </div>
            
        </div><!-- End of Sagar Dashboard -->

        
        <!-- start section -->
        <section id="down-section" class="padding-50px-top md-padding-40px-top md-padding-40px-bottom sm-padding-20px-top xs-padding-20px-top sm-padding-25px-bottom">
            <div class="container-fluid padding-seven-lr xl-padding-three-lr md-padding-2-half-rem-lr xs-padding-15px-lr">
                
         
               
               <h5 class="text-center">Startup Registrations</h5>
               <div class="col-md-12 table-responsive" >
                   
                   <?php
                   $i=1;
                  $start = $this->db->order_by('id','Desc')->get('startup')->result();
            
                            if (empty($start)) 
                            {
                            echo"NO Data Found";
                            }
            
                            else
                            {
                                ?>
               <table class="table table-bordered table-striped table-hover " id="datatable">
                   <thead>
                   <tr>
                        <th>S.No.</th>
                        <th>startup Name</th>
                       <th>Mobile</th>
                       <th>Email</th>
                       <th>Website Address</th>
                       <th>Business Type</th>
                        <th>State </th>
                       <th>City </th>
                       <th>Stage</th>
                       
                   </tr>
                   </thead>
                <tbody>
                 <?php foreach ($start as $s) { ?>
                
                <tr>
                    <td><?=$i;?></td>
                    <td><?=$s->startup_name;?></td>
                    <td><?=$s->mobile;?></td>
                    <td><?=$s->email;?></td>
                    <td><?=$s->website_address;?></td>
                    <td><?=$s->type_of_business;?></td>
                    <td><?=$s->state;?></td>
                    <td><?=$s->city;?></td>
                    <td><?=$s->stage;?></td>
                </tr>
                 <?php
                    $i++;
                     }
                    ?>
                    </tbody>
            
               </table>
               <?php
                }
                ?>
               </div>
               
               
                <h5 class="mt-5">Mentor Registrations</h5>
               <div class="col-md-12 table-responsive" id="startup">
                   
                  <?php
       $i=1;
      $start = $this->db->order_by('id','Desc')->get_where('mentor', array('delstatus'=>1))->result();

                if (empty($start)) 
                {
                echo"NO Data Found";
                }

                else
                {
                    ?>
    <table class="table table-bordered table-striped table-hover table-responsive-lg" id="datatable1">
      <thead>
       <tr>
            <th>S.No.</th>
            <th>Mentor Name</th>
           <th>Mobile</th>
           <th>Email</th>
           <th>Linkedin Url</th>
           <th>Sector Experience</th>
            <th>state </th>
           <th>City </th>
          
           
       </tr>
       </thead>
       <tbody>

<?php   foreach ($start as $s)  { ?>

    <tr>
        <td><?=$i;?></td>
        <td><?=$s->name;?></td>
        <td>******</td>
        <td><?=$s->email;?></td>
        <td><a href="<?= $s->linkedin_url;?>" target="_blank" >Linkedin</a></td>
        <td><?=$s->sector_Experience;?></td>
        <td><?=$s->state;?></td>
        <td><?=$s->city;?></td>

    </tr>
     <?php
        $i++;
         }
        ?>
</tbody>
   </table>
   <?php
 }
           

       ?>
               </div>
               
               
                
               <div class="col-md-12 table-responsive" id="startup">
                   <h5 class="mt-5">Invester Registration</h5>
                   
                  <?php
       $i=1;
      $start = $this->db->order_by('id','Desc')->get('investor')->result();

                if (empty($start)) 
                {
                echo"NO Data Found";
                }

                else
                {
                ?> 
    <table class="table table-bordered table-striped table-hover table-responsive-lg" id="datatable2">
        <thead>
       <tr>
            <th>S.No.</th>
            <th>Company Name</th>
           <th>Mobile</th>
           <th>Email</th>
           <th> Amount</th>
           <th>Company Funded</th>
            <th>Type Of Invester</th>
            <th>state  </th>
           <th>City </th>
           <th>Zipcode</th>
           
       </tr>
    </thead>
    <tbody>
<?php
            foreach ($start as $s)
            {

              


                ?>

    <tr>
        <td><?=$i;?></td>
        <td><?=$s->compay_name;?></td>
        <td><?=$s->mobile;?></td>
        <td><?=$s->email;?></td>
        <td><?=$s->total_amount_invested;?></td>
        <td><?=$s->company_funded;?></td>
        <td><?=$s->type_of_invester;?></td>
        <td><?=$s->state;?></td>
        <td><?=$s->city;?></td>
         <td><?=$s->zipcode;?></td>

    </tr>
     <?php
        $i++;
         }
        ?>
</tbody>
   </table>
   <?php
    }
           

       ?>
               </div>
               
               
               
                
    
        </section>

     
<?php include 'footer.php';?>


