<?php

    include('../connect.php');

    $Pet_name = $_POST['Pet_name'];
    $Pet_type = $_POST['Pet_type'];
    $Pet_gender = $_POST['Pet_gender'];
    $Pet_DOB = $_POST['Pet_DOB'];
    $Owner_fullname = $_POST['Owner_fullname'];
    $Owner_phonenum = $_POST['Owner_phonenum'];

    if($Pet_name==''){
        echo '<script> alert("Please Enter PET NAME");history.back();</script>';   
    }
    elseif($Pet_type==''){
        echo '<script> alert("Please Select PET TYPE");history.back();</script>'; 
    }
    elseif($Pet_gender==''){
        echo '<script> alert("Please Select PET SEX");history.back();</script>'; 
    }
    elseif($Pet_DOB==''){
        echo '<script> alert("Please Select DATE OF BIRTH");history.back();</script>'; 
    }
    elseif($Owner_fullname==''){
        echo '<script> alert("Please Enter OWNER NAME");history.back();</script>'; 
    }
    elseif($Owner_phonenum==''){
        echo '<script> alert("Please Enter OWNER PHONE");history.back();</script>'; 
    }

    if($_FILES['upload']['name'] != ''){
        $temp =  explode('.',$_FILES['upload']['name']);
        $Pet_image = round(microtime(true)*9999) . '.' . end($temp);
        $url_upload = '../pics/'.$Pet_image;
        if ( move_uploaded_file($_FILES['upload']['tmp_name'], $url_upload) ){}
        else{
            echo '<script> alert("ไม่สามารถอัพโหลดรูปภาพใหม่ได้ โปรดลองอีกครั้ง");history.back();</script>'; 
        }
    } else {
        $Pet_image = 'logo.png';
    }

    $sql="SELECT * FROM owner WHERE Owner_fullname='".$Owner_fullname."' AND Owner_phonenum='".$Owner_phonenum."'";
    $result = mysqli_query($conn,$sql);
            
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $Owner_id=$row["Owner_id"];
    }else{
        $sql = "INSERT INTO owner(Owner_fullname,Owner_phonenum) 
        VALUES ('".$_POST['Owner_fullname']."','".$_POST['Owner_phonenum']."')";
        $conn->query($sql);
        $Owner_id = $conn->insert_id;      
    }


    $sql = "INSERT INTO patient(Pet_name,Pet_type,Pet_DOB,Pet_gender,Pet_image,Owner_id) 
    VALUES ('".$_POST['Pet_name']."',
            '".$_POST['Pet_type']."',
            '".$_POST['Pet_DOB']."',
            '".$_POST['Pet_gender']."',
            '".$Pet_image."',
            '".$Owner_id."')";

    $result = $conn->query($sql);
    if ($result) {
        echo '<script> alert("บันทึกสำเร็จ")</script>';
        header('Refresh:0; url=../website.php');
    } else {
        echo '<script> alert("บันทึกไม่สำเร็จ");history.back();</script>';
    } 

?>