<?php
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//---------------------------------------Homepage-------------------------------------
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

<body id="home">
<?php include('partials/_navigation.php') ?>

<section class="container home_container">
    <div class="homepage_logo">
        <a href="/">
            <img src="media/logo_large.png">
        </a>
    </div>
    <div class="hero_statement">
        <a href="https://www.google.com/maps?q=1+old+billingsgate+walk+ec3r+6dx+london&um=1&ie=UTF-8&sa=X&ved=0ahUKEwjQg46YoObXAhVlOMAKHc1EDYwQ_AUICigB">1 old Billingsgate Walk<br /> London EC3R 6DX</a>
    </div>
    <div class="sponsors_outer">
        <a href="sponsors.php">
            <img src="media/brands.png" alt="Our Sponsors">
        </a>
    </div>
</section>

<?php include('partials/_footer.php') ?>

<!-- Scripting Section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<script src="js/almr_functions.js"></script>
<script src="js/almr_navigation.js"></script>

</body>