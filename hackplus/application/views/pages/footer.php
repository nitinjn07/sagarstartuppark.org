<!-- Footer -->
<footer class="footer ptb-20">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="copy_right">
                <p>
                    2022 © Dashboard
                    <a href="#">Incubation Masters</a>
                </p>
            </div>
            <a id="back-to-top" href="#" style="display: inline;"> <i class="ion-android-arrow-up"></i> </a>
        </div>
    </div>
</footer>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" src="<?=base_url('assets/');?>assets/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/');?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/');?>assets/js/jquery.mCustomScrollbar.concat.min.js">
</script>

<!--chartjs-->
<script src="<?=base_url('assets/');?>assets/js/index/Chart.min.js"></script>
<script src="<?=base_url('assets/');?>assets/js/index/chartjs-init.js"></script>
<!--echarts-->
<script type="text/javascript" src="<?=base_url('assets/');?>assets/js/index/echarts/echarts-all-3.js"></script>
<script type="text/javascript" src="<?=base_url('assets/');?>assets/js/index/echarts/init-echarts.js"></script>
<!-- chart js -->
<script src="<?=base_url('assets/');?>assets/js/index/Chart.bundle.js"></script>
<script src="<?=base_url('assets/');?>assets/js/index/utils.js"></script>
<script src="<?=base_url('assets/');?>assets/js/index/chart.js"></script>

<script src="<?=base_url('assets/');?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/');?>assets/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/');?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=base_url('assets/');?>assets/js/custom.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
<?php 
         if(isset($_SESSION['success']))
         {
            ?>
swal({
    title: "Good job!",
    text: "<?=$_SESSION['success'];?>",
    icon: "success",
    button: "Ok",
});
<?php

         }
         if(isset($_SESSION['failed']))
         {
            ?>
swal({
    title: "Sorry!",
    text: "<?=$_SESSION['failed'];?>",
    icon: "warning",
    button: "Ok",
});
<?php

         }
         ?>
</script>
<script>
$(document).ready(function() {
    $('#bs4-table').DataTable();
});
</script>
<script>
function fnExcelReport() {
    var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange;
    var j = 0;
    tab = document.getElementById('mytable'); // id of table

    for (j = 0; j < tab.rows.length; j++) {
        tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text = tab_text + "</table>";
    tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
    tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
    {
        txtArea1.document.open("txt/html", "replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
    } else //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

    return (sa);
}
</script>
</body>

</html>