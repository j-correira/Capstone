<?php

    include './functions.php';

    if (isPostRequest()) {
        
        
    //////////////////////////////////////////////////   
    // array to hold skill IDs if they are selected //
    //////////////////////////////////////////////////
    $skillsArray = array();
            
    if (isset($_POST['server_CB'])) {
        array_push($skillsArray, "Server");
    }

    if (isset($_POST['chef_CB'])) {
        array_push($skillsArray, "Chef");
    }

    if (isset($_POST['bartender_CB'])) {
        array_push($skillsArray, "Bartender");
    }

    if (isset($_POST['prepCook_CB'])) {
        array_push($skillsArray, "Prep Cook");
    }
    if (isset($_POST['expo_CB'])) {
        array_push($skillsArray, "Expo");
    }

    if (isset($_POST['barback_CB'])) {
        array_push($skillsArray, "Barback");
    }

    if (isset($_POST['dishwasher_CB'])) {
        array_push($skillsArray, "Dishwasher");
    }

    if (isset($_POST['busser_CB'])) {
        array_push($skillsArray, "Busser");
    }
    
    
    
    
    //////////////////////////////////////////////////   
    // array to hold skill IDs if they are selected //
    //////////////////////////////////////////////////
    
    $mondayArray = array();

    if (isset($_POST['M_Breakfast'])) {
        array_push($mondayArray, "Breakfast");
    }
    
    if (isset($_POST['M_Lunch'])) {
        array_push($mondayArray, "Lunch");
    }
    
    if (isset($_POST['M_Dinner'])) {
        array_push($mondayArray, "Dinner");
    }
    
    
    $tuesdayArray = array();
    
    if (isset($_POST['T_Breakfast'])) {
        array_push($tuesdayArray, "Breakfast");
    }
    
    if (isset($_POST['T_Lunch'])) {
        array_push($tuesdayArray, "Lunch");
    }
    
    if (isset($_POST['T_Dinner'])) {
        array_push($tuesdayArray, "Dinner");
    }
    
    
    $wednesdayArray = array();
    
    if (isset($_POST['W_Breakfast'])) {
        array_push($wednesdayArray, "Breakfast");
    }
    
    if (isset($_POST['W_Lunch'])) {
        array_push($wednesdayArray, "Lunch");
    }
    
    if (isset($_POST['W_Dinner'])) {
        array_push($wednesdayArray, "Dinner");
    }
    
    
    $thursdayArray = array();
    
    if (isset($_POST['TH_Breakfast'])) {
        array_push($thursdayArray, "Breakfast");
    }
    
    if (isset($_POST['TH_Lunch'])) {
        array_push($thursdayArray, "Lunch");
    }
    
    if (isset($_POST['TH_Dinner'])) {
        array_push($thursdayArray, "Dinner");
    }
    
    
    $fridayArray = array();
    
    if (isset($_POST['F_Breakfast'])) {
        array_push($fridayArray, "Breakfast");
    }
    
    if (isset($_POST['F_Lunch'])) {
        array_push($fridayArray, "Lunch");
    }
    
    if (isset($_POST['F_Dinner'])) {
        array_push($fridayArray, "Dinner");
    }    
    
    
    $saturdayArray = array();
    
    if (isset($_POST['SA_Breakfast'])) {
        array_push($saturdayArray, "Breakfast");
    }
    
    if (isset($_POST['SA_Lunch'])) {
        array_push($saturdayArray, "Lunch");
    }
    
    if (isset($_POST['SA_Dinner'])) {
        array_push($saturdayArray, "Dinner");
    } 
        
    
    $sundayArray = array();
    
    if (isset($_POST['SU_Breakfast'])) {
        array_push($sundayArray, "Breakfast");
    }
    
    if (isset($_POST['SU_Lunch'])) {
        array_push($sundayArray, "Lunch");
    }
    
    if (isset($_POST['SU_Dinner'])) {
        array_push($sundayArray, "Dinner");
    }     
    
        
    
    
    
    
        $db = db_Connect();
        
        //SQL statements        
        $stmt = $db->prepare("INSERT INTO workers SET email = :email, passw = :password, fName = :fName, lName = :lName, phone = :phone, zipcode = :zipcode, bio = :bio, workingSince = :workingSince");
        
        //name, info and login credentials
            $fName = filter_input(INPUT_POST, 'fName');
            $lName = filter_input(INPUT_POST, 'lName');
            $phone = filter_input(INPUT_POST, 'phone');
            $zipcode = filter_input(INPUT_POST, 'zip');
            $bio = filter_input(INPUT_POST, 'bio');
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'password');
            $workingSince = filter_input(INPUT_POST, 'workingSince');
            
        //skills checkboxes
            $serverSkill = filter_input(INPUT_POST, 'server_CB');
            $bartenderSkill = filter_input(INPUT_POST, 'bartender_CB');
            $chefSkill = filter_input(INPUT_POST, 'chef_CB');
            $prepCookSkill = filter_input(INPUT_POST, 'prepCook_CB');
            $expoSkill = filter_input(INPUT_POST, 'expo_CB');
            $barbackSkill = filter_input(INPUT_POST, 'barback_CB');
            $dishwasherSkill = filter_input(INPUT_POST, 'dishwasher_CB');
            $busserSkill = filter_input(INPUT_POST, 'busser_CB');
            
        //start & end date
            $startDate  = filter_input(INPUT_POST, 'startDate');
            $endDate  = filter_input(INPUT_POST, 'endDate');
            
  
        //working since
            //need to change to date picker box and set variable

            
            $binds = array(
                ":email" => $email,
                ":password" => SHA1($password),
                ":fName" => $fName,
                ":lName" => $lName,
                ":phone" => $phone,
                ":zipcode" => $zipcode,
                ":bio" => $bio,
                ":workingSince" => $workingSince
                );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Worker Added!';
            }
         

            
            //loop and insert for each skill selected
            for ($i = 0; $i < count($skillsArray); $i++)
            {               
                $skill = $skillsArray[$i];
                
                $stmt2 = $db->prepare("INSERT INTO employee_skills (worker_id, skill_description) VALUES (@@IDENTITY, '$skill')");
                
                $stmt2->execute();            
            }// /for loop on skillsArray
            
            
            
            //loop and insert for each selected MONDAY day_part
            for ($i = 0; $i < count($mondayArray); $i++)
            {             
                $day_part = $mondayArray[$i];
                
                $stmt3 = $db->prepare("INSERT INTO availability (worker_id, day_name, day_part, start_date, end_date) VALUES (@@IDENTITY, 'Monday', '$day_part', '$startDate', '$endDate')");
                
                $stmt3->execute();           
            }// /for loop on mondayArray      
            
            
            //loop and insert for each selected TUESDAY day_part
            for ($i = 0; $i < count($tuesdayArray); $i++)
            {                
                $day_part = $tuesdayArray[$i];
                
                $stmt4 = $db->prepare("INSERT INTO availability (worker_id, day_name, day_part, start_date, end_date) VALUES (@@IDENTITY, 'Tuesday', '$day_part', '$startDate', '$endDate')");
                
                $stmt4->execute();            
            }// /for loop on $tuesdayArray     
            
            
            //loop and insert for each selected WEDNESDAY day_part
            for ($i = 0; $i < count($wednesdayArray); $i++)
            {                
                $day_part = $wednesdayArray[$i];
                
                $stmt5 = $db->prepare("INSERT INTO availability (worker_id, day_name, day_part, start_date, end_date) VALUES (@@IDENTITY, 'Wednesday', '$day_part', '$startDate', '$endDate')");
                
                $stmt5->execute();            
            }// /for loop on $wednesdayArray 
            
            
            //loop and insert for each selected THURSDAY day_part
            for ($i = 0; $i < count($thursdayArray); $i++)
            {                
                $day_part = $thursdayArray[$i];
                
                $stmt6 = $db->prepare("INSERT INTO availability (worker_id, day_name, day_part, start_date, end_date) VALUES (@@IDENTITY, 'Thursday', '$day_part', '$startDate', '$endDate')");
                
                $stmt6->execute();            
            }// /for loop on $thursdayArray 
            
            
            //loop and insert for each selected FRIDAY day_part
            for ($i = 0; $i < count($fridayArray); $i++)
            {                
                $day_part = $fridayArray[$i];
                
                $stmt7 = $db->prepare("INSERT INTO availability (worker_id, day_name, day_part, start_date, end_date) VALUES (@@IDENTITY, 'Friday', '$day_part', '$startDate', '$endDate')");
                
                $stmt7->execute();            
            }// /for loop on $fridayArray 
            
            
            //loop and insert for each selected SATURDAY day_part
            for ($i = 0; $i < count($saturdayArray); $i++)
            {                
                $day_part = $saturdayArray[$i];
                
                $stmt8 = $db->prepare("INSERT INTO availability (worker_id, day_name, day_part, start_date, end_date) VALUES (@@IDENTITY, 'Saturday', '$day_part', '$startDate', '$endDate')");
                
                $stmt8->execute();            
            }// /for loop on $saturdayArray 
            
            
            //loop and insert for each selected SUNDAY day_part
            for ($i = 0; $i < count($sundayArray); $i++)
            {                
                $day_part = $sundayArray[$i];
                
                $stmt9 = $db->prepare("INSERT INTO availability (worker_id, day_name, day_part, start_date, end_date) VALUES (@@IDENTITY, 'Sunday', '$day_part', '$startDate', '$endDate')");
                
                $stmt9->execute();            
            }// /for loop on $sundayArray
            
            
            header("location:success.html");
            
            
           
}// /isPostRequest

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pickup-Shift || Worker Sign Up</title>


    <!-- CDNs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@4.0.0/dist/css/bulma-extensions.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    

