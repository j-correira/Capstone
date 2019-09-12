<?php
//only include selects, because selects includes dbconnect
include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pickup-Shift || Searching</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma-extensions@4.0.0/dist/css/bulma-extensions.min.css">

        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

        <script>

            function openTab(evt, tabName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("content-tab");

                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }

                tablinks = document.getElementsByClassName("tab");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" is-active", "");
                }

                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " is-active";
            }


        </script>
        
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

  for (let i = 0; i < startDate.length; i++)
  {
    startDate[i].value = todayString;
    startDate[i].min = todayString;
  }

  })
        </script>





    </head>


    <body>
        <section class="section">
            <div class="container">

        <!-- <a href="index.html" class="button is-rounded" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> &nbsp;Back</a> -->

                <h1 class="title is-2 has-text-centered">Worker Search</h1>
                <p class="subtitle is-5 has-text-centered">Find workers with specific skills and availability</p>
                <hr>

                <nav class="tabs is-centered is-large is-toggle is-fullwidth">
                    <div class="container">


                        <!-- ============================= -->
                        <!-- ======== begin form ========= -->
                        <!-- ============================= -->
                        <form id="searchWorker" method="get" action="search.php" target="_blank">

                            <ul>
                                <li class="tab is-active" onclick="openTab(event, 'Search')"> 
                                    <a>
                                        <span class="icon is-small"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        Search
                                    </a>
                                </li>
                                <li class="tab" onclick="openTab(event, 'Results')">
                                    <a>
                                        <span class="icon is-small"><i class="fas fa-list" aria-hidden="true"></i></span>
                                        Results
                                    </a>
                                </li>
                                <!-- <li class="tab" onclick="openTab(event,'Support')"><a>Support</a></li> -->
                            </ul>
                    </div>
                </nav>
            </div>
        </section>

        <div class="container section has-text-centered" style="padding-top:0px;">
            <div id="Search" class="content-tab" >
                <h1 class="title is-3 has-text-centered">I'm looking for a...</h1>
                <div class="columns is-mobile">

                    <div class="column is-half">


                        <div class="field">
                            <input type="radio" value="Server" class="is-checkradio is-medium" id="server_CB" type="checkbox" name="skill_CB">
                            <label for="server_CB">Server</label>
                        </div>
                    </div>

                    <div class="column is-half">
                        <div class="field">
                            <input type="radio" value="Bartender" class="is-checkradio is-medium" id="bartender_CB" type="checkbox" name="skill_CB">
                            <label for="bartender_CB">Bartender</label>
                        </div>      
                    </div>
                </div>


                <div class="columns is-mobile">
                    <div class="column is-half">
                        <div class="field">
                            <input type="radio" value="Chef" class="is-checkradio is-medium" id="chef_CB" type="checkbox" name="skill_CB">
                            <label for="chef_CB">Chef</label>
                        </div>
                    </div>

                    <div class="column is-half">         
                        <div class="field">
                            <input type="radio" value="Prep Cook" class="is-checkradio is-medium" id="prepCook_CB" type="checkbox" name="skill_CB">
                            <label for="prepCook_CB">Prep Cook</label>
                        </div>
                    </div>
                </div>



                <div class="columns is-mobile">
                    <div class="column is-half">
                        <div class="field">
                            <input type="radio" value="Expo" class="is-checkradio is-medium" id="expo_CB" type="checkbox" name="skill_CB">
                            <label for="expo_CB">Expo</label>
                        </div>
                    </div>

                    <div class="column is-half">         
                        <div class="field">
                            <input type="radio" value="Barback" class="is-checkradio is-medium" id="barback_CB" type="checkbox" name="skill_CB">
                            <label for="barback_CB">Barback</label>
                        </div>
                    </div>
                </div>


                <div class="columns is-mobile">
                    <div class="column is-half">         
                        <div class="field">
                            <input type="radio" value="Dishwasher" class="is-checkradio is-medium" id="dishwasher_CB" type="checkbox" name="skill_CB">
                            <label for="dishwasher_CB">Dishwasher</label>
                        </div>
                    </div>

                    <div class="column is-half">        
                        <div class="field">
                            <input type="radio" value="Busser" class="is-checkradio is-medium" id="busser_CB" type="checkbox" name="skill_CB">
                            <label for="busser_CB">Busser</label>
                        </div>
                    </div>

                </div>




                <hr>

                <div class="step-content has-text-centered">
                    <h1 class="title is-3 has-text-centered">That is available...</h1>

                    <div class="select is-medium is-half marginBottom20" >
                        <select name="dayAvailable">
                            <option selected disabled>Day</option>
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                            <option>Saturday</option>
                            <option>Sunday</option>
                        </select>
                    </div>

                    <hr>

                    <h1 class="title is-3 has-text-centered">During...</h1>



                    <!-- monday -->
                    <div class="columns is-mobile">

                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Breakfast</h3>
                            <div class="column is-mobile field">              
                                <input type="radio" value="Breakfast" id="M_Breakfast" type="checkbox" name="dayPart" class="is-checkradio is-medium">
                                <label for="M_Breakfast"></label>
                            </div>
                        </div>

                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Lunch</h3>
                            <div class="column is-mobile field">              
                                <input type="radio" value="Lunch" id="M_Lunch" type="checkbox" name="dayPart" class="is-checkradio is-medium">
                                <label for="M_Lunch"></label>
                            </div>
                        </div>

                        <div class="column is-one-third marginBottom30">
                            <h3 class="subtitle is-5 has-text-centered is-marginless">Dinner</h3>
                            <div class="column is-mobile field">              
                                <input type="radio" value="Dinner" id="M_Dinner" type="checkbox" name="dayPart" class="is-checkradio is-medium">
                                <label for="M_Dinner"></label>
                            </div>
                        </div>
                    </div>
                    <!-- /monday -->

                    <hr>

                    <h1 class="title is-3 has-text-centered">Between...</h1>

                    <div class="columns is-mobile marginBottom20">
                    
                    <div class="column is-half">
                    <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">End Date</h1>
                        
                  <!-- start date input -->
                  <input type="date" name="startDate" id="startDate">
                </div>
        
                <div class="column is-half">
                    <h1 class="title is-4 has-text-centered is-marginless" style="padding-bottom: 10px;">End Date</h1>

                    <!-- end date input -->
                    <input type="date" name="endDate" class="marginBottom30">
                  </div>  

                </div><!-- /columns is-mobile -->

                    <hr>
                    <div class="field">                          
                        <input type="submit" class="button is-success is-large is-fullwidth" name="submit" value="Search Workers">
                    </div>


                </div><!-- /steps-content -->


            </div>

            <!-- ============================= -->
            <!-- ========  end form  ========= -->
            <!-- ============================= -->
        </form>


        <div id="Results" class="content-tab" style="display:none">



            <?php
            if ($_REQUEST['submit'] == "Search Workers") {

                $searchDay = $_GET["dayAvailable"];
                $searchDayPart = $_GET["dayPart"];
                $searchSkill = $_GET["skill_CB"];
                $searchStartDate = $_GET["startDate"];
                $searchEndDate = $_GET["endDate"];
                
                echo "<h3 class='subtitle is-5 has-text-centered is-marginless'><b>Searching for a:</b><br><u>$searchSkill</u> on <u>$searchDay</u><br>during <u>$searchDayPart</u><br>between <u>$searchStartDate</u> and <u>$searchEndDate</u></h3><br>";

                $result = workerSearch($searchSkill, $searchDay, $searchDayPart);

                displayTable($result);
            }
            ?>


        </div>
    </div>


</div>
</section>
</body>
</html>

