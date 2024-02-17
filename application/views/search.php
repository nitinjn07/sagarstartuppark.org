<?php include 'header.php';?>
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);



.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 15px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width:100%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

 <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');" alt="Incubation Center in Madhya Pradesh">
            <div class="opacity-extra-medium bg-extra-dark-gray"></div>
            <div class="container" style="height: 100px ;margin-bottom:80px;">
                <div class="row align-items-stretch justify-content-center small-screen">
                    <div class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">
                        
                        <h2 class="text-white text-left">Search Result</h2>
                     <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home" style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;Search Result</h1>
                        <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
                    </div>
                  
                </div>
            </div>
        </section>

    
        <!-- start section -->
        <section id="about" class="bg-light-gray pb-5">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="wrap">
        <div class="search">
      <input type="text" class="searchTerm" id="myInput" type="text" placeholder="Search..">
        <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
        </button>
        </div>
        </div>
        </div>

        </div>
        </div>
        </section>
        <!-- end section -->
        <!-- start section -->
       <section id="about" class="bg-light-gray pb-5">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
      
        <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>id</th>
      <th>Page Name</th>
        <th>title</th>
        <th>Discription</th>
        <th>url</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php
      $i=1;
      $rs =$this->db->get('search')->result();
      foreach ($rs as $r) 
      {
        ?>

      <tr>
        <td><?=$i?></td>
        <td><?=$r->pagename?></td>
        <td><?=$r->title?></td>
         <td><?=$r->discription?></td>
          <td><a href="<?=$r->url?>" class="btn btn-link">click here</a></td>
      </tr>
      <?php
      $i++;
      }

      ?>
    </tbody>
  </table>
     
        </div>

        </div>
        </div>
        </section>
        <!-- end section -->
      <?php include 'footer.php';?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>