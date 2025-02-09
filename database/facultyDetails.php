<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendenceapp/database/database.php";
class faculty_details
{
    public function verifyUser($dbo,$un,$pw)
    {
        $rv=["id"=>-1,"status"=>"ERROR"];
          $c="select id,password from faculty_details where user_name=:un";
          $s=$dbo->conn->prepare($c);
          try{
             $s->execute([":un"=>$un]);
             if($s->rowCount()>0)
             {
                 $result=$s->fetchAll(PDO::FETCH_ASSOC)[0];
                 if($result['password']==$pw)
                 {
                    
                    $rv=["id"=>$result['id'],"status"=>"ALL OK"];
                 }
                 else{
                    
                    $rv=["id"=>$result['id'],"status"=>"Wrong password"];
                 }
             }
             else{
              
              $rv=["id"=>-1,"status"=>"USER NAME DOES NOT EXISTS"];
             }
          }
          catch(PDOException $e)
          {

          }
          return $rv;
    }
}
?>
