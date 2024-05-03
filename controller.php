<?php
    session_start();
    include("includes/sqlconnection.php");

    if(isset($_POST['save_record'])){

        $customerName = $_POST['txtname'];
        $contactNo = $_POST['txtcontact'];
        $email = $_POST['txtemail'];
        $foodName = $_POST['txtfood'];
        $pic = $_FILES['txtpic']['name'];

        $sql ="INSERT INTO studinfo(fullname,contact,email,foodname,pic)VALUES('$customerName','$contactNo','$email','$foodName','$pic')";

        if($conn->query($sql)===TRUE){

            move_uploaded_file($_FILES["txtpic"]["tmp_name"],"uploads/".$_FILES['txtpic']['name']);
            $_SESSION['status'] ="Record Insert Successfully";
            header('location:view.php');

        }else{
            $_SESSION['status'] ="Error: Insert Failed.....";
            header('location:view.php');

        }

        $conn->close();
    }


    if(isset($_POST['update_record'])){

        $id = $_POST['txtid'];
        $customerName = $_POST['txtname'];
        $contactNo = $_POST['txtcontact'];
        $email = $_POST['txtemail'];
        $foodName = $_POST['txtfood'];
        $pic_new = $_FILES['txtpic']['name'];
        $pic_old = $_POST['txtpic_old'];

        if($pic_new !=''){
            $update_pic = $pic_new;
        }
        else{
            $update_pic = $pic_old;
        }

        echo "$update_pic";


        $sql = "UPDATE studinfo SET fullname ='$customerName', contact ='$contactNo', email ='$email', foodName ='$foodName', pic ='$update_pic' WHERE id='$id'";

        if ($conn->query($sql) === TRUE){
            move_uploaded_file($_FILES["txtpic"]["tmp_name"],"uploads/".$_FILES['txtpic']['name']);
            $_SESSION['status'] ="Record Update Successfully";
            header('location:view.php');
        }
        else {
            $_SESSION['status'] ="Error: Update Failed";
            header('location:edit.php');
        }
        $conn->close();
        
    }

    if(isset($_GET['id'])){

        $id = $_GET['id'];
        $pic = $_GET['pic'];
        $sql = "DELETE FROM studinfo WHERE id ='$id'";

        if ($conn->query($sql) === TRUE) {
            unlink("uploads/".$pic);
            $_SESSION['status'] ="Record Deleted Successfully";
            header('location:view.php');
        } else {
            $_SESSION['status'] ="Deletion Failed";
            header('location:view.php');
        }

        $conn->close();
    }


?>