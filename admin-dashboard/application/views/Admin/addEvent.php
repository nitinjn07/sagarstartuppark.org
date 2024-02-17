<?php include('header.php'); ?>
<div class="content-wrapper">
    
    <section class="content-header">
      
    </section>

   
    <section class="content">
  <div class="row">
     <div class="col-md-4">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title text-uppercase font-weight-bold">Manage Event</h3>
        </div>
        <div class="card-body">
        
          <?php if(isset($_GET['event_id'])){ 

            $data = $this->db->get_where('events', array('id'=>$_GET['event_id']))->result();

            foreach($data as $d){ ?>

            <form action="<?= base_url(); ?>AddEvent/update_event/<?= $d->id; ?>" method="post" enctype="multipart/form-data">
                 
                  <div class="form-group">
                     <label for="">Event Name</label>
                     <textarea  class="form-control" name="evtContent"><?= $d->evtContent; ?></textarea>
                 </div>

                  <div class="form-group" >
                     <label for="">Event Date</label>
                     <input type="date" class="form-control" name="evtDate" value="<?= $d->evtDate; ?>">
                 </div>
                 
                  <div class="form-group">
                     <label for="">Link</label>
                     <textarea  class="form-control" name="evtLink"><?= $d->evtLink; ?></textarea>
                 </div>

                 <div class="form-group">
                     <label for="">Event Image</label>
                     <input type="file" class="form-control" name="image" onchange="readURL(this)">
                     <img src="<?= base_url().$d->evtImage; ?>" id="blah" width="auto" height="100px" >
                 </div>
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Save">
                 </div>
            </form>

            <?php } } else { ?>
              
              <form action="<?= base_url(); ?>AddEvent/save_event" method="post" enctype="multipart/form-data">
                 
                  <div class="form-group">
                     <label for="">Event Name</label>
                     <textarea  class="form-control" name="evtContent"></textarea>
                 </div>

                  <div class="form-group" >
                     <label for="">Event Date</label>
                     <input type="date" class="form-control" name="evtDate">
                 </div>
                 
                  <div class="form-group">
                     <label for="">Link</label>
                     <textarea  class="form-control" name="evtLink"></textarea>
                 </div>

                 <div class="form-group">
                     <label for="">Event Image</label>
                     <input type="file" class="form-control" name="image" onchange="readURL(this)">
                     <img src="<?= base_url() ?>uploads/events/default.jpg" id="blah" width="auto" height="100px" >
                 </div>
                 <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Save">
                 </div>
              </form>

            <?php } ?>
          
        </div>
        
      </div>
    </div>
    
    <div class="col-md-8">
       <div class="card">
           <div class="card-header">
              <p class="card-title font-weight-bold text-uppercase">All Events</p>
           </div>
           <div class="card-body">
              <table class="table table-bordered" id="example1">
                <thead>
                  <tr>
                    <th>Sr. </th>
                    <th>Name</th>
                    <th width="15%">Date</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php $a = 1; foreach($events as $e) { ?>

                   <tr>
                    <td><?= $a++; ?></td>
                     <td><?= $e->evtContent; ?></td>
                     <td><?php $date = date_create($e->evtDate); echo date_format($date ,'d M, Y');  ?></td>
                     <td><img src="<?= base_url().$e->evtImage; ?>" width="100px" height="50px"></td>
                     <td><a href="<?= base_url();?>AddEvent/deleteEvent?delid=<?=$e->id;?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?');" ><i class="fa fa-trash"></i></a><a href="<?= base_url();?>AddEvent?event_id=<?=$e->id;?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a></td>
                   </tr>
                  
                   <?php  }  ?>

                </tbody>
              </table> 
           </div>
       </div>
    </div>
          
  </div>


  </section>
  
</div>

<?php include('footer.php'); ?>
