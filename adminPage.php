<?php 
	session_start();
    

if(isset($_POST["logout"])) {

  // logOut();
// function logOut(){
// if(isset($_SESSION['is_login'])){
    session_unset();
    header('Location: Home.php');
    echo "You are Logged out";
    // ob_start();
    
  // }
 // }
}

    // include('connect.php');
	$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      echo "success";
   }




  if(!isset($_SESSION['loggedin']) or $_SESSION['loggedin'] == false){
	
	}

    // include('header1.php');
                                                  // show "Comment" Table
 
 ?>

  <html>
   <head>
  	<title>Admin Page</title>
  </head>   
  <style type="text/css">
   body{
    width: 97%;
    /*background-color: #EEEEEE;*/
    background-color: #C3E6F5;
   }
   .main{
    padding: 2%;
   }
   label{
    color: green;
   }
  </style>
<body>
<div class="main">
 <h3 style="color:red;"> Welcome to Admin Page  </h3></br>
  <br/>
  <form method="post"> You are logged in
  <input type="submit" name="logout" value="LOgOut" />
</form>
<hr/>
<br/> 

                                      <!--  // show Location Table -->

<label><b>Product List</b></label>
<table width="200" border="1" cellspacing="1" cellpadding="1">
  <tr> 
    <!-- <th>Products </th>  -->
    <th>Productid</th>
<th>Product Name</th>
<th>Description</th>
<th>Cost</th>
<th>Type</th>
<th>Status</th>
<th>Image Path</th>
<th>Warranty</th>
  </tr> 
<?php
// function getLocation(){
   $query2 = "SELECT * FROM articles;";
   $res2 = $link->query($query2); 
    while($row2 = $res2->fetch_assoc()) {
       echo "<tr>";
       echo "<td>".$row2['id']."</td>";
        echo "<td>".$row2['title']."</td>";
         echo "<td>".$row2['Product_Description']."</td>";
          echo "<td>".$row2['Product_Cost']."</td>";
           echo "<td>".$row2['Product_Type']."</td>";
            echo "<td>".$row2['Product_Status']."</td>";
             echo "<td>".$row2['Product_ImagePath']."</td>";
              echo "<td>".$row2['Product_Warranty']."</td>";
       echo "</tr>";
    }
  // }
  // getLocation();
?>
</table>
<br/>
 <?php          // Insert Product
 if(isset($_POST["ProductSave"])) {
 // $locName = $_POST["locName"];
 // $query3 = "INSERT INTO locations (num, location) VALUES (NULL, '$locName');";
 // $res3 = $mysqli->query($query3);
 include 'insert.php';
 
}

 // Update Product
 if(isset($_POST["P_Edit"])) {
 $ProductEdit = $_POST["ProductEdit"]; //id
 $DescriptionNew = $_POST["DescriptionNew"];
 $Cost = $_POST["CostNew"];
 $Warranty = $_POST["WarrantyNew"];
 

 $query4 = "UPDATE articles SET Product_Description = '$DescriptionNew', Product_Cost='$Cost',Product_Warranty=' $Warranty' WHERE id = '$ProductEdit';";
 $res4 = $link->query($query4);
}
   // Delete Product
 if(isset($_POST["P_Del"])) {
 $Product_ID = $_POST["ProductDel"];
 $query5 = "Delete from articles where id = '$Product_ID';";
 $res5 = $link->query($query5);
}

