<?php
    

 $link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
 if($link->connect_error){
   die($link->connect_error);
}
   else{

      // echo "success";
   }

// die("$sql4");

if (isset($_POST["submit"])) {
  //   echo "<script type='text/javascript'>
  //   alert('Congaratulation  your registration has been successfully completed.');   
  // </script>";
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*\z/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   
 if (empty($_POST["C_NO"])) {
     $conatactError = "Contact number is required";
   } else {
     $contactnumber = test_input($_POST["C_NO"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]*\z/",$contactnumber)) {
       $conatactnumberErr = "Only numerical values are allowed"; 
     }
   }

 if (empty($_POST["password"])) {
     $passwordError = "Password is required";
   } else {
     $password = test_input($_POST["P_NO"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]*\z/",$password)) {
       $passwordErr = "Only numerical values are allowed"; 
     }
   }


     if (empty($_POST["L_name"])) {
     $lnameErr = "LastName is required";
   } else {
     $lname = test_input($_POST["L_name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*\z/",$lname)) {
       $lnameErr = "Only letters and white space allowed"; 
     }
   }

   if (empty($_POST["E_Address"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["E_Address"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }

if(empty($_POST["gr"])){
     $genderErr=" Please mention your gender";
    
  } else{

   $gender=$_POST["gr"];
  }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(is_null($emailErr) && isset($_POST["submit"])){

$sql="INSERT INTO users (id,contactnumber, name,lname, email, gender,password,last_login) VALUES(NULL,'$contactnumber',' $name','$lname','$email','$gender','".sha1($_POST['password'])."',NOW())";
$link->query("$sql");
// echo $name,$stdid,"Your data is entered successfully";
// s
// echo "<script type='text/javascript'>
//     alert('Congaratulation  your registration has been successfully completed.');   
//   </script>";


header('location:Home.php');
$link->close();

}

else{
      echo "Data is not entered successfully";
   }
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<style>
* {
  font-family: Helvetica;
  font-weight: 400;
  font-size: 16px;
  color: #bdc3c7;
}

body {
  color:#666;
  font-size:13px;
  font-family:Arial, Helvetica, sans-serif;
  

  background: url(1.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

}

.container {
  max-width: 400px;
  margin: 40px auto;
}

h2 {
  width: 100%;
  margin: 1em 0 .5em 1.2em;
  padding: 0;
  color: rgba(255,255,255,.2)
}

a {
  text-decoration: none;
  font-weight: 900;
  color: #ecf0f1;
}

a:hover {
  color: #bdc3c7;
}

.form {
  width: 100%;
  background-color: rgba(255,255,255,.2);
  text-align: center;
  padding: 1.25em;
  border-radius: 5px;
}


input {
  margin: 0 0 .4em 0;
  width: 100%;
  height: 40px;
  border-radius: 5px;
  box-sizing: border-box;
  box-shadow: 1px 1px 1px rgba(0,0,0,.01);
  border: 0;
  border-bottom: 5px solid rgba(0,0,0,.12);
  line-height: 40px;
}

[type='text'] {
  padding-left: 1em;
}

[type='submit'] {
  color: white;
  background-color: #2980b9;
  font-weight: 600;
}


[type='reset'] {
  color: white;
  background-color: #2980b9;
  font-weight: 600;
}



[type='text']:focus {
  border: 0;
  border-bottom: 5px solid #2980b9;
  color: #2c3e50;
  outline: none;
}


input:checked {
    height: 30px;
    width: 30px;
}
</style>
</head>
<body>



<?php
    

//  $link = new mysqli("localhost", "root", "root", "cse391_PROJECT");
//  if($link->connect_error){
//    die($link->connect_error);
// }
//    else{

//       echo "success";
//    }





// die("$sql4");




 // if (isset($_POST["submit"])) {
  //   echo "<script type='text/javascript'>
  //   alert('Congaratulation  your registration has been successfully completed.');   
  // </script>";
//    if (empty($_POST["name"])) {
//      $nameErr = "Name is required";
//    } else {
//      $name = test_input($_POST["name"]);
//      // check if name only contains letters and whitespace
//      if (!preg_match("/^[a-zA-Z ]*\z/",$name)) {
//        $nameErr = "Only letters and white space allowed"; 
//      }
//    }
   
   
//  if (empty($_POST["C_NO"])) {
//      $conatactError = "Contact number is required";
//    } else {
//      $contactnumber = test_input($_POST["C_NO"]);
//      // check if name only contains letters and whitespace
//      if (!preg_match("/^[0-9]*\z/",$contactnumber)) {
//        $conatactnumberErr = "Only numerical values are allowed"; 
//      }
//    }

//  if (empty($_POST["password"])) {
//      $passwordError = "Password is required";
//    } else {
//      $password = test_input($_POST["P_NO"]);
//      // check if name only contains letters and whitespace
//      if (!preg_match("/^[0-9]*\z/",$password)) {
//        $passwordErr = "Only numerical values are allowed"; 
//      }
//    }


//      if (empty($_POST["L_name"])) {
//      $lnameErr = "LastName is required";
//    } else {
//      $lname = test_input($_POST["L_name"]);
//      // check if name only contains letters and whitespace
//      if (!preg_match("/^[a-zA-Z ]*\z/",$lname)) {
//        $lnameErr = "Only letters and white space allowed"; 
//      }
//    }

//    if (empty($_POST["E_Address"])) {
//      $emailErr = "Email is required";
//    } else {
//      $email = test_input($_POST["E_Address"]);
//      // check if e-mail address is well-formed
//      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        $emailErr = "Invalid email format"; 
//      }
//    }

// if(empty($_POST["gr"])){
//      $genderErr=" Please mention your gender";
    
//   } else{

//    $gender=$_POST["gr"];
//   }

// }

// function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
// }

// if(is_null($emailErr) && isset($_POST["submit"])){

// $sql="INSERT INTO users (id,contactnumber, name,lname, email, gender,password,last_login) VALUES(NULL,'$contactnumber',' $name','$lname','$email','$gender','".sha1($_POST['password'])."',NOW())";
// $link->query("$sql");
// echo $name,$stdid,"Your data is entered successfully";
// // s
// echo "<script type='text/javascript'>
//     alert('Congaratulation  your registration has been successfully completed.');   
//   </script>";


// header('loaction:homepage.php');
// $link->close();

// }

// else{
//       echo "Data is not entered successfully";
//    }
?>

<!-- <h2>Please enter the requireed information below </h2>
<p><span style="color:red;font-weight:bold">* required field.</span></p>
    -->
   <div class='container'>
    
     <h2>Please enter the requireed information below </h2>
     
    <h2>Register here</h2>
  <!-- <ul>
   <li>Enter all the  information in the given fields to complete your registration</li>
   <li>Any problem? Email to me at shafiqulislam561@gmail.com</li>
  </ul> -->
    <p><span style="color:red;font-weight:bold">* required field.</span></p>
    <h2>or <a href='Login.php'>Login in</a></h2>
    
    <div class='form'>
   
   <form  name = "user_form" method="post" > 
  <input type="text" name="name" placeholder="Name *" required/>
   <span > <?php echo $nameErr;?></span>
   <br><br>
   <input type="text" name="L_name" placeholder="LastName *"  required/>
   <span > <?php echo $lnameErr;?></span>
   <br><br>
  <input type="text" name="C_NO" placeholder="Contactnumber *"  required/>
   <span > <?php echo $contactnumberErr;?></span>
   <br><br>
   <input type="text" name="E_Address"  placeholder="Email *" required />
   <span >  <?php echo $emailErr;?></span>
   <br><br>
   Gender:
   <select  id="group" name="gr" >
   <option  name="Male" value ="Male">MALE</option>
   <option  name="Female" value ="Female">FEMALE </option>
   </select>
   <span ><?php echo $genderErr;?></span>
  <br><br>
 <input type="password" name="password" placeholder="   Password *" required/>
 <span ><?php echo $passwordErr;?></span>
<input type="submit"  name="submit" value="Register">  <input type="reset" value="Clear" />
</form>
</div>
<div>
</body>

</html>