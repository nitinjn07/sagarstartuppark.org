<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-8 text-start">

            </div>
            <div class="col-4 text-end">
                <p class="mb-0">
                    &copy; 2022 - <a href="javascript:void(0);" class="text-muted">IM Plus</a>
                </p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<svg width="0" height="0" style="position:absolute">
    <defs>
        <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
            <path
                d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
            </path>
        </symbol>
    </defs>
</svg>
<script src="<?=base_url('assets/');?>js/app.js"></script>
<script src="<?=base_url('assets/');?>js/cities.js"></script>
<script src="<?=base_url('assets/');?>js/form-validation.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
$(function() {
    $("#datepicker").datepicker({
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true
    });
});
</script>
<script>
$(document).ready(function() {

    $('#country').on('change', function() {

        var country_id = $('#country').val();

        $.ajax({
            data: {
                country_id: country_id
            },
            url: "<?=base_url();?>GetCountryStateCity/getState",
            type: 'GET',
            success: function(data) {
                $("#state").html(data);

            }
        });


    });

    $('#state').on('change', function() {

        var state_id = $('#state').val();

        $.ajax({
            data: {
                state_id: state_id
            },
            url: "<?=base_url();?>GetCountryStateCity/getCity",
            type: 'GET',
            success: function(data) {
                $("#city").html(data);

            }
        });


    });

});
</script>



<script>
$(function() {
    $('#datatables-dashboard-projects').DataTable({
        pageLength: 6,
        lengthChange: false,
        bFilter: false,
        autoWidth: false
    });
});
</script>
<script>
$(function() {
    $('#datetimepicker-dashboard').datetimepicker({
        inline: true,
        sideBySide: false,
        format: 'L'
    });
});
</script>
<script type="text/javascript">
function showAjaxModal(url) {

    jQuery('#modal_ajax').modal('show', {
        backdrop: 'true'
    });

    $.ajax({
        url: url,
        success: function(response) {
            jQuery('#modal_ajax .modal-body').html(response);
        }
    });
}
</script>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="modal_ajax">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content slimscrollsidebar">
            <div class="modal-body " style="min-height:350px"></div>
        </div>
    </div>
</div>
<script language="javascript">
print_state("sts");
</script>
<script>
function ajaxCall() {
    this.send = function(data, url, method, success, type) {
        type = type || 'json';
        var successRes = function(data) {
            success(data);
        }

        var errorRes = function(e) {
            console.log(e);
        }
        jQuery.ajax({
            url: url,
            type: method,
            data: data,
            success: successRes,
            error: errorRes,
            dataType: type,
            timeout: 60000
        });

    }

}