?>
<form  method="POST" action="adminPage.php" >  
Add Products: <!-- <input type="text" name="locName" /> -->
<input type="submit" name="ProductSave" value="ADD" /> <br/>
Edit Product: <select type="text" name="ProductEdit" />
            <option value=""> &nbsp;&nbsp; Choose One </option>;
            <?php
            $query6 = "SELECT * FROM articles;";
            $res6 = $link->query($query6);           
            while($i = $res6->fetch_assoc()) {         
             ?>
              <option value="<?php echo $i['id'] ?>"> <?php echo  '&nbsp;&nbsp;&nbsp;'.$i['id']  ?></option>";
              <?php 
              }   
            ?>    
            </select> 
 &nbsp;&nbsp; New Description:
 <input type="text" name="DescriptionNew" value="" /> <!-- echo $_POST["locNameEdit"]  -->
 &nbsp;&nbsp; New Cost:
 <input type="text" name="CostNew" value="" />
  &nbsp;&nbsp; New Warranty:
 <input type="text" name="WarrantyNew" value="" />
 <input type="submit" name="P_Edit" value="EDIT" />
<br/>
 Remove Product: <select type="text" name="ProductDel" />
  <option value=""> &nbsp;&nbsp; Choose One </option>;
            <?php
            $query7 = "SELECT * FROM articles;";
            $res7 = $link->query($query7); 
            while($i = $res7->fetch_assoc()) {
             ?>
              <option value="<?php echo $i['id'] ?>"> <?php echo  '&nbsp;&nbsp;&nbsp;'.$i['id']  ?></option>";
              <?php 
              }   
            ?>    
            </select> 
<input type="submit" name="P_Del" value="REMOVE" />
</form>
<br/>
</hr>
<hr/>
<br/>
</br>
<label><b> Product LIST FOR EDIT</b></label>
<?php 
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }


if(isset($_POST['update'])){

$q02 = "UPDATE articles SET id='$_POST[ID]',title='$_POST[Productname]',Product_Description = '$_POST[description]', Product_Cost='$_POST[cost]',Product_Type='$_POST[type]',Product_Status='$_POST[status]',Product_ImagePath='$_POST[image]',Product_Warranty=' $_POST[warranty]' WHERE id = '$_POST[hidden]';";
 $link->query("$q02");
};

 if(isset($_POST['p_delete'])){

$q06 = "DELETE  FROM articles WHERE id='$_POST[hidden]';";
 $link->query("$q06");
};
echo "<table border=1>
<tr>
<th>Productid</th>
<th>Product Name</th>
<th>Description</th>
<th>Cost</th>
<th>Type</th>
<th>Status</th>
<th>Image Path</th>
<th>Warranty</th>
</tr>";

