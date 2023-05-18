<?php
include("connect.php");
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$insert = mysqli_query($connect,"INSERT INTO user (name,email,password,role,status,votes) VALUES ('$name','$email','$password','$role',0,0)");
if($insert)
{
    echo '
    <script>
        alert("Registration Successful");
        window.location = "../routes";
    </script>
    ';
}
else
{
    echo '
    <script>
        alert("Unknown error occured");
        window.location = "../routes/";
    </script>
    ';
}
?>