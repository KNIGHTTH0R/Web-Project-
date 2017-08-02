<?php

// require_once 'CSE391Project/init.php';
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      echo "success";
   }

      include 'template.html';
//All articles

if(isset($_GET['id'])){


 $professionals_id = (int)$_GET['id'];


}




?>
<!DOCTYPE html>
<html>
<head>
<title>Artilce</title>
<style>


div.product{
position:absolute;
left:561px;
top:209px;
font-size: 28px;

}
div.article-rating{

position:absolute;
left:223px;
top:346px;
font-size: 28px;
}

div.article-rate{
position:absolute;
left:223px;
top:298px;
font-size: 28px;
}

</style>

</head>
<body> 

 <div class="article">
<?php 
$sql="SELECT * FROM  professionals  WHERE id={$professionals_id}";
 
 // $result=$link->query("$sql");

if($result=$link->query("$sql")) {
 echo  "<table   align='center' style='border: 1px solid red;margin-top:0px';  cellspacing=0 cellpading=0>";
    while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td> "."<div style='position:absolute; left:389px; top:500px;font-size: 28px;color:black;'>"  ."ID ". $row["id"] . "</td>" ;
            echo "<td> "."<div style='position:absolute; left:678px; top:542px;font-size: 28px;color:black;'>"  ." NAME : ". $row["name"] . "</td>" ;
              echo "<td> "."<div style='position:absolute; left:355px; top:593px;font-size: 28px;color:black;'>" ." Description : ". $row["Description"] . "</td>" ;
               echo "<td> "."<div style='position:absolute; left:357px; top:800px;font-size: 28px;color:black;'>"  . " Contact Information : " . $row["Contact_information"] . "</td>" ;
                   echo "<td>"?> <img src="<?php echo $row["P_ImagePath"]; ?>"  width="500px"><?php echo "</td>" ;
                 echo "</tr>";
    }



echo "</table>";
    /* free result set */
    $result->close();
}
?>
 </body>
</html>