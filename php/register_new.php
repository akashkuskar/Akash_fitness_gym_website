<?php
//template name: register
?>
<style type="text/css">
		.lb{
			font-size: 20px;
			padding-top: 10px;
		}
		.write{
			font-size: 18px;
			width: 100%;
		}

		.sub{
			font-size: 18px;
			margin-top: 10px;
			width: 100%;
			margin-top: 20px;
			border-radius: 5px;
			background-color: #fff8ba;
			}
		.sub:hover{
			background-color: green;
			color: white;		
		}
		
		.tab{
			margin-top: 10%; 
			box-shadow:  2px 2px 4px 4px #888888; 
			padding:50px 20px 50px 20px;
			border-radius: 5px;
		}
		.signup{
			margin-top: 40px;
			margin-right: 10px;
			padding-right: 10px;
			font-size: 16px;
			width: 60%;
			border-width: 0px 0px 2px 0px ;
			background-color: white;			
		}
		.signup:hover{
			color: white;
			background-color: #0b6e05;
			border-width: 2px 2px 2px 2px ;
			border-color: #0b6e05;
			cursor: pointer;
		}
	</style>

<form action="" method="POST">
	<center>
		<table style="margin-top: 10%;" class="tab">
			<tr >
				<center><th colspan="2" style="font-size: 25px;">Register</th></center>
			</tr>
			<tr>
				<td class="lb" >Full Name:</td>
				
			</tr>
			<tr>
				<td ><input type="text" name="fname" placeholder="Name" class="write"></td>
				
				
			</tr>
			<tr>
				<td class="lb" > Email:</td>
			</tr>
			<tr>
				<td colspan="2"><input type="e mail" name="mail" placeholder="Email" class="write"></td>
				<td></td>
			</tr>
			<tr>
				<td class="lb"> Password:</td>
			</tr>
			<tr>
				<td colspan="2"><input type="password" name="pass" placeholder="Password" class="write"></td>
			</tr>			
			<tr>
				<td class="lb">Confirm Password:</td>
			</tr>
			<tr>
				<td colspan="2" ><input type="password" name="password" placeholder="Confirm Password" class="write"></td>
			</tr>
			<tr>
				
				<td colspan="2" ><input type="submit" name="register" value="Register" class="sub"></td> 
				
			</tr>
			<tr>
				<td style="font-size:18px; padding-top:20px;">Already have an Account <input type="submit" name="sign_in" value="Sign In"  ></td>
			</tr>
			
		</table>
		
		<br>
		
	</center>
</form>

<?php
include "database.php";
if(isset($_POST['register']))
{
	$fname = $_POST['fname'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$new_pass = $_POST['password'];
	$flag=0;

	$sql = "SELECT email FROM login_cred";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc())
	{
		if($mail == $row["email"])
			$flag = 1;
	}
	if($flag == 1)
	{
		echo "User already exists";
	}
	if($pass == $new_pass && $flag==0)
	{
		$sql = "INSERT INTO login_cred (name,email,password)
		VALUES ('$fname','$mail','$pass')";
		if ($conn->query($sql) === TRUE){
			echo "Registration Successful";
			header("location:http://localhost/projects/restaurant/login/");
		}
		else
		{
			echo "Somethign went wrong";
		}

	}
	if($pass != $new_pass)
	{
		echo "Passwords do not match.";
	}

}

if(isset($_POST['sign_in']))
{
	header("location:http://localhost/projects/restaurant/login/");
}
?>