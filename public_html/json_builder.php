<?php
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------
//----------------------------------ALMR 2017 Christmas-------------------------------
//-------------------------------------JSON Builder-----------------------------------
//------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------

// Read in CSV from file
$filename = "delegate_list.csv";

// Read in file
$csv = fopen($filename, "r");

// Setup count
$count = 0;
$fullJSON = '{"PEOPLE":[';
// Foreach row in the CSV
while (($data = fgetcsv($csv)) !== FALSE) {
    // Ignore the first row
    if($count == 1){
        // Get data from array
        $tableNumber = trim($data[1]);
        $firstName = trim($data[3]);
        $lastName = trim($data[4]);
        $company = trim($data[6]);
        
        // Build string
        $rowJSON = '{"COMPANY":"' . trim($company) . '","TABLE_NUMBER": "' . $tableNumber . '","FIRSTNAME":"' . trim($firstName) . '","SURNAME":"' . $lastName . '"}';
        $fullJSON .= $rowJSON;
    } else if($count > 1){
        // Get data from array
        $tableNumber = trim($data[1]);
        $firstName = trim($data[3]);
        $lastName = trim($data[4]);
        $company = trim($data[6]);
        
        // Build string
        $rowJSON = ',{"COMPANY":"' . $company . '","TABLE_NUMBER": "' . $tableNumber . '","FIRSTNAME":"' . trim($firstName) . '","SURNAME":"' . $lastName . '"}';
        $fullJSON .= $rowJSON;
    }
    $count++;
}
$fullJSON .= "]}";

var_dump($fullJSON);

// Save to file
file_put_contents("data/guests.json", $fullJSON);

?>