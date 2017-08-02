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

$architectures = array() ;
$query= $link->query(" SELECT * FROM  professionals WHERE Type='Architecture'");
while($row=$query->fetch_object()){ //converting the result set in to object
  $architectures[]=  $row; //storing the objects in to the array

}

?>
<!DOCTYPE html>
<html>
<head>
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

<title>Articles</title>
</head>
<body>

  <?php foreach($architectures as $architecture): ?>
  <div class="article">
  <h3><a href="hireprofessionals.php?id=<?php echo $architecture->id; ?>">
  <?php echo  $architecture->name;?><img src="<?php echo $architecture->Product_ImagePath; ?>"  width="500px"></a></h3> <!-- //title linking through a page -->
  <div class="totalrating">Architecture Name: <?php echo $architecture->name; ?> </div>
 <?php  endforeach;?>

</div>
</body>
</html>