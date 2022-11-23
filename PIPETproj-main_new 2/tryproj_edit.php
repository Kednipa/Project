<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PIPET Hospital</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="newpatient.css">
        <link rel="stylesheet" href="style.css">
        <style>
            .circular--portrait { 
                position: relative; 
                width: 200px; 
                height: 200px; 
                overflow: hidden; 
                border-radius: 50%; 
            } 
            .circular--portrait img {
                width: 100%; 
                height: auto; 
            }
            .container1 {
                display: flex;
                align-items: flex-start;
                justify-content: flex-start;
                width: 100%;
            }
            input[type="file"] {
                position: absolute;
                z-index: -1;
                top: 10px;
                left: 8px;
                font-size: 17px;
                color: #b8b8b8;
            }
            .button-wrap {
                position: relative;
            }
            .button {
                display: inline-block;
                padding: 12px 18px;
                cursor: pointer;
                border-radius: 5px;
                background-color: #512E5F;
                font-size: 16px;
                font-weight: bold;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <!-- nav -->
        <header id ="menu">
            <div class="inner_menu">
                <ul>
                    <li><a href="website.html">HOME</a></li>
                    <li><a href="newpatient.php">NEW PATIENT</a></li>
                    <li><a href="patient.php">PATIENT</a></li>
                </ul>
            </div>
            <a class = logo href="website.html"><img src="pics/logo 1.svg"></a>
        </header>
        <!-- form -->

        <?php
            if(isset($_GET['Pet_id'])){
                include('connect.php');
                $Num=1;
                $Pet_id=$_GET['Pet_id'];
                $sql ="select * from patient left outer join owner on patient.Owner_id=owner.Owner_id where Pet_id='$Pet_id'";
                $query = mysqli_query($conn,$sql);
                while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { 
                    $Owner_id=$result['Owner_id']; 
                    $Owner_fullname = $result['Owner_fullname'];
                    $Owner_phonenum = $result['Owner_phonenum'];  
                    $Pet_id =$result['Pet_id'];
                    $Pet_name = $result['Pet_name'];
                    $Pet_type = $result['Pet_type'];
                    $Pet_gender = $result['Pet_gender'];
                    $Pet_DOB = $result['Pet_DOB'];
                    $Pet_image = $result['Pet_image'];
                }
            }
        
        ?>
        <sectin>
            <div class = 'text'>
                <h1> PATIENT PROFILE </h1><br>
                <h2> Update PATIENT PROFILE HERE </h2>
            </div>
        </sectin>
        <div class="bigbox">
            <div class = 'infobox'>
                <form method="post" action="sql/edit.php" id="form1" class="form-horizontal" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row" >                               
                            <div class="col-4" style="font-size: 18px;margin-top:50px;">
                                <center>
                                    <div class="circular--portrait"> 
                                        <img src="pics/<?php echo $Pet_image;?>" id="blah" style="border-radius:50%;"> 
                                    </div>
                                </center> 
                            </div>  
                            <div class="col-8" style="font-size: 22px;margin-top:30px;">                                      
                                <b>PET NAME : </b><?php echo $Pet_name;?>
                                <b style="margin-left:20%;">PET TYPE : </b><?php echo $Pet_type;?><br><br>

                                <b>DATE OF BIRTH : </b><?php echo date('d.m.Y', strtotime($Pet_DOB));?>
                                <b style="margin-left:8%;">PET SEX : </b><?php echo $Pet_gender;?><br><br>

                                <b>OWNER ID : </b><?php echo $Owner_id;?>
                                <b style="margin-left:20%;">OWNER NAME : </b><?php echo $Owner_fullname;?><br><br>

                                <b>OWNER PHONE : </b><?php echo $Owner_phonenum;?><br><br>

                                <b>DEPARTMENT ID : </b>1043
                                <b style="margin-left:15%;">VET ID : </b>6627<br><br>

                                <b>UPDATE STATUS</b>
                                <textarea id="status" name="status" rows="3" cols="60"></textarea>

                                <input type="hidden" name="Pet_id" value="<?php echo $Pet_id;?>">
                                <div class="btn" style="margin-left:35%;">
                                    <a href="#" onclick="document.getElementById('form1').submit();">UPDATE PATIENT</a>
                                </div>
                            </div>                                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
           function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>
</html>
