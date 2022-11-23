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
        <sectin>
            <div class = 'text'>
                <h1> NEW PATIENT PROFILE </h1><br>
                <h2> ADD PATIENT PROFILE HERE </h2>
            </div>
        </sectin>

        <div class="bigbox">
            <div class = 'infobox'>
                <form method="post" action="sql/insert.php" id="form1" class="form-horizontal" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="input">
                                    <div class = 'petname'>
                                        <label>PET NAME:</label>
                                        <input type="text" name="Pet_name" style="font-size:22px;width:260px;"><br>
                                    </div>
                                    <div class = 'petname'>
                                        <label>PET TYPE:</label>
                                        <select  name = "Pet_type" style="font-size: 22px;width:260px;">
                                            <option value = "Cat">Cat
                                            <option value = "Dog">Dog
                                            <option value = "Birds">Birds
                                            <option value = "Reptiles">Reptiles
                                            <option value = "Amphibia">Amphibia
                                        </select> <br>
                                    </div>
                                    <div class = 'petname'>
                                        <label>PET SEX:</label>
                                        <select  name = "Pet_gender" style="font-size: 22px;width:260px;">
                                            <option value = "male">male
                                            <option female = "female">female
                                        </select> <br>
                                    </div>
                                    <div class = 'petname'>
                                        <label>DATE OF BIRTH:</label>
                                        <input type="date" name="Pet_DOB" style="font-size: 22px;width:260px;"><br>
                                    </div>
                                    <div class = 'petname'>
                                        <label>OWNER NAME:</label>
                                        <input type="text" name="Owner_fullname" style="font-size: 22px;width:260px;"><br>
                                    </div>
                                    <div class = 'petname'>
                                        <label>OWNER PHONE:</label>
                                        <input type="number" name="Owner_phonenum" style="font-size: 22px;width:260px;"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input">
                                    <center>
                                        <div class="circular--portrait"> 
                                            <img src="pics/logo.png" id="blah" style="border-radius:50%;"> 
                                        </div>
                                        <div class="container1" style="margin-left:30%;margin-top:15px;">                      
                                            <div class="button-wrap">
                                                <label class="button" for="upload">Upload</label>
                                                <input name="upload" id="upload" type="file" onchange="readURL(this);">
                                            </div>
                                        </div>
                                        <div class="btn">
                                            <a href="#" onclick="document.getElementById('form1').submit();">ADD NEW PATIENT</a>
                                        </div>
                                    </center>                            
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