$myquery=" SELECT * FROM articles";
$result01= $link->query( "$myquery");
while($row = $result01->fetch_assoc()){
echo "<form  method=post>";
echo "<tr>";
echo "<td>"."<input type=text name=ID value=".$row['id'] . " </td>";
echo "<td>"."<input type=textarea name=Productname value=".$row['title'] . " </td>";
echo "<td>"."<input type=text name=description value=".$row['Product_Description'] . " </td>";
echo "<td>"."<input type=text name=cost value=".$row['Product_Cost'] . " </td>";
echo "<td>"."<input type=text name=type value=".$row['Product_Type'] . " </td>";
echo "<td>"."<input type=text name=status value=".$row['Product_Status'] . " </td>";
echo "<td>"."<input type=text name=image value=".$row['Product_ImagePath'] . " </td>";
echo "<td>"."<input type=text name=warranty value=".$row['Product_Warranty'] . " </td>";
echo "<td>"."<input type=hidden name=hidden value=".$row['id']." </td>";
echo "<td>"."<input type=submit name=update value=update" . " </td>";
echo "<td>"."<input type=submit name=p_delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}

echo "</table>";
?>
<br/>
</hr>
<hr/>
<br/>
</br>

                   <!--  // show visitors Feedback Table -->
<label><b> Visitors Feedback </b></label>
<table width="600" border="1" cellspacing="1" cellpadding="1">
  <tr> 
    <th>Comment ID</th> <th>Name</th> <th>Comment</th> <th>Date</th><th>CheckBox</th>
  </tr> 
<?php
  $query1 = "SELECT * FROM commentbox;";
   $res1 = $link->query($query1); 
    while($row = $res1->fetch_assoc()) {
       echo "<tr>";
       echo "<td>".$row['id']."</td>";
       echo "<td>".$row['name']."</td>";
       // echo "<td>".$row['email']."</td>";
       echo "<td>".$row['comment']."</td>";
       echo "<td>".$row['artilce_id']."</td>";
       echo "<td>".$row['checkbox']."</td>";
       // echo "<td>".$row['c_date']."</td>";
       // echo "</tr>";
    } //select * from passenger inner join bookings where passenger.email=bookings.email and booking_date="2015-04-28"
?>
</table>
<br/>
<?php
if(isset($_POST["C_Edit"])) {
 $Comment_ID = $_POST["CommentEdit"]; //id
 $CommentNew = $_POST["CommentNew"];
 $Check = $_POST["Comment_Check"];
 // $Warranty = $_POST["WarrantyNew"];
 
if( $CommentNew !='' && $Check !='' ){
 $query14 = "UPDATE commentbox SET comment = '$CommentNew', checkbox='$Check', WHERE id = '$Comment_ID';";
 $res14 = $link->query($query14);
}

if( $CommentNew !=''){
 $query15 = "UPDATE commentbox SET comment = '$CommentNew' WHERE id = '$Comment_ID';";
 $res15 = $link->query($query15);
}
else{

$query16 = "UPDATE commentbox SET checkbox = '$Check' WHERE id = '$Comment_ID';";
 $res16 = $link->query($query16);


}




}
   // Delete Product
 if(isset($_POST["C_Del"])) {
 $comment_ID = $_POST["CommentDel"];
 $query17 = "Delete from commentbox where id = '$comment_ID';";
 $res17 = $link->query($query17);
}






?>
<form  method="POST" action="adminPage.php" >  
<!-- Add Products --> <!-- <input type="text" name="locName" /> -->
<!-- <input type="submit" name="ProductSave" value="ADD" /> <br/> -->
Edit Comment: <select type="text" name="CommentEdit" />
            <option value=""> &nbsp;&nbsp; Choose One </option>;
            <?php
            $query11 = "SELECT * FROM commentbox;";
            $res11 = $link->query($query11);           
            while($i = $res11->fetch_assoc()) {         
             ?>
              <option value="<?php echo $i['id'] ?>"> <?php echo  '&nbsp;&nbsp;&nbsp;'.$i['id']  ?></option>";
              <?php 
              }   
            ?>    
            </select> 
 &nbsp;&nbsp; Edited Comment:
 <input type="text" name="CommentNew" value="" /> <!-- echo $_POST["locNameEdit"]  -->
 <!-- &nbsp;&nbsp; New Cost:
 <input type="text" name="CostNew" value="" /> -->
  &nbsp;&nbsp; Check Box:
 <input type="text" name="Comment_Check" value="" />
 <input type="submit" name="C_Edit" value="EDIT" />
<br/>
 Remove Comment: <select type="text" name="CommentDel" />
  <option value=""> &nbsp;&nbsp; Choose One </option>;
            <?php
            $query12 = "SELECT * FROM commentbox;";
            $res12 = $link->query($query12); 
            while($i = $res12->fetch_assoc()) {
             ?>
              <option value="<?php echo $i['id'] ?>"> <?php echo  '&nbsp;&nbsp;&nbsp;'.$i['id']  ?></option>";
              <?php 
              }   
            ?>    
            </select> 
<input type="submit" name="C_Del" value="REMOVE" />
</form>
<hr/>
<br/>
<label><b> Comment LIST FOR EDIT</b></label>
<?php 
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }


if(isset($_POST['c_update'])){

$query04 = "UPDATE commentbox SET comment = '$_POST[comment]', checkbox='$_POST[checkbox]' WHERE id = '$_POST[hidden]';";
  // die("$query04");
  $link->query("$query04");

};

 if(isset($_POST['c_delete'])){

$query05 = "DELETE  FROM commentbox WHERE id='$_POST[hidden]';";
  // die("$query04");
  $link->query("$query05");

};



