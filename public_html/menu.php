<?php
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//-----------------------------------------Menu---------------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
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
<body id="menu">
<?php include('partials/_header.php') ?>
<section class="container menu_container">
    <img class="menu_image" src="media/almr_menu.png" alt="Menu">
    <div class="menu_inner">
        <div class="menu_title">Menu</div>
        <div class="course">
            <span class="course_title">Standard Starter</span>
            <span class="dish_name">Sea Salmon</span>
            <span class="dish_description">Oyster emulsion, pickled sea vegetables, miso caramel, heritage radish and a smoked puffed rice granola</span>
        </div>
        <div class="course">
            <span class="course_title">Standard Main Course</span>
            <span class="dish_name">Braised Blade of Beef</span>
            <span class="dish_description">Carrot and swede pur&eacute;e, steamed potato and onion pudding with beer pickled onions and tenderstem broccoli</span>
        </div>
        <div class="course">
            <span class="course_title">Dessert</span>
            <span class="dish_name">Sticky Toffee Pudding</span>
            <span class="dish_description">Date pur&eacute;e, mascarpone cream, toffee sauce, walnut crumble</span>
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