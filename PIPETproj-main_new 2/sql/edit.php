<?php

    include('../connect.php');

    $Pet_id = $_POST['Pet_id'];
    $status = $_POST['status'];

    if($status==''){
        echo '<script> alert("Please Enter UPDATE STATUS");history.back();</script>';   
    }
    
    $sql = "Update patient set status='$status' where Pet_id='$Pet_id'";
    $result = $conn->query($sql);
    if ($result) {
        echo '<script> alert("บันทึกสำเร็จ")</script>';
        header('Refresh:0; url=../website.php');
    } else {
        echo '<script> alert("บันทึกไม่สำเร็จ");history.back();</script>';
    } 

?>