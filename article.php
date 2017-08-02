<?php

// require_once 'CSE391Project/init.php';
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }

      include 'template.html';
//All articles
$article=null;
if(isset($_GET['id'])){

  $id=(int)$_GET['id']; //for security reasons casted to int (mysql injection)
$article= $link->query(" SELECT COUNT(*) As count, articles.id, articles.title, AVG(articles_ratings.rating) AS rating 
	FROM  articles
	LEFT JOIN articles_ratings
	ON articles.id=articles_ratings.articles
	WHERE articles.id= {$id}")->fetch_object();
}
  
?>
<!DOCTYPE html>
<html>
<head>
<title>Artilce</title>
<style>


div.product{
position:absolute;
left:635px;
top:907px;
font-size: 35px;
color: black;
}
div.article-rating{

position:absolute;
left:869px;
top:1350px;
font-size: 18px;
color: black;
}

div.totalrating{
position:absolute;
left:869px;
top:1375px;
font-size: 18px;
color: black;
}

div.buy{
position:absolute;
left:869px;
top:1254px;
font-size: 20px;
color: black;
}


div.article-rate{
position:absolute;
left:869px;
top:1400px;
font-size: 20px;
color: black;
}

</style>

</head>
<body> 
<?php if($article): ?>
 <div class="article">

<div class="product"> "<?php echo $article->title; ?>".</div>
<div class="totalrating">Rated By: <?php echo $article->count; ?> People </div>
<?php 
$sql="SELECT * FROM  articles WHERE id =".$_GET['id'];
 
 // $result=$link->query("$sql");

if($result=$link->query("$sql")) {
 echo  "<table   align='center' style='border: 1px solid red;margin-top:0px';  cellspacing=0 cellpading=0>";
    while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td> "."<div style='position:absolute; left:223px; top:210px;font-size: 17px;color:black;'>"  . $row["id"] . "</td>" ;
              echo "<td> "."<div style='position:absolute; left:365px; top:1000px;font-size: 17px;color:black;'>" ."Product Description :". $row["Product_Description"] . "</td>" ;
               echo "<td> "."<div style='position:absolute; left:365px; top:1050px;font-size: 25px;color:black;'>"  ."Product Cost : TK ". $row["Product_Cost"] . "</td>" ;
                 echo "<td> "."<div style='position:absolute; left:365px; top:1100px;font-size: 17px;color:black;'>" . "Product Type :".$row["Product_Type"] . "</td>" ;
                   echo "<td> "."<div style='position:absolute; left:365px; top:1150px;font-size: 17px;color:black;'>"  ."Product Status :". $row["Product_Status"] . "</td>" ;
                   echo "<td>" ?> <img src="<?php echo $row["Product_ImagePath"]; ?>"  width="500px"><?php echo "</td>" ;
                  echo "<td> "."<div style='position:absolute; left:365px; top:1200px;font-size: 28px;color:black;'>"  ."Product Warranty :". $row["Product_Warranty"] . "</td>" ;
                 echo "</tr>";
    }
echo "</table>";
    /* free result set */
    $result->close();
}
?>
 <div class="article-rating">Total AVG Rating: <?php echo round($article->rating);?>/5 </div>
 <div class="article-rate">
 	Rate Our Product Out of 5:
  <br><br>
 	<?php foreach(range(1,5) as $rating): ?><!--  genearting an array containg intger 1-5 in the for each loop -->
    <a href="rate.php?article=<?php echo $article->id;?>&rating=<?php echo $rating;?>"><?php echo $rating;?></a>
    
    <?php endforeach;?> 
 </div>
  <div  class="buy">
  <a href="buy.php?article=<?php echo $article->id;?>">Click here to buy</a>
   </div>
   <?php include 'suggestion.php';?>
   <?php include 'Comment.php';?>
 </div>
<?php endif; ?>
</body>
</html>