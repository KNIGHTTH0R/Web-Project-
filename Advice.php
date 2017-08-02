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
$sql="SELECT * FROM  advice ";
 
 // $result=$link->query("$sql");

if($result=$link->query("$sql")) {
 echo  "<table   align='center' border='1' style='width:100%' cellspacing=10 cellpading=50>";
    while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td> ". $row["id"] . "</td>" ;
            echo "<td> ". $row["name"] . "</td>" ;
              echo "<td> ". $row["info"] . "</td>" ;
               echo "<td> ". $row["advice"] . "</td>" ;
                   echo "<td>"?> <img src="<?php echo $row["Image_path"]; ?>"  width="500px"><?php echo "</td>" ;
                  echo "</tr>";
    }
echo "</table>";
    /* free result set */
    $result->close();
}
?>
</body>
</html>