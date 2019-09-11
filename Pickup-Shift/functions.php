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


function workerSearch($searchSkill)
{       
    //db connection
    $db = db_Connect();
    //SQL statement
    $stmt = $db->prepare("SELECT workers.id, workers.fName, workers.lName, skills.skill_description, workers.phone, workers.email, availability.start_date, availability.end_date


FROM ((availability


INNER JOIN workers ON availability.worker_id = workers.id)

INNER JOIN skills ON availability.worker_id = skills.worker_id)


WHERE skill_description = :search
GROUP BY workers.id");
      
    //search word = wildcard
    $search = $searchSkill;
    
    $binds = array(
    ":search" => $search,
    );
    
    //execute SQL
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        
    return $results;
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

