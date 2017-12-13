<?php
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//----------------------------------------Tables--------------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$delegates = file_get_contents('data/guests.json');
$delegates = json_decode($delegates, true);

$tables = array();
$prevNumber = 1;
$table = array();

foreach($delegates['PEOPLE'] as $delegate){
    if($delegate["TABLE_NUMBER"] == $prevNumber){
        array_push($table, $delegate);
    } else{
        $prevNumber = $delegate["TABLE_NUMBER"];
        array_push($tables, $table);
        $table = array();
        array_push($table, $delegate);
    }
}

array_push($tables, $table);
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
<link rel="manifest" href="manifest.json">

<style>
    ::-webkit-scrollbar {
        display: none;
    }
</style>
</head>

<body id="tables">
<?php include('partials/_header.php') ?>

<section class="container tables_container">
    <div class="sparkles_outer">
    <?php
            $TABLE_MAX = sizeof($tables);
            $tileCount = 1;
            $even = true;

            foreach($tables as $key => $table){
                // Start row off
                if($tileCount === 1){
                    if($even === true){
                        echo '<div class="sparkle_row even">';
                    } else{
                        echo '<div class="sparkle_row odd">';
                    }
                }

                if($key < 12){
                    echo '<div class="sparkle" data-table="' . ($key + 1) . '">';
                    echo '<div class="sparkle_inner">' . ($key + 1) . '</div>';
                    echo '<div class="table-data">';
                    foreach($table as $delegate){
                        echo '<span class="delegate" data-firstname="' . $delegate['FIRSTNAME'] . '" data-surname="' . $delegate['SURNAME'] . '" data-company="' . $delegate['COMPANY'] . '"></span>';
                    }
                    echo '</div>';
                    echo '</div>';
                } else{
                    echo '<div class="sparkle" data-table="' . ($key + 2) . '">';
                    echo '<div class="sparkle_inner">' . ($key + 2) . '</div>';
                    echo '<div class="table-data">';
                    foreach($table as $delegate){
                        echo '<span class="delegate" data-firstname="' . $delegate['FIRSTNAME'] . '" data-surname="' . $delegate['SURNAME'] . '" data-company="' . $delegate['COMPANY'] . '"></span>';
                    }
                    echo '</div>';
                    echo '</div>';
                }

                if(($tileCount == 3) && ($even === false)){
                    $tileCount = 1;
                    $even = true;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else if(($tileCount == 4) && ($even === true)){
                    $tileCount = 1;
                    $even = false;
                    echo '<div class="clearfix"></div>';
                    echo '</div>';
                } else{
                    $tileCount++;
                }
            }

        ?>
    </div>
    <div class="clearfix"></div>
</section>

<?php include('partials/_footer.php') ?>
<!-- Scripting Section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<script src="js/almr_functions.js"></script>
<script src="js/almr_navigation.js"></script>

<!-- Page Specific Scripting -->
<script>
    // Global variables used in functions
    var screenWidth = $('body').width();
    var upperBoundary;
    var lowerBoundary = ($('footer').offset().top - $(window).scrollTop()) - 100;

    // Determine screen widths
    if(screenWidth <= 374){
        upperBoundary = 120;
    } else if((screenWidth >= 375) && (screenWidth <= 413)){
        upperBoundary = 120;
    } else if(screenWidth >= 414){
        upperBoundary = 120;
    }

    // Function to check hexagon position
    // ACCEPTS hexagon Object
    // RETURNS
    function checkPosition(row){
        var position = $(row).offset();
        var top = position.top - $(window).scrollTop();

        // IF above the header boundary
        if(top < upperBoundary){
            // Calc difference for smooth gradient
            var difference = upperBoundary - top;
            if((difference > 0) && (difference <= 100)){
                // Calc opacity
                var opacity = 1 - (difference / 100);
                // Set opacity
                $(row).css({
                    'opacity': opacity
                });
            } else if(difference > 100){
                // If hex is out the boundary area set as 0 opacity
                $(row).css({
                    'opacity': 0
                });
            }
        }

        // IF in the central location
        if(/*(top < lowerBoundary) &&*/ (top >= upperBoundary)){
            // Set opacity as 1
            $(row).css({
                'opacity': 1
            });
        }

        // IF below the footer boundary
        if(top >= lowerBoundary){
            // Calc differance for smooth gradient
            var difference = top - lowerBoundary;
            if((difference > 0) && (difference <= 100)){
                // Calc opacity
                var opacity = 1 - (difference / 100);
                // Set opacity
                $(row).css({
                    'opacity': opacity
                });
            } else if (difference > 100){
                // If hex is out the boundary area set as 0 opacity
                $(row).css({
                    'opacity': 0
                });
            }
        }
    }

    // Set correct hexagons transparent on load
    $('.sparkle_row').each(function(index, element){
        // Check position
        checkPosition(element);
    });

    // Detect scroll event
    $(window).on('scroll', function(event){
        // For each hexagon
        $('.sparkle_row').each(function(index, element){
            // Check position
            checkPosition(element);
        });
    });

    // Function to prevent scroll cascade on mobile
    // ACCEPTS event
    function preventDefault(e) {
        if (event.currentTarget.allowDefault) {
            return;
        }
        e.preventDefault();
    }

    // Detect when screen is resized and adjusted fading boundaries
    $(window).resize(function(event){
        lowerBoundary = ($('footer').offset().top - $(window).scrollTop()) - 100;

        $('.sparkle_row').each(function(index, element){
            // Check position
            checkPosition(element);
        });
    });

</script>

</body>