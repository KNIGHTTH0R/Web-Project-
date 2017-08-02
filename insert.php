<html>
    <head>
        <title>PHP insertion</title>
       <!--  <link rel="stylesheet" href="css/insert.css" /> -->
    <style>
@import url(http://fonts.googleapis.com/css?family=Droid+Serif); /* to import google font style */ 
.maindiv {
    

	padding-top:20px;
	font-family: 'Droid Serif', serif;
	font-size:14px;
	}
.title {
	width:500px;
	height:70px;
	text-shadow:2px 2px 2px #cfcfcf; 
	font-size:16px;
	text-align:center;
	}
.form_div {
	width:70%;
	float:left;
	}
form{
	width:653px;
	
	padding:10px 30px 40px 30px;
	margin-left:409px;
	background-color:aliceblue;
	}
form h2{
	text-align:center; 
	text-shadow:2px 2px 2px #cfcfcf; 
	}
textarea{ 
	width:100%; 
	height:60px; 
	border-radius:1px;
	box-shadow:0px 0px 1px 2px #123456; 
	margin-top:10px;
	padding:7px;
	border:none;
	}	
.input{ 
	width:100%; 
	height:30px; 
	border-radius:2px;
	box-shadow:0px 0px 1px 2px #123456; 
	margin-top:10px;
	padding:7px;
	border:none;
	margin-bottom:20px;
	}
.submit{
	color: white;
	border-radius:3px;
	background: #1F8DD6;
	padding:5px;
	margin-top:40px;
	border:none;
	width:100%; 
	height:30px;
	box-shadow:0px 0px 1px 2px #123456;
	font-size:18px;	   
	}
.formget{
	float:right;
	}
p{
	color:red;
	text-align:center;
	}
span{
	text-align:center;
	color:green;
	}
    </style>
    </head>
    <body>
		<div class="maindiv">
		<!--HTML form -->
			<div class="form_div">
				<div class="title"><h2></h2></div>
   
				<form method="post">    <!-- method can be set POST for hiding values in URL-->
					<h2>Insert Data In Database</h2>
					<label>Name:</label>
					<br />
					<input class="input" type="text" name="name" value="" required />
<!-- 					<textarea rows="5" cols="25" name="name"></textarea> -->
					<br />
					<label>Title:</label><br />        
					<input class="input" type="text" name="title" value="" required />
					<!-- <textarea rows="5" cols="25" name="title"></textarea> -->
					<br />
					<label>Description:</label><br />
					<input class="input" type="text" name="Product_Description" value=""  required/>
					<!-- <textarea rows="5" cols="25" name="Product_Description"></textarea> -->
					<br />
					<label>Cost:</label><br />
					<input class="input" type="text" name="Product_Cost" value="" required />
					<!-- <textarea rows="5" cols="25" name="Product_Cost"></textarea> -->
					<br />
					<label>Type:</label><br />
					<input class="input" type="text" name="Product_Type" value=""  required/>
					<!-- <textarea rows="5" cols="25" name="Product_Type"></textarea> -->
					<br>
					<label>Status</label><br />
					<input class="input" type="text" name="Product_Status" value=""  required/>
					<!-- <textarea rows="5" cols="25" name="Product_Status"></textarea> -->
					<br>
					<label>Image Path:</label><br />
					<input class="input" type="text" name="Product_ImagePath" value=""  required/>
					<!-- <textarea rows="5" cols="25" name="Product_ImagePath"></textarea> -->
					<br>
					<label>Warranty:</label><br />
					<input class="input" type="text" name="Product_Warranty" value=""  required/>
					<!-- <textarea rows="5" cols="25" name="Product_Warranty"></textarea> -->
					<br>
					<input class="submit" type="submit" name="submit" value="Insert" />	

<?php include 'upload.php';?>

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


	if(isset($_POST['submit'])){
   
	//Fetching variables of the form which travels in URL
    
    $name = $_POST['name'];
    $title = $_POST['title'];
    $Product_Description = $_POST['Product_Description'];
    $Product_Cost = $_POST['Product_Cost'];
    $Product_Type = $_POST['Product_Type'];
    $Product_Status = $_POST['Product_Status'];
    $Product_ImagePath = $_POST['Product_ImagePath'];
    $Product_Warranty = $_POST['Product_Warranty'];

    
    if($name !=''||$title !=''){
	//Insert Query of SQL
   $sql="INSERT INTO  articles(id,title,Product_Description,Product_Cost,Product_Type,Product_Status,Product_ImagePath,Product_Warranty) 
    VALUES (NULL,'$title', '$Product_Description', '$Product_Cost','$Product_Type','$Product_Status','$Product_ImagePath','$Product_Warranty')";
    $link->query("$sql");
	// die("$sql");
	echo "<br/><br/><span>Data Inserted successfully...!!</span>";
    }
    else{
    echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";   
    }
 
	}
	//Closing Connection with Server
	$link->close();
?>					
				</form>
			</div>
			<!-- <div class="formget"><a href=http://www.formget.com/app><img src="formget.jpg" alt="Online Form Builder"/></a>
			</div> -->
		</div>
    </body>
</html>