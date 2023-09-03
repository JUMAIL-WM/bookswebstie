<?php

$username = $_POST['username'];
$password =$_POST['password'];

// database connection

$conn = new mysqli('localhost','root','','enrollment');

if ($conn->connect_error){
    die("Unable to Connect : ".$conn->connect_error);
}else{
    $stmt = $conn->prepare("select * from login where username= ?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
            if($data['password'] == $password){
                header("location:enrol.html");
            }else{
                echo "<h2> Invalid Email or Password </h2>";
            }
    }else{
        echo "<h2> Invalid Email or Password </h2>";
    }
}


    



?>