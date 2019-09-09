<?php

include ('dbconnect.php');
$db =  db_Connect();  





///////////////////////////////////////////////
/////////////// post request //////////////////
///////////////////////////////////////////////

function isPostRequest()
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}







function testOutput_AvailMonday()
{
    $sql = "SELECT * FROM availability WHERE day_name = 'Monday'";
    return (getRecords($sql));
}


function testOutput_workers()
{
    $sql = "SELECT * FROM workers";
    return (getRecords($sql));
}



//////////////////////////////////////////////////////////
/////////////// search output functions //////////////////
//////////////////////////////////////////////////////////

function getRecords ($sql)
{
    global $db;
    
    $stmt = $db->prepare($sql);
     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}



//display results
function displayTable ($records) {
   $number_of_records = count ($records);
   echo "<p>$number_of_records records found.</p>";
   if ($number_of_records > 0) {
       // get headers
       $fields = array_keys ($records[0]);
      
       echo "<div class='table_wrapper'>";
       echo "<table class='table is-fullwidth'>";
       echo "<thead>";
       echo "<tr>";
        foreach ($fields as $f) {
            echo "<th>$f</th>";
        }
        echo "</tr>";
        echo "</thead>";
        foreach ($records as $record) {
            echo "<tr>";
            foreach ($record as $field) {
                echo "<td>$field</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
   }
   
}







?>

