<?php
 ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);
   // session_start();
    $id=0;
    $fname="";
    $lname="";
    $phone ="";
    $result ="";
    $edit_state=false;
    $database = mysqli_connect('localhost','admin','root','test');  
   //insert the elements in to the database
  if(isset($_POST['save']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $phone =$_POST['phone'];
    $query = "INSERT INTO users (firstname,lastname,phone) VALUES ('$fname','$lname','$phone')";
     
    // if($fname !='' && $lname != '' && $phone != '')
    //  { 
        $check=mysqli_query($database,$query);
        
         // $_SESSION['msg'] = "Details saved";
       
       
         header('location:index.php?msg=success');
        
     // }
     // else
     // {
     //    $_SESSION['msg'] = " please enter details";
     // } 
  }
  // delete the elements from the databse
   if(isset($_GET['del']))
  {
     $id=$_GET['del'];  
     mysqli_query($database,"DELETE FROM users WHERE id=$id");
     header('location:index.php?msg=deleted');
  }
 // update the elements to the database
  if(isset($_POST['update']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $phone=$_POST['phone'];
    $id=$_POST['id'];
    mysqli_query($database,"UPDATE users SET firstname='$fname',lastname='$lname',phone='$phone',date_edited=now()  WHERE id=$id");
     $_SESSION['msg']="Details updated";
     // unset($_SESSION['msg']);
     header('location:index.php?msg=updated');
   }
  



?>
