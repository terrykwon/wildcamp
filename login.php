<?php
 
    include("config.php");
    session_start();   //세션시작
 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $myusername=addslashes($_POST['id']); 
    $mypassword=addslashes($_POST['password']); 
 
    $sql="SELECT user_id FROM USER WHERE name='$myusername' and password='$mypassword'";
    $result=mysql_query($sql);
 
    $count=mysql_num_rows($result);
 
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1)
    {
        session_register("myusername");
        $_SESSION['login_user']=$myusername;
 
        header("location: index.html");
    }
    else 
    {
        $error="아이디와 비밀번호를 확인해주세요.";
    }
}