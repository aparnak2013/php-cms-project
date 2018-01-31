<?php

if(isset($_POST['submit'])){
    
   $username = $_POST['username'];
   $password = $_POST['password'];
    
    
    $connection = mysqli_connect('localhost','root','root','test');
    
    if($connection){
        
        echo "we are connected";
    }
else {
    
    die("database connection failed");
}   
//   if($username && $password){
//        
//         echo $username.$password;  
//        
//    }
//    
//    else {
//        
//      echo "username and password is required";  
//    }
//        
//      
 
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>
<body>
   
    <div class="container">
        <div class="col-sm-6">
            <form action="login.php" method="post">
                <div class="form-group">
                <label for="username">Username</label> 
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                     <label for="password">Password</label> 
                    <input type="password" name="password" class="form-control">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="submit">
            </form>
            
            
        </div>
        
        
    </div>
    
</body>
</html>