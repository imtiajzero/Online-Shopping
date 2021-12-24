<?php
include 'configuration/constants.php';
 $username = $_POST['user'];
 $email = $_POST['mail'];
 $password =md5($_POST['pass']);
 $cpassword =md5( $_POST['cpass']);
 
    if($password != $cpassword){  
        echo '<script>alert("password not matched!\r\nPlease insert valid password")</script>'; 
    }
        else{
            $stmt = $conn->prepare("insert into tbl_user_info(name,email,password) values(?,?,?)");
            $stmt->bind_param("sss",$username,$email,$password);
            $stmt->execute();    
            $stmt->close();
            $conn->close();
            
            header('location: login.php');
            echo "Sign Up Successfull!";
            }

?>