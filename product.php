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

$articles = array() ;
$query= $link->query(" SELECT COUNT(*) as count, articles.Product_ImagePath,articles.id, articles.title, AVG(articles_ratings.rating) AS rating 
	FROM  articles
	INNER JOIN articles_ratings
	ON articles.id=articles_ratings.articles AND articles.Product_Type='kitchen'
	GROUP BY  articles.id 
	");
while($row=$query->fetch_object()){ //converting the result set in to object
  $articles[]=  $row; //storing the objects in to the array

}
$sql=" SELECT COUNT(*) as count, articles.Product_ImagePath,articles.id, articles.title, AVG(articles_ratings.rating) AS rating 
  FROM  articles
  INNER JOIN articles_ratings
  ON articles.id=articles_ratings.articles AND articles.Product_Type='kitchen'
  GROUP BY  articles.id 
  ";

$result=$link->query("$sql");
echo  "<table   align='center' border='1' style='width:100%' cellspacing=10 cellpading=50>";
while ($rows = $result->fetch_assoc()) {
          echo "<tr>";
       echo   "<h3><a href=article.php?id=".$rows['id'] ."><img src='". $rows['Product_ImagePath']."' width='500px'></a></h3>"; 
       echo "Rated By:". $rows['count']." People";
 echo "Total AVG User Rating:".$rows['rating']."/5";
        echo "</tr>";
    }

echo "</table>";

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
  

  background: url(background.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;


}
</style>
</head>
<body>
  <?php foreach($articles as $article): ?>
  <div class="article">
  <h3><a href="article.php?id=<?php echo $article->id; ?>">
  <?php echo  $article->title;?><img src="<?php echo $article->Product_ImagePath; ?>"  width="500px"></a></h3> <!-- //title linking through a page -->
 <div class="totalrating">Rated By: <?php echo $article->count; ?> People </div>
 <div class="article-rating">Total AVG User Rating:<?php echo round($article->rating);?>/5 </div>
 <?php  endforeach;?>

</div>
</body>
</html>