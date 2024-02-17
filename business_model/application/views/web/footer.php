<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
            <a href="https://incubationmasters.com" target="_blank">Incubation Masters
            </a> All rights reserved.</span>

    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<script src="<?=base_url('assets/');?>vendors/js/vendor.bundle.base.js"></script>

<script src="<?=base_url('assets/');?>js/off-canvas.js"></script>
<script src="<?=base_url('assets/');?>js/hoverable-collapse.js"></script>
<script src="<?=base_url('assets/');?>js/template.js"></script>
<script src="<?=base_url('assets/');?>js/settings.js"></script>
<script src="<?=base_url('assets/');?>js/todolist.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
function getPDF() {

    var HTML_Width = $(".canvas_div_pdf").width();
    var HTML_Height = $(".canvas_div_pdf").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


    html2canvas($(".canvas_div_pdf")[0], {
        allowTaint: true
    }).then(function(canvas) {
        canvas.getContext('2d');

        console.log(canvas.height + "  " + canvas.width);


        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);


        for (var i = 1; i <= totalPDFPages; i++) {
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                canvas_image_width, canvas_image_height);
        }

        pdf.save("Business-Model.pdf");
    });
};
</script>

</body>

</html>