function locationInfo() {
    var rootUrl = "https://geodata.solutions/api/api.php";
    //now check for set values
    var addParams = '';
    if (jQuery("#gds_appid").length > 0) {
        addParams += '&appid=' + jQuery("#gds_appid").val();
    }
    if (jQuery("#gds_hash").length > 0) {
        addParams += '&hash=' + jQuery("#gds_hash").val();
    }

    var call = new ajaxCall();

    this.confCity = function(id) {
        var url = rootUrl + '?type=confCity&countryId=' + jQuery('#countryId option:selected').attr('countryid') +
            '&stateId=' + jQuery('#stateId option:selected').attr('stateid') + '&cityId=' + id;
        var method = "post";
        var data = {};
        call.send(data, url, method, function(data) {});
    };


    this.getCities = function(id) {
        jQuery(".cities option:gt(0)").remove();
        var stateClasses = jQuery('#cityId').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if (cC.length > 0) {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl + '?type=getCities&countryId=' + jQuery('#countryId option:selected').attr('countryid') +
            '&stateId=' + id + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.cities').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.cities').find("option:eq(0)").html("Select City");
            if (data.tp == 1) {
                var listlen = Object.keys(data['result']).length;

                if (listlen > 0) {
                    jQuery.each(data['result'], function(key, val) {

                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        jQuery('.cities').append(option);
                    });
                } else {
                    var usestate = jQuery('#stateId option:selected').val();
                    var option = jQuery('<option />');
                    option.attr('value', usestate).text(usestate);
                    option.attr('selected', 'selected');
                    jQuery('.cities').append(option);
                }

                jQuery(".cities").prop("disabled", false);
            } else {
                alert(data.msg);
            }
        });
    };

    this.getStates = function(id) {
        jQuery(".states option:gt(0)").remove();
        jQuery(".cities option:gt(0)").remove();
        //get additional fields
        var stateClasses = jQuery('#stateId').attr('class');

        var cC = stateClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if (cC.length > 0) {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }
        var url = rootUrl + '?type=getStates&countryId=' + id + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.states').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.states').find("option:eq(0)").html("Select State");
            if (data.tp == 1) {
                jQuery.each(data['result'], function(key, val) {
                    var option = jQuery('<option />');
                    option.attr('value', val).text(val);
                    option.attr('stateid', key);
                    jQuery('.states').append(option);
                });
                jQuery(".states").prop("disabled", false);
            } else {
                alert(data.msg);
            }
        });
    };

    this.getCountries = function() {
        //get additional fields
        var countryClasses = jQuery('#countryId').attr('class');

        var cC = countryClasses.split(" ");
        cC.shift();
        var addClasses = '';
        if (cC.length > 0) {
            acC = cC.join();
            addClasses = '&addClasses=' + encodeURIComponent(acC);
        }

        var presel = false;
        var iip = 'N';
        jQuery.each(cC, function(index, value) {
            if (value.match("^presel-")) {
                presel = value.substring(7);

            }
            if (value.match("^presel-byi")) {
                var iip = 'Y';
            }
        });


        var url = rootUrl + '?type=getCountries' + addParams + addClasses;
        var method = "post";
        var data = {};
        jQuery('.countries').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            jQuery('.countries').find("option:eq(0)").html("Select Country");

            if (data.tp == 1) {
                if (presel == 'byip') {
                    presel = data['presel'];
                    console.log('2 presel is set as ' + presel);
                }


                if (jQuery.inArray("group-continents", cC) > -1) {
                    var $select = jQuery('.countries');
                    console.log(data['result']);
                    jQuery.each(data['result'], function(i, optgroups) {
                        var $optgroup = jQuery("<optgroup>", {
                            label: i
                        });
                        if (optgroups.length > 0) {
                            $optgroup.appendTo($select);
                        }

                        jQuery.each(optgroups, function(groupName, options) {
                            var coption = jQuery('<option />');
                            coption.attr('value', options.name).text(options.name);
                            coption.attr('countryid', options.id);
                            if (presel) {
                                if (presel.toUpperCase() == options.id) {
                                    coption.attr('selected', 'selected');
                                }
                            }
                            coption.appendTo($optgroup);
                        });
                    });
                } else {
                    jQuery.each(data['result'], function(key, val) {
                        var option = jQuery('<option />');
                        option.attr('value', val).text(val);
                        option.attr('countryid', key);
                        if (presel) {
                            if (presel.toUpperCase() == key) {
                                option.attr('selected', 'selected');
                            }
                        }
                        jQuery('.countries').append(option);
                    });
                }
                if (presel) {
                    jQuery('.countries').trigger('change');
                }
                jQuery(".countries").prop("disabled", false);
            } else {
                alert(data.msg);
            }
        });
    };

}

jQuery(function() {
    var loc = new locationInfo();
    loc.getCountries();
    jQuery(".countries").on("change", function(ev) {
        var countryId = jQuery("option:selected", this).attr('countryid');
        if (countryId != '') {
            loc.getStates(countryId);
        } else {
            jQuery(".states option:gt(0)").remove();
        }
    });
    jQuery(".states").on("change", function(ev) {
        var stateId = jQuery("option:selected", this).attr('stateid');
        if (stateId != '') {
            loc.getCities(stateId);
        } else {
            jQuery(".cities option:gt(0)").remove();
        }
    });

    jQuery(".cities").on("change", function(ev) {
        var cityId = jQuery("option:selected", this).val();
        if (cityId != '') {
            loc.confCity(cityId);
        }
    });
});
</script>
<script>
$('#csv').on('click', function() {
    $("#tblexport").tableHTMLExport({
        type: 'csv',
        filename: 'sample.csv'
    });
})
$('#csv1').on('click', function() {
    $("#datatables-reponsive").tableHTMLExport({
        type: 'csv',
        filename: 'sample.csv'
    });
})
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#select').selectize({
        sortField: 'text'
    });
});
</script>
<?php if($this->session->flashdata('success') != ''){ ?>
<script>
var message = "<?= $this->session->flashdata('success'); ?>";
var title = "";
var type = "success";
toastr[type](message, title, {
    progressBar: "checked",
    timeOut: "2500"
});
</script>
<?php }?>

