<?php 

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cnfmpassword=$_POST['cnfmpassword'];

// database connection


$conn = new mysqli('localhost','root','','enrollment');

if ($conn->connect_error){
    die('Unable to Connect : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into login(username,email,password,cnfmpassword) value(?,?,?,?)");
    $stmt->bind_param("ssss",$username,$email,$password,$cnfmpassword);
    $stmt->execute();
    echo "<script>alert('Account Create Successfull!!!');window.location.href='enrol.html'</script>";
    $stmt->close();
    $conn->close();
}
?>