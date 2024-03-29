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


function workerSearch($searchSkill, $searchDay, $searchDayPart, $startDate, $endDate)
{       
    //db connection
    $db = db_Connect();
    
    //SQL statement
        $stmt = $db->prepare(
    "SELECT workers.ID, CONCAT (workers.fName, ' ', workers.lName) AS Name
    FROM ((availability
    INNER JOIN workers ON availability.worker_id = workers.id)
    INNER JOIN employee_skills ON availability.worker_id = employee_skills.worker_id)
    WHERE (skill_description = :search AND day_name = :search2 AND day_part = :search3 AND start_date <= :search4 AND end_date > :search5)
  
    GROUP BY workers.id");
    
    
    /*
     * 
     *  gets all fields for workers     
     * 
    $stmt = $db->prepare(
    "SELECT workers.id, workers.fName, workers.lName, skills.skill_description, workers.phone, workers.email, availability.start_date, availability.end_date
    FROM ((availability
    INNER JOIN workers ON availability.worker_id = workers.id)
    INNER JOIN skills ON availability.worker_id = skills.worker_id)
    WHERE (skill_description = :search AND day_name = :search2 AND day_part = :search3)
  
    GROUP BY workers.id");
     * 
     */
      
    //search word
    $search = $searchSkill;
    $search2 = $searchDay;
    $search3 = $searchDayPart;
    $search4 = $startDate;
    $search5 = $endDate;
    
    //$search4 = $searchStartDate;
    //$search5 = $searchEndDate;
    
    $binds = array(
    ":search" => $search,
    ":search2" => $search2,
    ":search3" => $search3,
    ":search4" => $search4,
    ":search5" => $search5
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
   echo "<p class='subtitle is-4 has-text-centered'>$number_of_records Workers found</p>";
   if ($number_of_records > 0) {
       // get headers
       $fields = array_keys ($records[0]);
      
       echo "<div class='table_wrapper'>";
       echo "<table class='table is-fullwidth is-responsive'>";
       echo "<thead>";
       echo "<tr>";
        foreach ($fields as $f) {
            echo "<th>$f</th>";
        }
        echo "<th>View profile</th>";
        echo "</tr>";
        echo "</thead>";
        foreach ($records as $record) {
            echo "<tr>";
            foreach ($record as $field) {
                echo "<td style='font-size: 18px;'>$field</td>";     
                 
            }
            
            //outputs view profile button for each record returned
            echo "<td><a target='_blank' class='button is-small is-fullwidth is-success' style='font-size:20px;' href='viewProfile.php?id=" . $record['ID'] . "'" . ">View Profile</a></td>";  
            
            echo "</tr>";
            
                 
        }
        
        echo "</table>";
        echo "</div>";
   }
   
}







?>