<?php if($this->session->flashdata('failed') != ''){ ?>
<script>
var message = "<?= $this->session->flashdata('failed'); ?>";
var title = "";
var type = "danger";
toastr[type](message, title, {
    progressBar: "checked",
    timeOut: "2500"
});
</script>
<?php }?>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
ClassicEditor
    .create(document.querySelector('#editor1'))
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
<script>
<?php
 $s= $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
 $jan=$this->db->get_where('sales_target',array('month'=>'JAN','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $feb=$this->db->get_where('sales_target',array('month'=>'FEB','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $mar=$this->db->get_where('sales_target',array('month'=>'MAR','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $apr=$this->db->get_where('sales_target',array('month'=>'APR','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $may=$this->db->get_where('sales_target',array('month'=>'MAY','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $jun=$this->db->get_where('sales_target',array('month'=>'JUN','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $jul=$this->db->get_where('sales_target',array('month'=>'JUL','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $aug=$this->db->get_where('sales_target',array('month'=>'AUG','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $sep=$this->db->get_where('sales_target',array('month'=>'SEP','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $oct=$this->db->get_where('sales_target',array('month'=>'OCT','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $nov=$this->db->get_where('sales_target',array('month'=>'NOV','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $dec=$this->db->get_where('sales_target',array('month'=>'DEC','year'=>date('Y'),'startup_id'=>$s->id))->row();
?>
var colors = ['#007bff', '#28a745', '#444444', '#c3e6cb', '#dc3545', '#6c757d'];
var chBar = document.getElementById("chBar");
var chartData = {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JULY", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [{
            data: [<?=@$jan->target_sale;?>,
                <?=@$feb->target_sale;?>,
                <?=@$mar->target_sale;?>,
                <?=@$apr->target_sale;?>,
                <?=@$may->target_sale;?>,
                <?=@$jun->target_sale;?>,
                <?=@$jul->target_sale;?>,
                <?=@$aug->target_sale;?>,
                <?=@$sep->target_sale;?>,
                <?=@$oct->target_sale;?>,
                <?=@$nov->target_sale;?>,
                <?=@$dec->target_sale;?>
            ],
            backgroundColor: colors[0]
        },
        {
            data: [<?=@$jan->net_sale;?>,
                <?=@$feb->net_sale;?>,
                <?=@$mar->net_sale;?>,
                <?=@$apr->net_sale;?>,
                <?=@$may->net_sale;?>,
                <?=@$jun->net_sale;?>,
                <?=@$jul->net_sale;?>,
                <?=@$aug->net_sale;?>,
                <?=@$sep->net_sale;?>,
                <?=@$oct->net_sale;?>,
                <?=@$nov->net_sale;?>,
                <?=@$dec->net_sale;?>
            ],
            backgroundColor: colors[1]
        }
    ]
};

if (chBar) {
    new Chart(chBar, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    categoryPercentage: 0.5
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
}
</script>


<script>
<?php
 $s= $this->db->get_where('startup',array('email'=>$_SESSION['username']))->row();
 $jan=$this->db->get_where('cash_burn_projection',array('month'=>'JAN','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $feb=$this->db->get_where('cash_burn_projection',array('month'=>'FEB','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $mar=$this->db->get_where('cash_burn_projection',array('month'=>'MAR','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $apr=$this->db->get_where('cash_burn_projection',array('month'=>'APR','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $may=$this->db->get_where('cash_burn_projection',array('month'=>'MAY','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $jun=$this->db->get_where('cash_burn_projection',array('month'=>'JUN','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $jul=$this->db->get_where('cash_burn_projection',array('month'=>'JUL','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $aug=$this->db->get_where('cash_burn_projection',array('month'=>'AUG','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $sep=$this->db->get_where('cash_burn_projection',array('month'=>'SEP','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $oct=$this->db->get_where('cash_burn_projection',array('month'=>'OCT','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $nov=$this->db->get_where('cash_burn_projection',array('month'=>'NOV','year'=>date('Y'),'startup_id'=>$s->id))->row();
 $dec=$this->db->get_where('cash_burn_projection',array('month'=>'DEC','year'=>date('Y'),'startup_id'=>$s->id))->row();
?>
var colors = ['#007bff', '#28a745', '#444444', '#c3e6cb', '#dc3545', '#6c757d'];
var chBar2 = document.getElementById("chBar2");
var chartData = {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JULY", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [{
            data: [<?=@$jan->burn_projection;?>,
                <?=@$feb->burn_projection;?>,
                <?=@$mar->burn_projection;?>,
                <?=@$apr->burn_projection;?>,
                <?=@$may->burn_projection;?>,
                <?=@$jun->burn_projection;?>,
                <?=@$jul->burn_projection;?>,
                <?=@$aug->burn_projection;?>,
                <?=@$sep->burn_projection;?>,
                <?=@$oct->burn_projection;?>,
                <?=@$nov->burn_projection;?>,
                <?=@$dec->burn_projection;?>
            ],
            backgroundColor: colors[0]
        },
        {
            data: [<?=@$jan->net_burn;?>,
                <?=@$feb->net_burn;?>,
                <?=@$mar->net_burn;?>,
                <?=@$apr->net_burn;?>,
                <?=@$may->net_burn;?>,
                <?=@$jun->net_burn;?>,
                <?=@$jul->net_burn;?>,
                <?=@$aug->net_burn;?>,
                <?=@$sep->net_burn;?>,
                <?=@$oct->net_burn;?>,
                <?=@$nov->net_burn;?>,
                <?=@$dec->net_burn;?>
            ],
            backgroundColor: colors[1]
        }
    ]
};

if (chBar2) {
    new Chart(chBar2, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                xAxes: [{
                    barPercentage: 0.4,
                    categoryPercentage: 0.5
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
}
</script>

</body>

</html>