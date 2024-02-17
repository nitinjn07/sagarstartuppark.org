
<style type="text/css">
   .fade:not(.show)
   {
        opacity: 1;
        background: transparent !important;
   }
   .modal
   {
    position: fixed;
    top: 10%;
   }
   .search
   {
    height: 50px;
   }
</style>

<div id="mySearchbar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    
    <div class="modal-content">
      
      <div class="modal-header padding-six-top">
        <p class="text-uppercase font-weight-bold">Search Here</p>
      </div>
      
      <div class="modal-body">
        <input type="text" class="form-control search" id="myInput" placeholder="Enter Any thing For Search" name="search_here">

        <div class="col-md-12" id="all_result">
          
          <ul>

            <li><a href="<?= base_url(); ?>About">About us</a></li>
            <li><a href="<?= base_url(); ?>Privacy">Privacy Policy</a></li>
            <li><a href="<?= base_url(); ?>Startup_form">Startup Registration</a></li>
            <li><a href="<?= base_url(); ?>Mentor_reg">Mentor Registration</a></li>
            <li><a href="<?= base_url(); ?>Invester_form">Investor Registration</a></li>
            <li><a href="<?= base_url(); ?>Partner_form">Partner Registration</a></li>

            <?php $service = $this->db->get('services')->result();
              foreach($service as $s){ ?>

              <li><a href="<?= base_url(); ?>Services#<?= $s->service_name; ?>"><?= $s->service_name; ?></a></li>

            <?php } ?>

            <?php $service = $this->db->get('events')->result();
              foreach($service as $e){ ?>

              <li><a href="<?= base_url(); ?>Blog#<?= $e->evtContent; ?>"><?= $e->evtContent; ?></a></li>

            <?php } ?>

          </ul>

        </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    
    </div>

  </div>
</div>


<script>

$('#all_result').hide();

  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      if (value != '') {
        $("#all_result ul li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
         $('#all_result').show();
      }
      else
      {
      $('#all_result').hide();
      }
    });
  });

</script>

