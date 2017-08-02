<html>
    <head>
        <title>PHP insertion</title>
        <link rel="stylesheet" href="css/insert.css" />
    <style>

div.numstyle {
position: absolute;
top:1425px;
left: 377px;
color:green;
font-size: 18px;
}

</style>


    </head>
    <body>
		<div class="maindiv">
		<!--HTML form -->
			<div class="form_div">
				<div class="title"><h2></h2></div>
   
				<form  method="post">   
					<h2></h2>
					<input class="submit" type="submit" name="suggestion" value="suggest" />
					<br>
					<br>

<?php
	//Establishing Connection with Server
	// $connection = mysql_connect("localhost", "root", "");

	//Selecting Database from Server
	// $db = mysql_select_db("colleges", $connection);
	$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      echo "success";
   }


	if(isset($_POST['suggestion'])){
   
	//Fetching variables of the form which travels in URL
    
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $Product_Method = $_POST['Payment_Method'];
    $Product_ID =  $article->id;
    // $Product_Cost = $_POST['Product_Cost'];
    // $Product_Type = $_POST['Product_Type'];
    // $Product_Status = $_POST['Product_Status'];
    // $Product_ImagePath = $_POST['Product_ImagePath'];
    // $Product_Warranty = $_POST['Product_Warranty'];

    
    if($Product_ID !=''){
	//Insert Query of SQL
   
   
//    $q="SELECT count FROM suggest WHERE product_id={$Product_ID}";
//    $result=$link->query("$q");
//    if($result=$link->query("$q")) {
//    $row = $result->fetch_assoc();
//    $count=$row["count"];
  
// }
    $count=1;
    $sql="INSERT INTO  suggest(id,product_id,count) VALUES (NULL,'$Product_ID','$count')";
    $link->query("$sql");
	// die("$sql");
	
 }
	}//Closing Connection with Server
	$link->close();
?>					
				</form>
			</div>
			<!-- <div class="formget"><a href=http://www.formget.com/app><img src="formget.jpg" alt="Online Form Builder"/></a>
			</div> -->
		</div>
<div class="numstyle">
<?php
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }
 $Product_ID =  $article->id;

$q1="SELECT COUNT(*) FROM suggest WHERE product_id={$Product_ID}";
    $suggest_result = $link->query("$q1");

while($rows= $suggest_result->fetch_assoc())
{

$Count=$rows['COUNT(*)'];
echo 'This Product has been Suggsted By : '.'<br/>' . $Count .'  '.'People'. '<br/>' . '<br/>' ;
} 

?>
</div>
    </body>
</html>