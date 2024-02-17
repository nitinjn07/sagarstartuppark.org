
  <footer class="main-footer">
    <p>Copyright &copy; <?= date('Y') ?> </p>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>

<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
  $(function () {
    $('.editor').summernote()
  })
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
</script>
<script>
function exportF(elem) {
  var table = document.getElementById("table");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html);
  elem.setAttribute("href", url);
  elem.setAttribute("download", "export.xls");
  return false;
}
</script>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script> 


</body>
</html>