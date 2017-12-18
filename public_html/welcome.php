<?php
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//----------------------------------------Welcome-------------------------------------
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
<body id="welcome">
<?php include('partials/_header.php') ?>
<section class="container welcome_container">
    <div class="welcome_image">
        <img src="media/kate_nicholls.png" alt="Kate Nicholls">
    </div>
    <div class="welcome_inner">
        <div class="welcome_title">Welcome from the CEO</div>
        <div class="welcome_text">
            <p>Dear Guests,</p>
            <p>I am delighted to be welcoming you to the 23rd ALMR Christmas Lunch. And what another transformational year it has been, politically, commercially and for your Association too: a coming of age. With our membership now covering 90% of managed pub, bar and branded restaurants, it is the year we can truly claim to have delivered a strong and effective voice for licensed hospitality at the heart of government. The successes we have achieved on your behalf are testament to the power that comes from having one united voice.</p>
            <p>And so it is right that today is about celebrating and recognising the value of an industry of which we are justifiably proud – and, most important of all, the people within it who make it.</p>
            <p>This year The ALMR is also reflecting on a dramatic and successful, 25 years as the number one Trade Association for the Hospitality Industry. We are in a great position to represent all our members and pushing for government support to enable businesses to grow and succeed. Here’s to the next 25 years for what will, no doubt, be another eventful and constantly – evolving period for the country’s dynamic going out sector.</p>
            <p>To our members and partners, I would like to say a huge thank you for your support, contribution and engagement throughout the year. It has been essential in building the reputation and influence this sector has at the highest levels.</p>
            <p>There are many exciting challenges and new initiatives for 2018 and beyond and I can't wait to see what we can all achieve together.</p>
            <img src="media/kate_signature.png" alt="Kate Nicholls" class="welcome_signature">
            <p class="signoff"><span>Kate Nicholls</span><br />Chief Executive</p>
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