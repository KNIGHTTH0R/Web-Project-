<?php

// require_once 'CSE391Project/init.php';
//All articles
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      echo "success";
   }

$kitchen="kitchen";

$engineers = array() ;
$query= $link->query(" SELECT * FROM  professionals WHERE Type='Engineer'");
while($row=$query->fetch_object()){ //converting the result set in to object
  $engineers[]=  $row; //storing the objects in to the array

}

?>
<!DOCTYPE html>
<html>
<head>
<title>Articles</title>
<style>
body{
  /* Setting default text color, background and a font stack */
  color:#666;
  font-size:13px;
  font-family:Arial, Helvetica, sans-serif;
  

  background: url(my-house-2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;


}
</style>
</head>
<body>

  <?php foreach($engineers as $engineer): ?>
  <div class="article">
  <h3><a href="hireprofessionals.php?id=<?php echo $engineer->id; ?>">
  <?php echo  $engineer->name;?><img src="<?php echo $engineer->Product_ImagePath; ?>"  width="500px"></a></h3> <!-- //title linking through a page -->
  <div class="totalrating">Engineer Name: <?php echo $engineer->name; ?> </div>
 <?php  endforeach;?>

</div>
</body>
</html>