echo "<table border=1>
<tr>
<th>Commentid</th>
<th>Comment By/User Name</th>
<th>Comment</th>
<th>Product ID</th>
<th>Cehck Box</th>
</tr>";

$cquery=" SELECT * FROM commentbox";
$result03= $link->query( "$cquery");
while($row = $result03->fetch_assoc()){
echo "<form  method=post>";
echo "<tr>";
echo "<td>"."<input type=text name=ID value=".$row['id'] . " </td>";
echo "<td>"."<input type=textarea name=username value=".$row['name'] . " </td>";
echo "<td>"."<input type=text name=comment value=".$row['comment'] . " </td>";
echo "<td>"."<input type=text name=productid value=".$row['article_id'] . " </td>";
echo "<td>"."<input type=text name=checkbox value=".$row['checkbox'] . " </td>";
echo "<td>"."<input type=hidden name=hidden value=".$row['id']." </td>";
echo "<td>"."<input type=submit name=c_update value=update" . " </td>";
echo "<td>"."<input type=submit name=c_delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}

echo "</table>";
?>
<br/>
</hr>
<hr/>
<br/>
</br>



                         <!-- Show Passenger Table -->
                         <label><b> Passenger's Booking Info </b></label>
 <form method="post" action="adminPage.php">
 Searching Catagory :  <select type="text" name="catagory" />
            <option value="">  Choose One </option>;
            <option value="f_name"> First Name </option>;
            <option value="l_name"> Last Name </option>;
            <option value="email"> Email ID </option>;
            <option value="booking_date"> Gender </option>;
           <!--  <option value="location"> Location </option>; -->
            <option value="phone"> Phone Number </option>;
            </select>
     <input type="text" name="userInput" value="" />
  <input type="submit" name="search" value="GO" />
</form>
<table width="1000" border="1" cellspacing="1" cellpadding="1">
  <tr> 
    <th>Phone</th>
    <th>First Name</th>
    <th>Last Name</th> 
    <th>Email</th> 
     
    <!-- <th>Age</th>  -->
    <th>Sex</th>
  <!--   <th>Current Date</th> -->
    <th>Purchase Date</th>
    <!-- <th>Booked Slot</th> -->
    <th>Product</th>
    <th>Product Type</th>
    <th>Cost</th>
   <!--  <th>Receipt</th> -->
  </tr> 
<?php
   if(isset($_POST["search"])) {
    $catagory = $_POST['catagory']; 
    $userInput = $_POST['userInput']; 
       }
       if(!($catagory == "")){
  $query8 = "select * from users INNER join purchases where users.email=purchases.Email and $catagory='$userInput';";
} else{
     $query8 = "select * from users INNER join purchases where users.email=purchases.Email;";     
}
   $res8 = $link->query($query8); 
    while($row8 = $res8->fetch_assoc()) {
       echo "<tr>";
       echo "<td>".$row8['contactnumber']."</td>";
       echo "<td>".$row8['Name']."</td>";
       echo "<td>".$row8['lname']."</td>";
       echo "<td>".$row8['email']."</td>";
        // echo "<td>".$row8['age']."</td>";
       echo "<td>".$row8['gender']."</td>";
       echo "<td>".$row8['Date']."</td>";
       // echo "<td>".$row8['booking_date']."</td>";
       // echo "<td>".$row8['slot_booked']."</td>";
       echo "<td>".$row8['id']."</td>";
       echo "<td>".$row8['Product_Type']."</td>";
       echo "<td>".$row8['Product_Cost']."</td>"; 
       // echo "<td>".$row8['receipt']."</td>";       
       echo "</tr>";
    }
?>
</table>
<br/>
<hr/>
<br/>
You are a logged In. </br>
<form method="post">
	<input type="submit" name="logout" value="LOgOut" />
</form>
<br/>
<hr/>
</div> <!-- main div close -->
</body>
<?php
$link->close();
// include('footer.php');

?>
</html>