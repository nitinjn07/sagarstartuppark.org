$(function () {
    var $startup = $('#startupform');
    if ($startup.length) {
        $startup.validate({
            rules: {
               
                startup_name: {
                    required: true
                },
                email:
                {
                    email: true
                },
                mobile:
                {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                state: { required: true },
                city: { required: true },
                verticals_sectors: { required: true },
                type_of_business: { required: true },
                founded_month: { required: true },
                founded_year: { required: true },
                incubation_joining_month: { required: true },
                incubation_joining_year: { required: true },
                stage: { required: true },
                startup_type: { required: true },
                ownername: { required: true },
                product_service_summary: { required: true },
                team_summary: { required: true }
                
                
            }
          
        });
    }
});


$(function () {
    var $startup = $('#screening_committee');
    if ($startup.length) {
        $startup.validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                contact: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                designation: {
                    required: true
                }
                
            }
           
        });
    }
});





$(function () {
    var $startup = $('#mentor_registration');
    if ($startup.length) {
        $startup.validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    email: true
                },
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                country: {
                    required: true
                },
                state:
                {
                    required: true
                },
                city:
                {
                    required: true
                },
                exp:
                {
                    required: true
                },
                password:
                {
                    required: true
                },
                summary:
                {
                    required: true
                }
                
            }
           
        });
    }
});


$(function () {
    var $startup = $('#invester_reg');
    if ($startup.length) {
        $startup.validate({
            rules: {
                compay_name: {
                    required: true
                },
                email: {
                    email: true
                },
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                country: {
                    required: true
                },
                state:
                {
                    required: true
                },
                city:
                {
                    required: true
                },
                type_of_invester:
                {
                    required: true
                },
                ownername:
                {
                    required: true
                },
                password:
                {
                    required: true
                }
                
            }
           
        });
    }
});


$(function () {
    var $startup = $('#partner_reg');
    if ($startup.length) {
        $startup.validate({
            rules: {
                firm_name: {
                    required: true
                },
                email: {
                    email: true
                },
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                country: {
                    required: true
                },
                state:
                {
                    required: true
                },
                city:
                {
                    required: true
                },
                type_of_firm:
                {
                    required: true
                },
                address:
                {
                    required: true
                },
                ownername:
                {
                    required: true
                }
                
            }
           
        });
    }
});



$(function () {
    var $mou_upload = $('#mou_upload');
    if ($mou_upload.length) {
        $mou_upload.validate({
            rules: {
                type_of_org: {
                    required: true
                },
                name_of_org: {
                    required: true
                },
                mobile_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                mou_doc:
                {
                    required: true,
                    extension: "pdf" 
                },
                country: {
                    required: true
                },
                state:
                {
                    required: true
                },
                city:
                {
                    required: true
                },
                start_date:
                {
                    required: true
                },
                end_date:
                {
                    required: true
                },
                person_name:
                {
                    required: true
                }
            }
           
        });
    }
});