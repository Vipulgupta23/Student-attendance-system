<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendenceapp/database/database.php";
require_once $path."/attendenceapp/database/facultyDetails.php";
$action=$_REQUEST["action"];
if(!empty($action))
{
    if($action=="verifyUser")
    {      
        
          $un=$_POST["user_name"];
          $pw=$_POST["password"];
          
          $dbo=new Database();
          $fdo=new faculty_details();
          $rv=$fdo->verifyUser($dbo,$un,$pw);
          if($rv['status']=="ALL OK")
          {
            session_start();
            $_SESSION['current_user']=$rv['id'];
          }
          for($i=0;$i<100000;$i++)
          {
            for($j=0;$j<10000;$j++)
            {
                
            }
          }
          
          
          echo json_encode($rv);
    }
}
?>