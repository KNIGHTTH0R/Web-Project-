<?php
//Database connection
// require_once 'CSE391Project/init.php';
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }
if(isset($_GET['article'],$_GET['rating'])){


   $article = (int)$_GET['article'];
   $rating= (int)$_GET['rating'];
   $ratingarray= array(1,2,3,4,5);
   // $ratingarray=1;
   // $ratingarray=2;
   //  $ratingarray=3;
   // $ratingarray=4;
   // $ratingarray=5;
   if(in_array($rating, $ratingarray)){
   $sql="SELECT id FROM articles WHERE id=".$article;
    $exists = $link->query("SELECT id FROM articles WHERE id= {$article}")->num_rows ? true : false;
  
   // $result=$link->query("$sql");
   
   // die("$sql");
   //  var_dump($result);
   //  $rows=$result->num_rows;    
   //  echo  $rows;
   if($exists){
   
   $link->query("INSERT  INTO articles_ratings  VALUES (NULL,{$article},{$rating})");
   
   // die("INSERT  INTO articles_ratings (article,rating) VALUES({$article},{$rating})");
   }
   
   }

   header('Location:article.php?id='.$article);
   }
// All artilces
?>

<!DOCTYPE html>
<html>
<head>
<title>init</title>
</head>
<body>






</body>
</html>