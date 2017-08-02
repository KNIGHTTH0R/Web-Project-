<?php
// mysql_connect("mysql host name","mysql user name","mysql password");
// mysql_select_db("database name");

 $link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
 if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];
$comment_id =  $article->id;  //  foeign key of comment box referring from article-id (which is the product-id)

// $dbLink = mysql_connect("mysql host name", "mysql user name", "mysql password");
//     mysql_query("SET character_set_client=utf8", $dbLink);
//     mysql_query("SET character_set_connection=utf8", $dbLink);
 
if($submit)
{
if($name||$comment)
{
$link->query("INSERT INTO commentbox(id,name,comment,article_id) VALUES (NULL,'$name','$comment','$comment_id') ");
echo "<meta HTTP-EQUIV='REFRESH' content='0; url=article.php?id={$comment_id}'>";
die("INSERT INTO commentbox(id,name,comment,article_id) VALUES (NULL,'$name','$comment','$comment_id') ");
}
else
{
echo "please fill out all fields";
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>

 	.ex1{
display: block;
position: absolute;
margin-top: 95px;
margin-left:-308px;
padding: 0;
border: 0px solid #CCC;
overflow: hidden;
clear: right;
height: 392px;
width: 630px;
}
 	</style>
<title   >Comment box</title>
</head>
 
<body>
<center>
<div class="form1">
<form  method="POST">
<div class="ex1">
<table >
<tr><td>Name: <br><input type="text" name="name"/></td></tr>
<tr><td colspan="2">Comment: </td></tr>
<tr><td colspan="5"><textarea name="comment" rows="10" cols="50"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="submit" value="Comment"></td></tr>
</table>
</div>
</form>
</div>
<?php
// $dbLink = mysql_connect("mysql host name", "mysql username", "mysql password");
//     mysql_query("SET character_set_results=utf8", $dbLink);
//     mb_language('uni');
//     mb_internal_encoding('UTF-8');
$link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
 if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   } 
// $getquery=mysql_query("SELECT * FROM comment ORDER BY id DESC");

if($comment_id!='' ){




$sql01="SELECT COUNT(*) AS count FROM commentbox WHERE article_id ={$comment_id}  ORDER BY id DESC";
// die("$sql01");
$result01 = $link->query("$sql01");
$rows01= $result01->fetch_assoc();
$r=$rows01['count'];
echo "Commented by".$r." People";

$sql="SELECT comment FROM commentbox WHERE article_id={$comment_id} AND checkbox='1'  ORDER BY id DESC";
// $sql="SELECT * FROM commentbox WHERE article_id={$comment_id}  ORDER BY id DESC";

$result = $link->query("$sql");

while($rows= $result->fetch_assoc())
{
$id=$rows['id'];
$name=$rows['name'];
$comment=$rows['comment'];
echo $name . '<br/>' . '<br/>' . $comment . '<br/>' . '<br/>' . '<hr size="1"/>'
;
}
}
?>

</body>
</html>