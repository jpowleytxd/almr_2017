<?php
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//--------------------------------------Sponsors-------------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------

$sponsors = '[{
    "NAME" : "SKY",
    "URL" : "media/logos/sky.png"
}, {
    "NAME" : "3 Big Dogs Vodka",
    "URL" : "media/logos/3_big_dogs_vodka.png"
}, {
    "NAME" : "The London Essence",
    "URL" : "media/logos/the_london_essence.png"
}, {
    "NAME" : "Glenfidditch",
    "URL" : "media/logos/glenfidditch.png"
}, {
    "NAME" : "Red Bull",
    "URL" : "media/logos/red_bull.png"
}, {
    "NAME" : "Disaronno",
    "URL" : "media/logos/disaronno.png"
}, {
    "NAME" : "Hi-Spirits",
    "URL" : "media/logos/hi_spirits.png"
}, {
    "NAME" : "Guinness",
    "URL" : "media/logos/guinness.png"
}, {
    "NAME" : "Britvic Soft Drinks",
    "URL" : "media/logos/britvic.png"
}, {
    "NAME" : "Heineken",
    "URL" : "media/logos/heineken.png"
}, {
    "NAME" : "Molson Coors",
    "URL" : "media/logos/molson_coors.png"
}, {
    "NAME" : "Zonal Retail Data Systems",
    "URL" : "media/logos/zonal.png"
}, {
    "NAME" : "Enotria & Coe",
    "URL" : "media/logos/enotria.png"
}, {
    "NAME" : "Bacardi",
    "URL" : "media/logos/bacardi.png"
}, {
    "NAME" : "Swoope",
    "URL" : "media/logos/swoope.png"
}, {
    "NAME" : "Halewood",
    "URL" : "media/logos/halewood.png"
}, {
    "NAME" : "Wireless Social",
    "URL" : "media/logos/wireless_social.png"
}, {
    "NAME" : "Nestle Waters",
    "URL" : "media/logos/nestle_waters.png"
}, {
    "NAME" : "Jagermeister",
    "URL" : "media/logos/jagermeister.png"
}]';

$sponsors = json_decode($sponsors, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="mobile-web-app-capable" content="yes">
<meta name="theme-color" content="#413C61">
<meta charset="UTF-8">

<title>ALMR Christmas</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/almr_main.css">
<link rel="stylesheet" type="text/css" href="css/almr_navigation.css">
<link rel="manifest" href="data/manifest.json">
</head>
<body id="sponsors">
<?php include('partials/_header.php') ?>
<section class="container sponsors_container">
    <div class="sponsors_inner">
        <div class="sponsors_title">Our Sponsors:</div>
        <div class="sponsors_tiles_outer">
            <?php
            foreach($sponsors as $sponsor){
                echo '<div class="sponsor_tile">';
                echo '<img src="' . $sponsor['URL'] . '" alt="' . $sponsor['NAME'] . '">';
                echo '</div>';
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<?php include('partials/_footer.php') ?>

<!-- Scripting Section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<script src="js/almr_functions.js"></script>
<script src="js/almr_navigation.js"></script>

<!--Page Specific Scripting-->
<script>
    // Global variables used in functions
    // var upperBoundary = 105;

    // Function to calculate logo change on scroll
    // ACCEPTS no values
    // RETURNS no values
    function scrollDetect(){
        // Get scroll value
        var scroll = $(window).scrollTop();

        if((scroll > 25) && (scroll <= 75)){
            // In the resizing bracket
            var change = scroll - 25;
            change = 95 - change;
            var logo = $('.static_logo');
            change = change + '';
            change = change + 'px';
            $('.static_logo').css({
                'height' : change
            });

            var colorChange = scroll - 25;
            colorChange = colorChange / 50;
            $('header').css({
                'background' : 'rgba(235, 178, 141, ' + colorChange + ')'
            });

        } else if(scroll < 25){
            // Full size logo bracket
            $('.static_logo').css({
                'height' : '95px'
            });
            $('header').css({
                'background' : 'rgba(235, 178, 141, 0)'
            });
        } else if(scroll > 75){
            // Minimum size logo bracket
            $('.static_logo').css({
                'height' : '45px'
            });
            $('header').css({
                'background' : 'rgba(235, 178, 141, 1)'
            });
        }
    }

    // Detect scroll events
    $(window).on('scroll', function(){scrollDetect();});
    $(window).on('scrollstop', function(){scrollDetect();});

</script>
</body>