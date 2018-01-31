<?php include "db.php";?>


<?php 

function ShowAllData(){
   global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query FAILED' . mysqli_error());
    }
 while($row = mysqli_fetch_assoc($result)){
               $id = $row['id'];                        
      echo "<option value='$id'>$id</option>";   
        }
  }

function UpdateTable(){
     if (isset($_POST['submit'])){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    
    $query = "UPDATE users SET ";
    $query .="username = '$username' , ";
    $query .="password = '$password' ";
    $query .= "WHERE id = $id";
    
    $result = mysqli_query ($connection,$query);
    
    if (!$result){
        
        die ("query failed" . mysqli_error($connection));
    }else {
        echo "Record Updated";
    }
     }
}




function deleteRows(){
    if (isset($_POST['submit'])){
    global $connection;
 $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    
    $query = "DELETE FROM users ";
    $query .= "WHERE id = $id";
    
    $result = mysqli_query ($connection,$query);
    
    if (!$result){
        
        die ("query failed". mysqli_error($connection));
    }else {
        echo "Record Deleted";
    }
    }
}


function CreateRows(){
if (isset($_POST['submit'])){
global $connection;
    
   $username = $_POST['username'];
  $password =  $_POST['password'];   
    
  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);
    
    $hashFormat = "$2y$10$";
    
    // salt length should be more than 23 characters
    
    $salt = "iamlearningalotandifeelsogood2018";
    $hashF_and_salt = $hashFormat . $salt;
    
    $password = crypt ($password, $hashF_and_salt);
    
    
        
  
    $query = "INSERT INTO users(username, password) ";
    $query .= "VALUES('$username', '$password')";
    
    
   $result =  mysqli_query($connection, $query);
    
    
    if(!$result){
        
        die('query failed' . mysqli_error($connection));
    } else {
        echo "Record Created";
    }

}
}

function readRows(){
    global $connection;
  $query = "SELECT * FROM users";        
   $result =  mysqli_query($connection, $query);    
    if(!$result){        
        die('query failed' . mysqli_error($connection) );
    }  
            while($row = mysqli_fetch_assoc($result)){             
       print_r($row);              
      }  
}
