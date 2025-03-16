<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $con_password = $_POST["con_password"];

        if(!empty($name) && !empty($email) && !empty($password) && !empty($con_password)){
           
                if($password == $con_password){
                    echo "<h2>Form Submitted Successfully!</h2>";
                    echo "<p><strong>Name:</strong> $name</p>";
                    echo "<p><strong>Email:</strong> $email</p>";
                    echo "<p><strong>Password:</strong> $password</p>";
                }else{
                    echo "Passwords do not match!";
                }
            } else{
                echo "Invalid email format!";
            }
        }
?>