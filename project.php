<?php
if(isset($_POST['Signup']))
{

$con = new mysqli("localhost", "root", "","db1");
if(!$con->connect_error)
{
 die("connection failed: ".$con->connect_error);
}


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


$sql="INSERT INTO student(username,email,password) VALUES($username,$email,$password)"; 


if($con->query($sql)==TRUE)

{
echo "New record created successfully";
}


else

{
echo "error: " . $sql . "<br>" .$con->error;
}

$con->close();
}
?>
<!DOCTYPE html>
<head>
<title>RegisterForm.php</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="Style.css"/>
<!-- Javascript validation for user inputs -->
<script>
function validate()
{ 
var username = document.register.username.value; 
var email = document.register.email.value;
var password = document.register.password.value;
var conpassword= document.register.conpassword.value;

 if(username==null || username=="")
{ 
alert("Username can't be blank"); 
return false; 
}
else if(email==null || email=="")
{ 
alert("Email can't be blank"); 
return false; 
}

else if(password.length&amp;lt;6)
{ 
alert("Password must be at least 6 characters long."); 
return false; 
} 
else if (password!=conpassword)
{ 
alert("Confirm Password should match with the Password"); 
return false; 
} 
} 
</script> 
</head>
<body>
 
<!-- Make a note that the method type used is post, action page is register.php and validate() function will get called on submit -->
 <div style="text-align:center"><h1>Sign Up</h1></div>
 <div style="text-align:center">Please  fil in this form to create an account</div>
 <br>
<form name="register" method="post" onsubmit="return validate();" >
 <!-- Not advised to use table within the form to enter user details -->
<table align="center" >


<tr>
<td>Username</td> 
<td><input type="text" name="username" /></td>
</tr>

<tr>
<td>Email</td>
<td><input type="text" name="email" /></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password" /></td>
</tr>

<tr>
<td>Confirm Password</td>
<td><input type="password" name="conpassword" /></td>
</tr>

<tr>
<td>
<input type="checkbox" name="terms">I accept terms and conditions
</td>
</tr>


<tr>
<td></td>
<td><input type="submit" value="Sign Up" name="Signup" ></input><input
type="reset" value="Reset"></input></td>
</tr>

</table>
</form>
</body>
</html>










