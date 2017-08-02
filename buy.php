<?php

if(isset($_GET['article'])){
$product_id = (int)$_GET['article'];
 
 }

?>

<html>
    <head>
        <title>PHP insertion</title>
        <link rel="stylesheet" href="css/insert.css" />
    
<style>
body{
	/* Setting default text color, background and a font stack */
	color:#666;
	font-size:13px;
	font-family:Arial, Helvetica, sans-serif;
	

	background: url(1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;


}

.maindiv {
    margin:30px auto;
    width: 495px;
    height: 500px;
    background:rgba(255, 255, 255, 0.14);
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
	width:300px;
	border:1px dashed #aaa;
	padding:10px 30px 40px 30px;
	margin-left:70px;
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
	margin-left: 0px;
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
				<div class="title"><h2>Please Fill up the Form in order to buy the Product.</h2></div>
   
				<form action="form.php?article=<?php echo $product_id;?>" method="post">    <!-- method can be set POST for hiding values in URL-->
					<h2></h2>
					<label>Name:</label>
					<br />
					<input class="input" type="text" name="name" value="" required/>
<!-- 					<textarea rows="5" cols="25" name="name"></textarea> -->
					<br />
					<label>Email:</label><br />        
					<input class="input" type="text" name="email" value="" required/>
					<!-- <textarea rows="5" cols="25" name="title"></textarea> -->
					<!-- <br /> -->
					<label>Credit Card Number/Bikash Account Number:</label><br />
					<input class="input" type="text" name="Payment_Method" value="" required/>
					<br>
					<input class="submit" type="submit" name="buy" value="Click here to buy" />
					<br>
					<!-- <a title="Print Screen" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;">PRINT the form</a>	 -->

				</form>
			</div>
			<!-- <div class="formget"><a href=http://www.formget.com/app><img src="formget.jpg" alt="Online Form Builder"/></a>
			</div> -->
		</div>
    </body>
</html>