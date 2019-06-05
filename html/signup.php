<?php
require "db.php";

$data=$_POST;//variable for POST. When button pressed in global super masiv Post  will appear  all datas this form also appear empty cell

if( isset($data['do_signup']))//check for button which was pressed 33
{

  //for registration and then you can registration

  $errors = array();
  if(trim($data['login'])==''){
    $errors[]="Input your login!";
  }

  if(trim($data['email'])==''){
    $errors[]="Input your E-mail!";
  }

  if($data['password'] ==''){
    $errors[]="Input your password!";
  }

  if( $data['password_2'] !=$data['password']){
    $errors[]="Repeated password was iputting incorrect!!!!";
  }

  if(R::count('users',"login = ?",array($data['login']))>0){
    $errors[]="User with this name alredy was in a database";
  }

  if(R::count('users',"email=?",array($data['email']))>0){
    $errors[]="User with this E-mail alredy was in a database";
  }

  if(empty($errors)){
    //all right, can registration

   $user=R::dispense('users');//create table users. AutOIncrement create automatically
   $user->login=$data['login'];
   $user->email=$data['email'];
   $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
   R::store($user);
   echo'<div style="color: green;">Yours registration was succesfull!!!!</div><hr>';

  }else
  {
    echo'<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }

}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="../CSS/signup.css" rel="stylesheet" >
  </head>
</html>




<form action="signup.php" method="POST">

 <p>
   <p><strong>Your login</strong>:</p>
   <input type="text" name="login" value="<?php echo @$data['login']; ?>">
</p>

<p>
  <p><strong>Your E-mail</strong>:</p>
  <input type="email" name="email" value="<?php echo @$data['email']; ?>">
</p>

<p>
  <p><strong>Your password</strong>:</p>
  <input type="password" name="password" value="<?php echo @$data['password']; ?>">
</p>

<p>
  <p><strong>Please repeat your password in form</strong>:</p>
  <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
</p>

<p>
  <button type="submit" name="do_signup"> Click on it for Registration and hang a few seconds on please. </button>
<p>

</form>