<script>
//set start date and end date to todays date

  window.addEventListener('load', ()=>{    //set date picker to today
  var startDate = document.querySelectorAll('input[type="date"]');

  var todayDate = new Date();
  var year = todayDate.getFullYear();

//string literal
  var month = (todayDate.getMonth() < 10 ) ? `0${todayDate.getMonth()+1}`:`${todayDate.getMonth()+1}`;
  var day = (todayDate.getDate() < 10 ) ? `0${todayDate.getDate()}`:`${todayDate.getDate()}`;

  var todayString = `${year}-${month}-${day}`;

  for (let i = 1; i < startDate.length; i++)
  {
    startDate[i].value = todayString;
    startDate[i].min = todayString;
  }

  })
</script>


  <style>
    .marginBottom30{
      margin-bottom:30px;
    }

    .marginBottom20{
      margin-bottom:20px;
    }

    .height100{
      height: 100px;
    }


/* ========================= */
/* ==== calendar styles ==== */
/* ========================= */

 /* Removes the clear button from date inputs */
input[type="date"]::-webkit-clear-button {
    display: none;
}

/* Removes the spin button */
input[type="date"]::-webkit-inner-spin-button { 
    display: none;
}

/* Always display the drop down caret */
input[type="date"]::-webkit-calendar-picker-indicator {
    color: #2c3e50;
}

