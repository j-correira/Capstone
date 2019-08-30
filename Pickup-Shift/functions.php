<?php

//check if Post request is made
function isPostRequest()
{
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

//check if Get request is made
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}





//get all restaurant users
//search values:
//      skills
//      yearsExperience
//      availability (monday - sunday)

function getAllTestData(){
    $db = getDatabase();
           
    $stmt = $db->prepare("SELECT * FROM restaurants");
     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}



//get all worker users
function getAllTestData(){
    $db = getDatabase();
           
    $stmt = $db->prepare("SELECT * FROM workers");
     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}



//returns search for workers
function returnSearch($searchWord, $column)
{       
        //db connection
        $db = getDatabase();

        //SQL statement
        $stmt = $db->prepare("SELECT * FROM schools WHERE $column LIKE :search");
       
        //search word = wildcard
        $search = '%'.$searchWord.'%';
        
        $binds = array(
        ":search" => $search 
        );

        //execute SQL
        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
}



   


?>