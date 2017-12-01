//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//------------------------------------Main Functions----------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
$(document).ready(function(){
    // Drop down table overlay
    overlayFunctions();
});

// Function for all overlay table functions
// ACCEPTS no values
// RETURNS no values
function overlayFunctions(){
    // Detect mouseDown on table
    $('.sparkle').on('mousedown', function(event){
        event.stopPropagation();

        // Add class to hex to change to active color
        $(this).addClass('sparkle_down');

        $(this).on('mouseup', function(event){
            // Only pull down overlay if it's not already open
            dropDownOverlay($(this));
            // Shrink header logo
            // $('.static_logo').css({
            //   'height' : '45px'
            // });
            TweenMax.to($('.static_logo'), 0.5, {
                height: '45px'
            });
        })
    });

    // Detect click on overlay to close
    $('.table_overlay').on('click', function(event){
        event.preventDefault();
        event.stopPropagation();
        closeOverlay();
    });

    // Stop Prop on other containers
    $('.table_inner').click(function(event){
        event.preventDefault();
        event.stopPropagation();
    });
    $('.tables_author_container a').click(function(event){
        // event.preventDefault();
        event.stopPropagation();
    });
    $('.header_logo').click(function(event){
        event.stopPropagation();
    });
    $('.table_sparkle').click(function(event){
        event.preventDefault();
        event.stopPropagation();
    });
}

// Function to open table drop down
// ACCEPTS hex -> object
// RETURNS no values
function dropDownOverlay(hex){

    // Get table number from data
    var table = $(hex).data('table');

    $('.table_sparkle_middle').html(table);

    // Empty overlay table
    $('.overlay_table tbody').empty();

    // Foreach span within this hex
    var allSpans = $(hex).find('.table-data span');

    // For each delegate span
    $(allSpans).each(function(key, element){
        // Get data from span
        var firstname = $(element).data('firstname');
        var surname = $(element).data('surname');
        var company = $(element).data('company');
        var title = $(element).data('title');

        // Setup row
        var row = '<tr>';
        row += '<td>' + firstname + ' ' + surname + '</td>';
        row += '<td>' + company + '</td>';
        row += '</tr>';

        // Append row to table
        $('.overlay_table tbody').append(row);
    });

    // Animate overlay
    TweenMax.to($('.table_overlay'), 0.5, {
        ease: Power3.easeIn,
        top: '0vh'
    });
}

// Function to close table drop down
// ACCEPTS no values
// RETURNS no values
function closeOverlay(){
    // Remove class from current hex down
    $('.sparkle_down').removeClass('sparkle_down');

    // Grow header logo
    // $('.static_logo').css({
    //     'height' : '95px'
    // });
    TweenMax.to($('.static_logo'), 0.5, {
        height: '95px'
    });

    var bodyID = $('body').attr('id');
    if(bodyID === "attendees"){
        // Animate search table
        TweenMax.to($('.attendees_inner'), 0.25, {
            opacity : 1
        });
    }

    // Animate overlay
    TweenMax.to($('.table_overlay'), 0.5, {
        top: '100vh'
    });
}