/* A few custom styles for date inputs */
input[type="date"] {

    height: 50px;
    width: 150px;

    appearance: none;
    -webkit-appearance: none;
    color: #95a5a6;
    font-family: "Helvetica", arial, sans-serif;
    font-size: 18px;
    border:1px solid #ecf0f1;
    background:#ecf0f1;
    padding:5px;
    display: inline-block !important;
    visibility: visible !important;
}

input[type="date"], focus {
    color: #95a5a6;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
}
  </style>

  </head>



<body>
<section class="section">
        

            <!-- ============================= -->
            <!-- ======= start of form ======= -->
            <!-- ============================= -->
            <form method="POST" action="#"  name="workerSignup">


            <h1 class="title is-2 has-text-centered">Worker Sign Up</h1>
            <p class="subtitle is-5 has-text-centered">Create your profile, select your skills and decide when you're available</p>
            <hr>
            
            <div class="steps is-small" id="stepsDemo">
              <div class="step-item is-active is-success">
                <div class="step-marker">1</div>
                <div class="step-details">
                  <p class="step-title">Account</p>
                </div>
              </div>
              <div class="step-item">
                <div class="step-marker">2</div>
                <div class="step-details">
                  <p class="step-title">Skills</p>
                </div>
              </div>
              <div class="step-item">
                <div class="step-marker">3</div>
                <div class="step-details">
                  <p class="step-title">Availability</p>
                </div>
              </div>
              <div class="step-item">
                <div class="step-marker">4</div>
                <div class="step-details">
                  <p class="step-title">Submit</p>
                </div>
              </div>
              

        <!-- ================================== -->
        <!-- ========= Account Step =========== -->
        <!-- ================================== -->      
        <!-- step #1 -->

              <div class="steps-content">
              <hr style="margin-top:0px;">
                <div class="step-content has-text-centered is-active">

                    <h1 class="title is-3 has-text-centered marginBottom20">Worker Profile Info</h1>


            <!-- <a href="#"><h1 class="title has-text-centered has-text-grey-light is-marginless"><i class="fas fa-user-circle fa-3x"></i></h1>
            <p class="has-text-centered">Upload Profile Pic</p></a> -->
            <br>
            
            <input class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="First Name" name="fName">
            <input class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Last Name" name="lName">
            <input pattern="\d*" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Phone" name="phone">
            <input pattern="\d*" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Zip Code" name="zip">

             
            
            <textarea class="textarea input is-medium" style="margin-bottom:15px;" placeholder="Bio" name="bio"></textarea>
            
            <input type="email" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Email" name="email">
            <input type="password" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Password">
            <input type="password" class="input is-medium" style="margin-bottom:15px;" type="text" placeholder="Confirm Password" name="password">

          </div>
        <!-- /step #1 -->

        <!-- ================================= -->
        <!-- ========= Skills Step =========== -->
        <!-- ================================= -->
        <!-- step #2-->
                <div class="step-content has-text-centered">

                      <h1 class="title is-4 has-text-centered marginBottom20">Skills</h1>

                    <div class="columns is-mobile">               
                      
                        <div class="column is-half">                       
                            <div class="field">
                                <input class="is-checkradio is-medium" id="server_CB" type="checkbox" name="server_CB">
                                <label for="server_CB">Server</label>
                            </div>
                        </div>
                        
                        <div class="column is-half">
                            <div class="field">
                                <input class="is-checkradio is-medium" id="bartender_CB" type="checkbox" name="bartender_CB">
                                <label for="bartender_CB">Bartender</label>
                              </div>      
                        </div>
                      </div>


                      <div class="columns is-mobile">
                          <div class="column is-half">
                              <div class="field">
                                  <input class="is-checkradio is-medium" id="chef_CB" type="checkbox" name="chef_CB">
                                  <label for="chef_CB">Chef</label>
                                </div>
                          </div>
        
                      <div class="column is-half">         
                              <div class="field">
                                  <input class="is-checkradio is-medium" id="prepCook_CB" type="checkbox" name="prepCook_CB">
                                  <label for="prepCook_CB">Prep Cook</label>
                                </div>
                          </div>
                      </div>
          


                        <div class="columns is-mobile">
                            <div class="column is-half">
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="expo_CB" type="checkbox" name="expo_CB">
                                    <label for="expo_CB">Expo</label>
                                  </div>
                            </div>
          
                        <div class="column is-half">         
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="barback_CB" type="checkbox" name="barback_CB">
                                    <label for="barback_CB">Barback</label>
                                  </div>
                            </div>
                        </div>


                        <div class="columns is-mobile">
                            <div class="column is-half">         
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="dishwasher_CB" type="checkbox" name="dishwasher_CB">
                                    <label for="dishwasher_CB">Dishwasher</label>
                                  </div>
                            </div>

                            <div class="column is-half">        
                                <div class="field">
                                    <input class="is-checkradio is-medium" id="busser_CB" type="checkbox" name="busser_CB">
                                    <label for="busser_CB">Busser</label>
                                  </div>
                            </div>
                        
                        </div>

                        <!-- NEW years experience -->
                        <div class="columns is-mobile is-centered" style="
                        padding-top: 15px;">
                            <div class="column is-full">                         
                              <h1 class="title is-4 has-text-centered">I've been working since</h1>
                              
                              <!-- working since date picker -->
                              <input type="date" name="workingSince">
                             
                             
                            <!-- dropdown menu javascript -->
                            <script>
                            //populate years dropdown
                                var sel = document.querySelector("select[name='years']");
                                //console.log(sel);
                                var date = new Date();
                                var year = date.getFullYear();
                                //console.log(year);
                                var str = "";
                                for (let i = 0; i < 35; i++)
                                {
                                  str += `<option>${year - i}</option>`;
                                }
                                
                                //append to years dropdown menu
                                sel.innerHTML += str;
                            </script>


                           </div><!-- /column -->
                        </div><!-- /NEW years experience -->

                </div>
        <!-- /step #2 -->

        <!-- step #3-->
                
        
        
        <!-- ======================================= -->
        <!-- ========= Availability Step =========== -->
        <!-- ======================================= -->
        <div class="step-content has-text-centered">

            <div class="columns is-mobile marginBottom20">

                <div class="column is-half">
                  <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Start Date</h1>

                  <!-- start date input -->
                  <input type="date" id="startDate" name="startDate">
                </div>
        
                <div class="column is-half">
                    <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">End Date</h1>

                    <!-- end date input -->
                    <input type="date" class="marginBottom30" name="endDate">
                  </div>       
              </div>

            <!-- monday -->
            <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Monday</h1>
            
            <div class="columns is-mobile">
             
                <div class="column is-one-third marginBottom30">
                    <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                    <div class="column is-mobile field">              
                      <input id="M_Breakfast" type="checkbox" value="Breakfast" name="M_Breakfast" class="switch is-medium is-success">
                      <label for="M_Breakfast"></label>
                    </div>
                </div>

                <div class="column is-one-third marginBottom30">
                    <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                    <div class="column is-mobile field">              
                      <input id="M_Lunch" type="checkbox" value="Lunch" name="M_Lunch" class="switch is-medium is-success">
                      <label for="M_Lunch"></label>
                    </div>
                </div>

                <div class="column is-one-third marginBottom30">
                    <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                    <div class="column is-mobile field">              
                      <input id="M_Dinner" type="checkbox" value="Dinner" name="M_Dinner" class="switch is-medium is-success">
                      <label for="M_Dinner"></label>
                    </div>
                </div>
              </div>
              <!-- /monday -->
        
              <!-- tuesday -->
              <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Tuesday</h1>
              <div class="columns is-mobile">
               
                  <div class="column is-one-third marginBottom30">
                      <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                      <div class="column is-mobile field">              
                        <input id="T_Breakfast" type="checkbox" value="Breakfast" name="T_Breakfast" class="switch is-medium is-success">
                        <label for="T_Breakfast"></label>
                      </div>
                  </div>

                  <div class="column is-one-third marginBottom30">
                      <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                      <div class="column is-mobile field">              
                        <input id="T_Lunch" type="checkbox" value="Lunch" name="T_Lunch" class="switch is-medium is-success">
                        <label for="T_Lunch"></label>
                      </div>
                  </div>

                  <div class="column is-one-third marginBottom30">
                      <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                      <div class="column is-mobile field">              
                        <input id="T_Dinner" type="checkbox" value="Dinner" name="T_Dinner" class="switch is-medium is-success">
                        <label for="T_Dinner"></label>
                      </div>
                  </div>
                </div>
                <!-- /tuesday -->

                <!-- wednesday -->
                <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Wednesday</h1>
                  <div class="columns is-mobile">
                   
                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                          <div class="column is-mobile field">              
                            <input id="W_Breakfast" type="checkbox" value="Breakfast" name="W_Breakfast" class="switch is-medium is-success">
                            <label for="W_Breakfast"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                          <div class="column is-mobile field">              
                            <input id="W_Lunch" type="checkbox" value="Lunch" name="W_Lunch" class="switch is-medium is-success">
                            <label for="W_Lunch"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                          <div class="column is-mobile field">              
                            <input id="W_Dinner" type="checkbox" value="Dinner" name="W_Dinner" class="switch is-medium is-success">
                            <label for="W_Dinner"></label>
                          </div>
                      </div>
                    </div>
                    <!-- /wednesday -->

                <!-- thursday -->
                <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Thursday</h1>
                  <div class="columns is-mobile">
                   
                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                          <div class="column is-mobile field">              
                            <input id="TH_Breakfast" type="checkbox" value="Breakfast" name="TH_Breakfast" class="switch is-medium is-success">
                            <label for="TH_Breakfast"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                          <div class="column is-mobile field">              
                            <input id="TH_Lunch" type="checkbox" value="Lunch" name="TH_Lunch" class="switch is-medium is-success">
                            <label for="TH_Lunch"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                          <div class="column is-mobile field">              
                            <input id="TH_Dinner" type="checkbox" value="Dinner" name="TH_Dinner" class="switch is-medium is-success">
                            <label for="TH_Dinner"></label>
                          </div>
                      </div>
                    </div>
                    <!-- /thursday -->


                <!-- friday -->
                <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Friday</h1>
                  <div class="columns is-mobile">
                   
                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                          <div class="column is-mobile field">              
                            <input id="F_Breakfast" type="checkbox" value="Breakfast" name="F_Breakfast" class="switch is-medium is-success">
                            <label for="F_Breakfast"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                          <div class="column is-mobile field">              
                            <input id="F_Lunch" type="checkbox" value="Lunch" name="F_Lunch" class="switch is-medium is-success">
                            <label for="F_Lunch"></label>
                          </div>
                      </div>

                      <div class="column is-one-third marginBottom30">
                          <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                          <div class="column is-mobile field">              
                            <input id="F_Dinner" type="checkbox" value="Dinner" name="F_Dinner" class="switch is-medium is-success">
                            <label for="F_Dinner"></label>
                          </div>
                      </div>
                    </div>
                    <!-- /friday -->
        
                    <!-- saturday -->
                    <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Saturday</h1>
                    <div class="columns is-mobile">
                     
                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                            <div class="column is-mobile field">              
                              <input id="SA_Breakfast" type="checkbox" value="Breakfast" name="SA_Breakfast" class="switch is-medium is-success">
                              <label for="SA_Breakfast"></label>
                            </div>
                        </div>
  
                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                            <div class="column is-mobile field">              
                              <input id="SA_Lunch" type="checkbox" value="Lunch" name="SA_Lunch" class="switch is-medium is-success">
                              <label for="SA_Lunch"></label>
                            </div>
                        </div>
  
                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                            <div class="column is-mobile field">              
                              <input id="SA_Dinner" type="checkbox" value="Dinner" name="SA_Dinner" class="switch is-medium is-success">
                              <label for="SA_Dinner"></label>
                            </div>
                        </div>
                      </div>
                      <!-- /saturday -->
        
                      <!-- sunday -->
                      <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">Sunday</h1>
                      <div class="columns is-mobile">
                       
                          <div class="column is-one-third marginBottom30">
                              <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                              <div class="column is-mobile field">              
                                <input id="SU_Breakfast" type="checkbox" value="Breakfast" name="SU_Breakfast" class="switch is-medium is-success">
                                <label for="SU_Breakfast"></label>
                              </div>
                          </div>
    
                          <div class="column is-one-third marginBottom30">
                              <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                              <div class="column is-mobile field">              
                                <input id="SU_Lunch" type="checkbox" value="Lunch" name="SU_Lunch" class="switch is-medium is-success">
                                <label for="SU_Lunch"></label>
                              </div>
                          </div>
    
                          <div class="column is-one-third marginBottom30">
                              <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                              <div class="column is-mobile field">              
                                <input id="SU_Dinner" type="checkbox" value="Dinner" name="SU_Dinner" class="switch is-medium is-success">
                                <label for="SU_Dinner"></label>
                              </div>
                          </div>
                        </div>
                        <!-- /sunday -->
                </div>
              



        <!-- /step #3 -->

        <!-- ================================= -->
        <!-- ========= Submit step =========== -->
        <!-- ================================= -->
        <!-- step #4 -->
                <div class="step-content has-text-centered">
             
                    <input type="submit" class="button is-success is-large is-fullwidth" style="height:100px;" value="Create Account">
                  
                </div>


        <!-- ============================= -->
        <!-- ======== end of form ======== -->
        <!-- ============================= -->
        </form>

        <!-- /step #4 -->


              </div>
              <div class="steps-actions">
                <div class="steps-action">
                  <a href="#" data-nav="previous" class="button is-light is-large">Previous</a>
                </div>
                <div class="steps-action">
                  <a href="#" data-nav="next" class="button is-light is-large">Next</a>
                </div>
              </div>
            </div>

            <!-- attach Steps component-->
            <script type="text/javascript" src="https://wikiki.github.io/node_modules/bulma-extensions/bulma-steps/dist/js/bulma-steps.min.js"></script>
            <script>bulmaSteps.attach();</script>

        
    </section>


  </body>
</html>