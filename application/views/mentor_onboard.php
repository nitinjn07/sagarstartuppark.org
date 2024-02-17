

        
<img  src ="<?= base_url(); ?>assets/images/mentor_banner.jpg" width="100%" style="height: 100vh" />
        
   


<style>
*
{
    margin: 0;
}
.centered {
    position: fixed;
    top: 46%;
    left: 48%;
    max-width: 80%;
    transform: translate(-50%, -50%);
    z-index: inherit;
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<div class="gate">

    
    <img src="<?=base_url();?>assets/images/curtain1.jpg" id="img1" />
    <img src="<?=base_url();?>assets/images/curtain2.jpg" id="img2" />

    <div class="centered" id="welcomeText" style="font-size:18px;">
        <br />
        <h1>Onboarding 75 Startup Mentors and Experts for Spark Incubation Centre</h1>

        <h2>sagarstartuppark.org</h2>
       
        <h3><img src="https://www.sagarstartuppark.org/assets/images/logo.png"  width="250px"/> </h3>
        <br />
        <h2>2 Oct 2021</h2>

       
    </div>



</div>
<style>
.gate {

    width: 100%;

    position: fixed: top:0px;
    left: 0px;
    z-index: 9999999;
    text-align: center;

}

.gate #img1 {
    width: 50%;
    height: 100vh;
    top: 0px;
    left: 0px;
    z-index: 99999;
    position: fixed;
}

.gate #img2 {
    width: 50%;
    height: 100vh;
    top: 0px;
    right: 0px;
    z-index: 99999;
    position: fixed;
}

/* .gate #open {

    top: 20%;
    left: 30%;
    z-index: 999999;
    position: fixed;
    animation: lock 2s linear infinite 0s;
} */


@keyframes lock {
    0% {
        transform: scale(1.1);

    }
}


@media(max-width: 500px) {
    .gate #open {
        top: 20%;
        left: 20% !important;
        width: 60% !important;
    }
}

@media(min-width: 500px) and (max-width: 1000px) {
    .gate #open {
        top: 20%;
        left: 20% !important;
        width: 60% !important;
    }
}

@media(min-width: 1000px) and (max-width: 1400px) {
    .gate #open {
        top: 20%;
        left: 20% !important;
        width: 60% !important;
    }
}
</style>





</div>


<script>
$(document).ready(function() {

    $('#welcomeText').css("color", "white");

    $('.gate').click(function() {

        var audio = new Audio("<?=base_url();?>assets/audio.wav");

        $('#img1').animate({
            width: 0
        }, 5000);
        $('#img2').animate({
            width: 0
        }, 5000);

        audio.play();
        $('#welcomeText').fadeOut(5000, function() {
            
        });


        setTimeout(function() {
            $(".alert").alert('close');
        }, 70940);

    });

});
</script>