<?php 

session_start();

	include("PHP_Connection.php");
	include("PHP_Functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: HTML_OTP.html");
						die;
					}
				}
			}
			

		}else
		{

		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
	*{
		  margin: 0;
 		 padding: 0;
  		box-sizing: border-box;
  		font-family: 'Poppins',sans-serif;
	}

	body
{   
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    width: 100%;
    background-image: url("https://images.unsplash.com/photo-1551836022-8b2858c9c69b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    box-shadow:inset 0 0 0 2000px rgba(1, 2, 19, .8);
}

#h2{
	color: black;
}

	#text{

height: 30px;
border-radius: 10px;
padding: 10px;
border: solid thin #aaa;
width: 100%;


height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

	#button{

padding: 10px;
width: 200px;
color: white;
background-color: lightblue;
border: none;

  border-radius: 5px;
border: none;
color: #fff;
font-size: 18px;
font-weight: 500;
letter-spacing: 1px;
cursor: pointer;
transition: all 0.3s ease;
background: linear-gradient(135deg, #77B5FE, #030630);
}

button:hover
{
  background: linear-gradient(-135deg,#77B5FE, #030630);
}

#buttons{

padding: 10px;
width: 350px;
color: white;
background-color: lightblue;
border: none;

border-radius: 5px;
border: none;
color: #fff;
font-size: 15px;
font-weight: 500;
letter-spacing: 1px;
cursor: pointer;
transition: all 0.3s ease;
background: linear-gradient(135deg, #77B5FE, #030630);
}

buttons:hover
{
background: linear-gradient(-135deg,#77B5FE, #030630);
}
	#box{

background-color: #251B37;
margin: auto;
width: 800px;
padding: 50px;
text-align: center;
opacity: 1;
box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  box-shadow: 0px 0px 30px 5px #89CFF0;
}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;"><H2>LOGIN</H2></div><br>
			
			<span class="details" style="color:white">Please Enter Your Username</span>
			<input id="text" type="text" name="user_name"><br><br>

			<span class="details" style="color:white">Please Enter Your Password</span>
			<input id="text" type="password" name="password"><br><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<input id="buttons" type="button" value="Don't have any Account? Register Now!" onclick="location.href='PHP_Signup.php'"><br><br>
		</form>
	</div>
</body>
</html>