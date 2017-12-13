<?php
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//----------------------------------------Drinks--------------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta name="mobile-web-app-capable" content="yes">
<meta name="theme-color" content="#7F56C6">
<meta charset="UTF-8">

<title>ALMR Christmas</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/almr_main.css">
<link rel="stylesheet" type="text/css" href="css/almr_navigation.css">
<link rel="manifest" href="manifest.json">
</head>
<body id="menu">
<?php include('partials/_header.php') ?>
<section class="container drinks_container">
    <div class="drinks_inner">
        <div class="drinks_title">Drinks List:</div>
        <div class="drink_set">
            <span class="company">Molson Coors</span>
            <span class="drink">Pravha</span>
            <span class="drink">Staropramen</span>
            <span class="drink">Chieftain IPA</span>
            <span class="drink">Blue Moon</span>
            <span class="drink">Coors Light</span>
            <span class="drink">Doom Bar</span>
            <span class="drink">Atlantic</span>
        </div>
        <div class="drink_set">
            <span class="company">Heineken</span>
            <span class="drink">Strongbow Cloudy Apple</span>
            <span class="drink">Orchard Thieves</span>
            <span class="drink">Old Mout</span>
            <span class="sub_drink">Pomegranate &amp; Strawberry</span>
            <span class="sub_drink">Kiwi &amp; Lime</span>
            <span class="sub_drink">Passionfruit &amp; Apple</span>
        </div>
        <div class="drink_set">
            <span class="company">Diageo</span>
            <span class="drink">Guinness</span>
            <span class="drink">Guinness Extra Cold</span>
        </div>
        <div class="drink_set">
            <span class="company">Britvic</span>
            <span class="drink">J2O Orange &amp; Passionfruit</span>
            <span class="drink">J2O Spritz Pear &amp; Raspberry</span>
            <span class="drink">R Whites Raspberry Lemonade</span>
            <span class="drink">R Whites Pear &amp; Elderflower Lemonade</span>
            <span class="drink">Purdeys Rejuvenate</span>
        </div>
        <div class="drink_set">
            <span class="company">Enotria &amp; Coe</span>
            <span class="drink">English Sparkling Wine</span>
        </div>
        <div class="drink_set">
            <span class="company">Halewood</span>
            <span class="drink">Crabbies Original</span>
            <span class="drink">Crabbies Raspberry</span>
        </div>
        <div class="drink_set">
            <span class="company">Nestle Waters</span>
            <span class="drink">San Pellegrino Sparkling</span>
            <span class="drink">Natural Mineral Water</span>
            <span class="drink">Acqua Panna Natural Spring Water</span>
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