<?php include 'header.php';?>

<style>
#indu {
    height: 100px;
    margin-bottom: 80px;
}
</style>

<?php  $about = $this->Model->selectDataWhere('aboutus',array('id'=>1))->row();  ?>


<section class="parallax" data-parallax-background-ratio="0.5"
    style="background-image:url('<?=base_url();?>assets/images/slider1.jpg');"
    alt="Incubation Center in Madhya Pradesh">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container" id="indu">
        <div class="row align-items-stretch justify-content-center small-screen">
            <div
                class="col-12 page-title-extra-small text-center d-flex align-items-center justify-content-center pt-4 flex-column">

                <h2 class="text-white text-left">आरोहण</h2>
                <h1 class="alt-font text-white opacity-10 margin-20px-bottom"><a href="<?=base_url();?>Home"
                        style="color:orange;">Home</a>&nbsp;<i class="fas fa-chevron-right"></i>&nbsp;आर</h1>
                <p><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></p>
            </div>

        </div>
    </div>
</section>


<!-- start section -->
<section id="about" class="bg-light-gray pb-5">
    <div class="container-fluid">
        <div class="row">
            <?php
             
              if(@$_GET['logout']==1)
              {
                unset($_SESSION['arohini_login']);
                redirect(base_url().'Arohini/ArohiniDetails');
              }
              if(!isset($_SESSION['arohini_login']))
              { 
            ?>
            <div class="col-md-4 mx-auto">

                <?php 
if(isset($_POST['check_arohini']))
{
  extract($_POST);
   $code =420420;

   if($code==$code_input)
   {
       $_SESSION['arohini_login'] = $code;
   }
   else 
   {
      echo "<p class='text-danger text-center'>Sorry Code Not Matched</p>";
   }

}
                ?>
                <form action="<?=base_url();?>Arohini/ArohiniDetails" method="post">
                    <div class="form-group">
                        <label for="">Pin Code</label>
                        <input type="number" name="code_input" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="check_arohini" class="btn btn-primary" />
                    </div>
                </form>
            </div>
            <?php 
              }
             

              if(isset($_SESSION['arohini_login']))
              {
              ?>



            <div class="col-lg-12">
                <div class="col-sm-6 ">

        <button type="button" class="btn btn-primary" id="btnExport" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" style="padding: 9px; margin-left: 78%;">Export Excel
        </button>
    </div>
                <a href="<?=base_url();?>Arohini/ArohiniDetails?logout=1" class="btn btn-danger">Logout</a>
                <table class="table  table-bordered">
                    <thead>
                    <tr>
                        <th>S/n.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Idea</th>
                        <th>City</th>
                        <th>Edit</th>
                

                    </tr>
                    </thead>
                    <?php
                      $data = $this->db->get_where('arohini')->result(); 
                      $i=1;
                      foreach($data as $d)
                      {
                    ?>
                    <tbody>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$d->name;?></td>
                        <td><?=$d->email;?></td>
                        <td><?=$d->mobile;?></td>
                        <td class="col-lg-3"><?=$d->startup_idea;?></td>
                        <td><?=$d->city_name;?></td>
                        <td class="col-lg-1">Edit</td>
                        

                    </tr>
                    </tbody>
                    <?php 
                       $i++;
                      }
                    ?>
                </table>
            </div>

            <?php 
              }
            ?>

        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function () {
        $("#btnExport").click(function () {
            let table = document.getElementsByTagName("table");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: `arohini.xlsx`,
                sheet: {
                    name: 'Usermanagement'
                }
            });
        });
    });
</script>

<!-- end section -->
<!-- start section -->

<!-- end section -->
<?php include 'footer.php';?>