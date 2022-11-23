<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PIPET Hospital</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- navigator -->
        <header id ="menu">
            <div class="inner_menu">
                <ul>
                    <li><a>HOME</a></li>
                    <li><a href="tryproj.html">NEW PATIENT</a></li>
                    <li><a href="patient.php">PATIENT</a></li>
                </ul>
            </div>
            <a class = logo href=""><img src="pics/logo 1.svg"></a>
        </header>


        <!--Part1  -->
        <section>
            <div class="part1">
                <div class="pic1">
                    <img src="pics/banner.svg" alt="picbanner" >
                </div>
                <div id = banner>
                    <div class="sec-title">
                        <p id="namehos">PIPET <br>HOSPITAL </p>
                    </div>
                    <div class="sec-quote">
                        <p id = quote> <br> YOUR TRUST HOSPITAL <br><br><br></p>
                    </div>
                    <div class="sec-button">
                        <a href="#patient">
                            <button id="start">Start</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Team part -->
        <section>
            <div class="team">
                <div class="team_center">
                    <h1> Our Team <br></h1>
                    <p>Our Vet graduated from top university in Thailand <br>
                        We are experienced for more than 10 years </p>
                </div>
                <div class="team_content">
                    <div class="team_box">
                        <div class="box">
                            <img src="pics/ampere.png">
                            <h3> DR.Ampere</h3>
                            <h5> X-ray</h5>
                        </div>
                        <div class="box">
                            <img src="pics/pipe.png">
                            <h3> DR.PIPE</h3>
                            <h5>STERILISING</h5>
                        </div>
                        <div class="box">
                            <img src="pics/fah.png">
                            <h3> DR.FAH</h3>
                            <h5>SURGERY</h5>
                        </div>
                        <div class="box">
                            <img src="pics/grace.png">
                            <h3>DR.GRACE</h3>
                            <h5>EYEISEASE CENTER</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Patient Collection -->
        <section id = patient>
            <div class="collect">
                <div class="title">
                    <h3>Patient Collection </h3>
                    <p>OUR PATIENT RECORDS</p>
                </div>

                <?php
                include('connect.php');
                $Num=1;
                $sql ="select * from patient left outer join owner on patient.Owner_id =owner.Owner_id ";
                $query = mysqli_query($conn,$sql);
                while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { 
                    $Owner_id=$result['Owner_id'];   
                    $Pet_id =$result['Pet_id'];
                    $Pet_name = $result['Pet_name']; 
                    $Pet_image = $result['Pet_image']; 
                    if($Num==1){
                    ?>
                        <div class="pinfo">
                    <?php
                    }  
                    ?>
                        <div class="rbox">
                            <a href="tryproj_edit.php?Pet_id=<?php echo $Pet_id?>"><img src="pics/<?php echo $Pet_image?>" alt="cat"></a>
                            <h4><?php echo $Pet_name?></h4>
                            <p>PatientID: <?php echo $Pet_id?></p>
                            <p>Owner ID: <?php echo $Owner_id?></p>
                        </div>
                    <?php  
                    if($Num==3){
                    ?>
                        </div>
                    <?php
                        $Num=0;
                    }                          
                    $Num++;              
                }                 
                ?>            
            </div>
           
        </section>
        <center>
            <div class="btn">
                <a href="tryproj.php">ADD NEW PATIENT</a>
            </div>
        </center>
    </body>
</html>
